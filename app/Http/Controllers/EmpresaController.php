<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Carpetas;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Logs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\MiMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Arxius;

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
            $log->accio = Auth::user()->username . ' elimina l\'empresa ' . $empresa->nom;
            $log->ipClient = request()->ip();
            $log->save();
        $arxius = Arxius::where('empresa_id', $id)->delete();
        $carpetas = Carpetas::where('empresa_id', $id)->delete();

        $usuarios = User::where('empresa_id', $id)->get();

        foreach ($usuarios as $usuario) {
            DB::table('logs')->where('client_id', $usuario->id)->delete();
        }

        User::where('empresa_id', $id)->delete();

        $empresa = Empresa::findOrFail($id)->delete();


        return response()->json(null, 204);
    }

    public function mostrarUnaEmpresa(Request $request){
        $id = $request->id;
        $empresaSelect = Empresa::findOrFail($id);
        $empresas = Empresa::all();
        $usuarisSelect = User::where('empresa_id', $id)->get();
        $usuaris = User::all();
        return view('vistaPanellEmp', compact('empresas','empresaSelect', 'usuarisSelect', 'usuaris'));
    }

    public function afegirUsuari(Request $request){
        $request->validate([
            'username' => 'required|string|max:30',
            'correu' => 'required|string|email|unique:users,email|max:100',
        ], [
            'username.required' => 'El camp nom es obligatori.',
            'username.string' => 'El nom ha de ser una cadena de text.',
            'username.max' => 'El nom no pot tenir més de 30 caràcters.',
            'correu.required' => 'El camp correu electronic es obligatori.',
            'correu.email' => 'El correu electronic proporcionat no es vàlid.',
            'correu.unique' => 'El correu ja existeix a la base de dades.',
        ]);

        $username = htmlspecialchars($request->username);
        $email = htmlspecialchars($request->correu);
        $empresa_id = $request->empresa_id;
        $password = Str::random(12);

        $usuari = new User();
        $usuari->username = $username;
        $usuari->email = $email;
        $usuari->password = Hash::make($password);
        $usuari->nom = $username;
        $usuari->hora = now();
        $usuari->empresa_id = $empresa_id;
        $usuari->save();

        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' crea l\'usuari ' . $usuari->nom;
        $log->ipClient = request()->ip();
        $log->save();

        $details = [
            'email' => $usuari->email,
            'password' => $password,
        ];
        //Enviem un correu amb les dades de l'usuari
        Mail::to($usuari->email)->send(new MiMailable($details));
        return redirect()->route('panel.show', ['id' => $empresa_id]);
    }

    function eliminarUsuari(Request $request){
        $id = $request->id;
        $usuari = User::findOrFail($id);
        $empresa_id = $usuari->empresa_id;
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' elimina l\'usuari ' . $usuari->nom;
        $log->ipClient = request()->ip();
        $log->save();
        $usuari->delete();
        return redirect()->route('panel.show', ['id' => $empresa_id]);
    }

}
