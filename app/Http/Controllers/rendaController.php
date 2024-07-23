<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renda;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Logs;

class rendaController extends Controller
{
    
    public function mostrarRenda(){
        // Obtener todos los registros de la tabla renda
        $datosRenda = Renda::all();
    
        // Pasar los datos a la vista
        return view('rendaMod', ['datosRenda' => $datosRenda]);
    }

    public function editarRenda(Request $request){
        $request->validate([
            'preu'=> 'required|numeric|',
        ],[
            'preu.required' => 'El preu es obligatori',
            'preu.numeric' => 'El preu ha de ser un valor numèric',
        ]);
        $preu = $request->preu;
        $renda = Renda::findOrFail($request->id);
        $renda->preu = $preu;
        $renda->save();

        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' modifica la renda ' . $renda->id;
        $log->ipClient = request()->ip();
        $log->save();

        $datosRenda = Renda::all();
        return redirect()->route('rendaMod', ['datosRenda' => $datosRenda]);
    }
}
