<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.01.19
 *
 */

namespace App\Modules\Visitors\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * LoginController constructor.
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
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('mainPage');
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'email';
    }
}
