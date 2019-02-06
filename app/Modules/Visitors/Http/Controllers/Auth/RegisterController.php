<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.01.19
 *
 */

namespace App\Modules\Visitors\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Visitors\Model\Visitor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('mainPage');
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('visitor');
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
            'reg-name' => ['required', 'string', 'min:1', 'max:255'],
            'reg-email' => ['required', 'string', 'email', 'max:255', 'unique:visitors,email'],
            'reg-pass' => ['required', 'string', 'min:6', 'confirmed'],
            'reg-agree' => ['required'],
        ]);
    }

    /**
     * Create a new CompanyOwner instance after a valid registration.
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        return Visitor::create([
            'name' => $data['reg-name'],
            'email' => $data['reg-email'],
            'password' => Hash::make($data['reg-pass']),
        ]);
    }

//    /**
//     * Show the application registration form.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function showRegistrationForm()
//    {
//        return view('company::auth.register');
//    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
