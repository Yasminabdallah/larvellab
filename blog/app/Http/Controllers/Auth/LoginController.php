<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
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
    protected $redirectTo = '/home';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function guard()
    {
     return Auth::guard('socializer');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
    
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }
    public function findOrCreateUser($user)
    {
        $authUser = User::where('uid', $user->getId())->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->getNickname(),
            'email'    =>$user->getEmail(),
            'password'=>$user->getId(),
            'uid' => $user->getId()
        ]);
    }
        
       
       
      
    
}
