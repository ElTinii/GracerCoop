<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Carpetas;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;
use App\Models\Arxius;
use Illuminate\Support\Facades\Storage;

class CarpetasController extends Controller
{
    public function mostrarCarpeta($id)
    {  
        $carpetaPare = Carpetas::where('carpeta_id', $id)->first();
        $ruta = $carpetaPare->ruta;
        $empresa_id = $carpetaPare->empresa_id;
        $nomEmpresa = Empresa::where('empresa_id', $empresa_id)->first()->nom;
        $carpetasFilles = Carpetas::where('carpeta_Padre', $id)->get();
        $arxius = Arxius::where('carpeta_padre', $id)->get();
        return view('vistaCarpeta', compact('carpetasFilles', 'ruta', 'nomEmpresa','id','arxius'));
    }

    public function carpetasEmpresa($id)
    {
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get();
        return view('vistaCarpeta', compact('carpetasFilles'));
    }

    public function crearCarpetas(Request $request){
        $nom = htmlspecialchars($request->nomCarpeta);
        $id = $request->id;
        $carpetaPare = Carpetas::where('carpeta_id', $request->id)->first();
        $empresa_id = $carpetaPare->empresa_id;
        $carpetasFilles = Carpetas::where('empresa_id', $carpetaPare->empresa_id)->get();
        foreach ($carpetasFilles as $carpeta) {
            if($carpeta->ruta == $carpetaPare->ruta . '/' . $nom){
                return back()->withErrors(['error' => 'Ja existeix una carpeta amb aquest nom']);
            }
        }
        $carpeta = new Carpetas();
        $carpeta->nom = $nom;
        $carpeta->ruta = $carpetaPare->ruta . '/' . $nom;
        $carpeta->carpeta_Padre = $id;
        $carpeta->empresa_id = $empresa_id;
        $carpeta->save();

        $ruta = base_path($carpeta->ruta);
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            log::info("Directorio creado: $carpeta->nom");
        } else {
            log::info("El directorio ya existe");
        }

        $carpetasFilles = Carpetas::where('empresa_id', $request->id)->where('carpeta_Padre', $request->id)->get();
        $arxius = Arxius::where('carpeta_padre', $id)->get();
        return view('vistaCarpeta', compact('carpetasFilles','id','arxius'));
    }

    public function carpetasInici($id){
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get;
        return view('vistaCarpeta', compact('carpetasFilles'));
    }

    public function carpetasElim(Request $request){
        $carpetas = Carpetas::where('carpeta_id', $request->id)->delete();
        $carpeta = Carpetas::where('carpeta_Padre', $request->id)->delete();
        return response()->json(null, 200);
    }

    public function pujarFitxers(Request $request){
        $request->validate([
            'fitxers' => 'required',
            'fitxers.*' => 'mimes:jpeg,jpg,png,pdf,docx',
        ], [
            'fitxers.required' => 'El camp fitxer es obligatori.',
            'fitxers.*.mimes' => 'El fitxer ha de ser un arxiu de tipus png, pdf o docx.',
        ]);
        $file = $request->file('fitxers');

        $id = $request->id;
        $carpeta = Carpetas::where('carpeta_id', $id)->first();

        $ruta = $carpeta->ruta;
        $empresa_id = $carpeta->empresa_id;
        $nomEmpresa = Empresa::where('empresa_id', $empresa_id)->first()->nom;
        $carpetasFilles = Carpetas::where('carpeta_Padre', $id)->get();
        
        $arxiu = new Arxius();
        $arxiu->nom = $file->getClientOriginalName();
        $arxiu->ruta = $ruta . '/' . $file->getClientOriginalName();
        $arxiu->carpeta_padre = $id;
        $arxiu->empresa_id = $empresa_id;
        $arxiu->save();
        $arxius = Arxius::where('carpeta_padre', $id)->get();

        if ($request->hasFile('fitxers')) {
            $file = $request->file('fitxers');
            $filename = $file->getClientOriginalName();
            $file->move(base_path($ruta), $filename);

            $request->merge(['file' => $filename]);
        }

        return view('vistaCarpeta', compact('carpetasFilles', 'ruta', 'nomEmpresa','id','arxius', 'carpeta'));
    }
}
