<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Admin\admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {

        //validate the form data
        $this->validate($request,['email'=>'required','password'=>'required']);
         
         //attempt to login the user
        if (Auth::guard('admin')->attempt([
            'email'=>$request->email,
            'password'=>$request->password])) {
           //if successfull
            return redirect()->intended(route('admin.home'));

            //if unsuccessfull
            return redirect()->back()->withInput($request->only('email'));
        }

       
    }

    protected function credentials(Request $request)
    {
        $admin = admin::where('email',$request->email)->first();
        if (count($admin)) {
            if ($admin->status == 0) {
                return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
            }else{
                return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
            }
        }
        return $request->only($this->username(), 'password');
    }
public function logoutAdmin(){
      
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect(route('admin.login'));
       

    }

   

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
