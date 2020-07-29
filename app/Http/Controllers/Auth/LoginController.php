<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    
    //ログイン試行回数の指定
    protected $maxAttempts = 3;
    // ⭐️Throttleslogins.phpに３回までの記述は書いてはダメ。vendorディレクトリより下のファイルになり、フレームワークが壊れてしまうから


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/todo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //  ログインしているユーザのみログアウトできる様にしている
    public function __construct()
    {
        // dd($this->middleware('guest')->except('logout'));
        $this->middleware('guest')->except('logout');
    }
    

    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }

}
