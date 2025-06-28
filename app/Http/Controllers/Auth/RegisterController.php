<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/datospersonals/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'DNI' => ['required', 'numeric', 'digits_between:8,8','unique:users'],
            'apellido_paterno' => ['required', 'string', 'max:20'],
            'apellido_materno' => ['required', 'string', 'max:20'],
            'celular' => ['required', 'numeric', 'digits_between:9,9','unique:users'],
            // 'distrito'=>['required', 'string', 'max:20'],
            // 'dondelaboras'=>['required'],
            // 'departamento'=>['required'],
            // 'distrito'=>['required'],
            // 'namedireccion'=>['required', 'string'],
            // 'provincia'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => mb_strtoupper($data['name']),
            'DNI'=>$data['DNI'],
            'apellido_paterno'=>mb_strtoupper($data['apellido_paterno']),
            'apellido_materno'=>mb_strtoupper($data['apellido_materno']),
            
            // 'dondelaboras'=>$data['dondelaboras'],
            'email' => $data['email'],
            'celular'=>$data['celular'],
            // 'distrito'=>$data['distrito'],
            // 'namedireccion'=>$data['namedireccion'],
            'password' => Hash::make($data['password']),
        ]);
        // con mb_strtoupper para que se guarde en mayuscula 
    }
}
