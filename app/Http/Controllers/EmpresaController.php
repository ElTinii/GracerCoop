<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Carpetas;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;    

class EmpresaController extends Controller
{
    public function store(Request $request)
    {
        
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id)->get(); 
        $carpetas = Carpetas::where('empresa_id', $id)->get();
        foreach ($empresa as $e) {
            Log::info(base_path('resourcers/empresas/' . $e->nom));
            $ruta = base_path('resourcers/empresas/' . $e->nom);
        }
        Log::info($ruta);
            if(file_exists($ruta)){
                eliminarDirectorio($ruta);
            }
            $empresa = Empresa::findOrFail($id); 
            $log = new Logs();
            $log->data = now()->format('Y-m-d');
            $log->hora = now()->format('H:i:s');
            $log->client_id = Auth::user()->id;
            $log->accio = Auth::user()->username . 'elimina l\'empresa ' . $empresa->nom;
            $log->ipClient = request()->ip();
            $log->save();
        $carpetas = Carpetas::where('empresa_id', $id)->delete();

        $usuarios = User::where('empresa_id', $id)->delete();

        $empresa = Empresa::findOrFail($id)->delete();


        return response()->json(null, 204);
    }

}
