<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Carpetas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\MiMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PanelController extends Controller
{
    public function store(Request $request)
    {
        //Validamos los datos recibidos en el formulario
        $request->validate([
            'nom' => 'required|string|max:100',
            $request->validate([
                'correu' => 'required|string|email|unique:users,email|max:100',
            ], [
                'correu.required' => 'El camp correu electronic es obligatori.',
                'correu.email' => 'El correu electronic proporcionat no es vàlid.',
                'correu.unique' => 'El correu ja existeix a la base de dades.',
            ])
        ]);

        //Comprobamos que el nombre de la empresa no contenga insercion de codigo
        $nom = htmlspecialchars($request->nom);

        //Creamos la empresa con los datos recibidos en el formulario
        $empresa = new Empresa();
        $empresa->nom = $nom;
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
        $carpeta->ruta = '/resources/empresas/' . $request->nom . '/CPersonal';
        $carpeta->empresa_id = $empresa->empresa_id;
        $carpeta->save();

        $dir = "CPersonal";
        if (!file_exists($carpeta->ruta)) {
            mkdir($carpeta->ruta, 0777, true);
            log::info("Directorio creado: $dir");
        } else {
            log::info("El directorio ya existe");
        }

        //Creamos la carpeta de archivos compartidos de la empresa
        $carpeta = new Carpetas();
        $carpeta->nom = 'CEmpresa';
        $carpeta->ruta = '/resources/empresas/' . $request->nom . '/CEmpresa';
        $carpeta->empresa_id = $empresa->empresa_id;
        $carpeta->save();

        $dir = "CEmpresa";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            log::info("Directorio creado: $dir");
        } else {
            log::info("El directorio ya existe");
        }

        $details = [
            'email' => $usuari->email,
            'password' => $password,
        ];
        //Enviem un correu amb les dades de l'usuari
        Mail::to($usuari->email)->send(new MiMailable($details));
        
        return redirect()->route('empresas');
    }
    public function mostrarEmpresas()
    {
        $empresas = Empresa::all();
        return view('vistaPanellEmp', compact('empresas'));
    }
}
