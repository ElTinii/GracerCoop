<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Logs;

class AuthenticatedSessionController extends Controller
{
    protected $redirectTo = '/redirect';
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); 
        $request->session()->regenerate();
        //Enviem un log a la base de dades
        $log = new Logs();
        $log->data = now()->format('Y-m-d');
        $log->hora = now()->format('H:i:s');
        $log->client_id = Auth::user()->id;
        $log->accio = Auth::user()->username . ' ha iniciat sessió';
        $log->ipClient = request()->ip();
        $log->save();

        if (Auth::user()->admin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
}
