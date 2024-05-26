<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carpetas;

class UserController extends Controller
{
    public function dashboard()
    {
        $id = auth()->user()->empresa_id;
        $carpetasFilles = Carpetas::where('empresa_id', $id)->get();
        return view('vistaUser', compact('carpetasFilles'));
    }
}
