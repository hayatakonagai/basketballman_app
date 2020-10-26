<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
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
    protected $redirectTo = '/email/verify';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required'],
            'height' => ['required','integer'],
            'weight' => ['nullable','integer'],
            'age' => ['required','integer'],
            'where' => ['required'],
            'position' => ['required'],
            'carrer' => ['required'],
            'acievement' => ['nullable','max:255'],
            'appeal' => ['nullable','max:255'],
            'image' =>['nullable','file','image','max:2048']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
    
 * Create a new user instance after a valid registration.
 *
 * @param  array  $data
 * @return \App\User
 */
protected function create(array $data)
{
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'gender' => $data['gender'],
        'height' => $data['height'],
        'weight' => $data['weight'],
        'age' => $data['age'],
        'where' => $data['where'],
        'position' => $data['position'],
        'carrer' => $data['carrer'],
        'acievement' => $data['acievement'],
        'appeal' => $data['appeal'],
        'image' => $data['image']
    ]);
    $carrer = '';
    if (isset($data->carrer)) {
       $carrer = implode(",",$data->carrer);
   } 
}
}
