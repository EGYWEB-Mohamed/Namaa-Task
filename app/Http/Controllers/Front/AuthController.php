<?php
/*
 * Made With ♥ By Mohamed Said (c) 2022
 * - Github : https://github.com/EGYWEB-Mohamed
 * - Whatsapp : https://wa.me/+201141173045
 * - Website : https://msaied.com
 */

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:subscriber')->except('logout');
    }

    public function showForm()
    {
        return view('auth.subscriber.login');
    }
    protected function authenticated(Request $request, $user)
    {
        $previous_session = $user->session_id;

        if ($previous_session) {
            Auth::guard('subscriber')->logout();
            throw ValidationException::withMessages([
                $this->username() => ['This User Is Already Logged In , One Login Session Allowed'],
            ]);
        }

        Auth::guard('subscriber')->user()->session_id = \Session::getId();
        Auth::guard('subscriber')->user()->save();
        return redirect()->intended($this->redirectPath());
    }

    public function username()
    {
        return 'username';
    }
    protected function guard()
    {
        return Auth::guard('subscriber');
    }

    public function logout(Request $request)
    {
        $request->user('subscriber')->update([
            'session_id' => NULL
        ]);
        Auth::guard('subscriber')->logout();
        return redirect()->back();
    }
}
