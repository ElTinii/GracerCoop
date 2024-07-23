<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Carpetas;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\MiMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateInterval;

class PanelController extends Controller
{
    public function store(Request $request)
    {
        //Validamos los datos recibidos en el formulario
        $request->validate([
            'nom' => 'required|string|max:30',
            'cif' => 'required|string|max:9',
            'correu' => 'required|string|email|unique:users,email|max:100',
        ], [
            'nom.required' => 'El camp nom es obligatori.',
            'nom.string' => 'El nom ha de ser una cadena de text.',
            'nom.max' => 'El nom no pot tenir més de 30 caràcters.',
            'correu.required' => 'El camp correu electronic es obligatori.',
            'correu.email' => 'El correu electronic proporcionat no es vàlid.',
            'correu.unique' => 'El correu ja existeix a la base de dades.',
        ]);

        //Comprobamos que el nombre de la empresa no contenga insercion de codigo
        $nom = htmlspecialchars($request->nom);
        $cif = htmlspecialchars($request->cif);
        //Creamos la empresa con los datos recibidos en el formulario
        $empresa = new Empresa();
        $empresa->nom = $nom;
        $empresa->cif = $cif;
        $empresa->save();


        $nameUser = $nom . '1' ;//Generamos un nombre de usuario basico, añadiendo un 1 al nombre de la empresa, despues el usuario lo podra canviar
        $password = Str::random(12);//Generamos una contraseña aleatoria

        //Creamos el usuario con los datos recibidos en el formulario i lo añadimos a la base de datos
        $usuari = new User();
        $usuari->username = $nameUser;
        $usuari->nom = $nom;
        $usuari->email = $request->correu;
        $usuari->password = Hash::make($password);
        $usuari->hora = now();
        $usuari->empresa_id = $empresa->empresa_id;
        $usuari->save();
        
        //Creamos la carpeta raiz de la empresa donde podran subir los archivos
        $carpeta = new Carpetas();
        $carpeta->nom = 'CPersonal';
        $carpeta->ruta = 'resources/empresas/' . $request->nom . '/CPersonal';
        $carpeta->empresa_id = $empresa->empresa_id;
        $carpeta->save();

        $ruta = base_path($carpeta->ruta);
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            log::info("Directorio creado: $carpeta->nom");
        } else {
            log::info("El directorio ya existe");
        }

        //Creamos la carpeta de archivos compartidos de la empresa
        $carpeta = new Carpetas();
        $carpeta->nom = 'CEmpresa';
        $carpeta->ruta = 'resources/empresas/' . $request->nom . '/CEmpresa';
        $carpeta->empresa_id = $empresa->empresa_id;
        $carpeta->save();

        $ruta = base_path($carpeta->ruta);
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
            log::info("Directorio creado: $carpeta->nom");
        } else {
            log::info("El directorio ya existe");
        }

        $details = [
            'email' => $usuari->email,
            'password' => $password,
        ];
        //Enviem un correu amb les dades de l'usuari
        Mail::to($usuari->email)->send(new MiMailable($details));
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' dona d\'alta a l\'empresa ' . $nom;
        $log->ipClient = request()->ip();
        $log->save();
        return redirect()->route('empresas');
    }

    public function mostrarEmpresas()
    {
        $empresas = Empresa::all();
        $usuaris = User::all();
        return view('vistaPanellEmp', compact('empresas','usuaris'));
    }
    public function obtenirDades()
    {
        $xArray = DB::table('logs')
            ->select(DB::raw('DATE(data) as data'))
            ->distinct()
            ->pluck('data');


        $yArray = DB::table('logs')
            ->select(DB::raw('count(*) as count'))
            ->groupBy('data')
            ->pluck('count');

        return response()->json(['xArray' => $xArray, 'yArray' => $yArray]);
    }
    
    public function Mostrar()
    {
        $log = Logs::latest()->first();
        $nomUser = User::where('id', $log->client_id)->first();
        return view('vistaPanell', compact('log', 'nomUser'));
    }

    public function obtenirLogs()
    {
        $logs = Logs::all();
        return view('vistaLogs', compact('logs'));
    }
    public function infoLog($id)
    {
        $log = Logs::where('log_id', $id)->first();
        $nomUser = User::where('id', $log->client_id)->first();
        $nomUser = $nomUser->username;
        $logs = Logs::all();
        return view('vistaLogs', compact('log', 'nomUser', 'logs'));
    }
}
