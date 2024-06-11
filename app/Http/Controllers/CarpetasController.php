<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Carpetas;
use App\Models\Empresa;
use Illuminate\Support\Facades\Log;
use App\Models\Arxius;
use Illuminate\Support\Facades\Storage;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;


class CarpetasController extends Controller
{
    public function mostrarCarpeta($id)
    {  
        $empresas = Empresa::all();
        $carpetas = Carpetas::where('empresa_id', Auth::user()->empresa_id);
        $carpetaPare = Carpetas::where('carpeta_id', $id)->first();
        $ruta = $carpetaPare->ruta;
        $empresa_id = $carpetaPare->empresa_id;
        $nomEmpresa = Empresa::where('empresa_id', $empresa_id)->first()->nom;
        $carpetasFilles = Carpetas::where('carpeta_Padre', $id)->get();
        $arxius = Arxius::where('carpeta_padre', $id)->get();
        return view('vistaCarpeta', compact('carpetasFilles', 'ruta', 'nomEmpresa','id','arxius', 'empresas', 'carpetas'));
    }

    public function carpetasEmpresa($id)
    {
        $empresas = Empresa::all();
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get();
        return view('vistaCarpeta', compact('carpetasFilles','empresas'));
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
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' crea la carpeta ' . $nom . ' a la carpeta ' . $carpetaPare->nom;
        $log->ipClient = request()->ip();
        $log->save();

        $carpetasFilles = Carpetas::where('empresa_id', $request->id)->where('carpeta_Padre', $request->id)->get();
        $arxius = Arxius::where('carpeta_padre', $id)->get();
        return redirect()->route('carpetasMostrar', ['id' => $id]);
    }

    public function carpetasInici($id){
        $carpetasFilles = Carpetas::where('empresa_id', $id)->where('carpeta_Padre', NULL)->get;
        return view('vistaCarpeta', compact('carpetasFilles'));
    }

    public function carpetasElim(Request $request){
        $nom = Carpetas::where('carpeta_id', $request->id)->first()->nom;
        $missatge = Auth::user()->username . ' ha eliminat la carpeta ' . $nom . ' i les seves subcarpetas';
        $carpetas = Carpetas::where('carpeta_id', $request->id)->delete();
        $carpeta = Carpetas::where('carpeta_Padre', $request->id)->delete();
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = $missatge;
        $log->ipClient = request()->ip();
        $log->save();

        return response()->json(null, 200);
    }

    public function pujarFitxers(Request $request){
        $request->validate([
            'fitxers' => 'required|max:4096',
            'fitxers' => 'mimes:png,pdf,docx',
        ], [
            'fitxers.required' => 'El camp fitxer es obligatori.',
            'fitxers.mimes' => 'El fitxer ha de ser un arxiu de tipus png, pdf o docx.',
            'fitxers.max' => 'El fitxer no pot ser mes gran de 4MB.', 
        ]);
        $file = $request->file('fitxers');

        $id = $request->id;
        $carpeta = Carpetas::where('carpeta_id', $id)->first();

        $fileName = $file->getClientOriginalName();
        $existingFile = Arxius::where('nom', $fileName)->first();
        if ($existingFile) {
            return redirect()->back()->withErrors(['file' => 'Ya existe un archivo con este nombre.']);
        }
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
        $nom = $carpeta->nom;
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' ha pujat l\'arxiu ' . $file->getClientOriginalName() . ' a la carpeta ' . $nom;
        $log->ipClient = request()->ip();
        $log->save();

        return redirect()->route('carpetasMostrar', ['id' => $id]);
    }

    function eliminarArxiu(Request $request){
        $id = $request->id;
        $arxiu = Arxius::where('arxiu_id', $id)->first();
        $ruta = $arxiu->ruta;
        $nom = $arxiu->nom;
        $arxiu->delete();
        unlink(base_path($ruta));
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' ha eliminat l\'arxiu ' . $nom;
        $log->ipClient = request()->ip();
        $log->save();
        return response()->json(null, 200);
    }

    public function descargar(Request $request)
    {
        $arxiuId = $request->query('id');
        $arxiu = Arxiu::find($arxiuId);
    
        if ($arxiu) {
            $pathToFile = storage_path($arxiu->ruta);
    
            // Obtén el tipo de archivo
            $fileType = File::mimeType($pathToFile);
    
            // Ajusta los encabezados según el tipo de archivo
            $headers = ['Content-Type: '.$fileType];
    
            // Usa el nombre original del archivo para la descarga
            $fileName = $arxiu->nom;
            Log::info($fileName);
    
            return response()->download($pathToFile, $fileName, $headers);
        } else {
            return response()->json(['error' => 'Archivo no encontrado'], 404);
        }
    }
}
