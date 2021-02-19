<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Hash;
use Auth;

use App\Models\User;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user)
    {
        if($user->id_role == 1) {
            return redirect()->intended('/adminhome');
        }

        return redirect()->intended('home');
    }
    public function login(Request $request){
        $data = User::where('email','=',$request->email)->first();
        if($data){
            if(Hash::check($request->password,$data->password)){
                Auth::login($data);
                // dd($data);
                if(Auth::user()->role->role=='admin'){
                    return redirect('adminhome');
                }
                return redirect('/');
    
            }
            return redirect()->back()->withErrors('password', 'The Message');
        }
        return redirect()->back()->withErrors('username', 'The Message');

        
    }

}
