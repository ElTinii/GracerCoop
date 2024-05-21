<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            Log::info('El usuario está autenticado.');
        } else {
            Log::info('El usuario no está autenticado.');
        }
        if (!Auth::check()) {
            return redirect('/');
        }

        return view('vistaAdmin');
    }
}