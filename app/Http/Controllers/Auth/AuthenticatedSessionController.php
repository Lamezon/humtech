<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Models\Earn;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        /* Log */
        Log::channel('custom')->info('Login Realizado por '.$request->user()->name.', ID: '.$request->user()->id.', E-Mail: '.$request->user()->email.'');
        Session::put('caixa', false);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $earn = Earn::where('id', '=', '1')->first();
        $antigo = $earn['total'];
        $earn['total']=$earn['atual'];
        $earn['status']=false;
        $earn->save();
        Product::where('sold_amount_access', '!=' , 0)->update(['sold_amount_access' => 0]);   
        Log::channel('custom')->info('Caixa Atualizado por '.auth()->user()->name.'! Valor Anterior:'.$antigo.' - Valor Novo: '.$earn['total'].'.');
        Session::put('caixa', false);
        Auth::guard('web')->logout();    
        $request->session()->invalidate();
        Log::channel('custom')->info('Logout Realizado');
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
