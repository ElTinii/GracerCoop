<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Carpetas;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function store(Request $request)
    {
        
    }

    public function destroy($id)
    {
        $carpetas = Carpetas::where('empresa_id', $id)->get();
        foreach ($carpetas as $carpeta) {
            if(file_exists($carpeta->ruta)){
                rmdir($carpeta->ruta);
            }
        }
        $carpetas = Carpetas::where('empresa_id', $id)->delete();

        $usuarios = User::where('empresa_id', $id)->delete();

        $empresa = Empresa::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
