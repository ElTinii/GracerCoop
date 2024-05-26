<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Carpetas;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;

class CarpetasController extends Controller
{
    public function mostrarCarpeta($id)
    {
        $carpetaPare = Carpetas::where('carpeta_id', $id)->first();
        $ruta = $carpetaPare->ruta;
        $empresa_id = $carpetaPare->empresa_id;
        $nomEmpresa = Empresa::where('empresa_id', $empresa_id)->first()->nom;
        $carpetasFilles = Carpetas::where('carpeta_Padre', $id)->get();
        return view('vistaCarpeta', compact('carpetasFilles', 'ruta', 'nomEmpresa','id'));
    }

    public function carpetasEmpresa($id)
    {
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get();
        return view('vistaCarpeta', compact('carpetasFilles'));
    }

    public function crearCarpetas(Request $request){
        $nom = htmlspecialchars($request->nomCarpeta);
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
        $carpeta->carpeta_Padre = $request->id;
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
        return view('vistaCarpeta', compact('carpetasFilles'));
    }

    public function carpetasInici($id){
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get;
        return view('vistaCarpeta', compact('carpetasFilles'));
    }
}
