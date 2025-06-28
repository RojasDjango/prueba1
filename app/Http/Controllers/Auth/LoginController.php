<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Datospersonal;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    // protected $redirectTo = 'admin/socialnetworks/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    //para redireccionar si el usuario no tiene registro en la tabla datospersonals
    protected function redirectTo()
    {
        // Verificar si el usuario autenticado tiene registro en Datospersonals
        if (Datospersonal::where('user_id', auth()->id())->exists()) {
            return 'admin/socialnetworks/';
        }
        
        return '/admin/datospersonals/create';
    }
}
