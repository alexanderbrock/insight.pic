<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\LoginToken;
use App\AuthenticatesUser;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @var AuthenticatesUser
     */
    protected $auth;

    /**
     * Create a new controller instance.
     *
     * @param AuthenticatesUser $auth
     */
    public function __construct(AuthenticatesUser $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Show the login page.
     *
     * @return Response
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Handle the login form submission.
     *
     * @return string
     */
    public function postLogin()
    {
        $this->auth->invite();

        // Or redirect to a page with this message.
        return 'Please wait a moment...';
    }

    /**
     * Login the user, using the given token.
     *
     * @param  LoginToken $token
     * @return string
     */
    public function authenticate(LoginToken $token)
    {
        $this->auth->login($token);
        return redirect('/dashboard');
        //  return redirect('dashboard');
    }

    /**
     * Log out the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Or put this on AuthenticatesUser, and
        // do $this->auth->logout();
        auth()->logout();
        return redirect('/');
    }
}
