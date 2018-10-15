<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //

    public function __construct(){
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        //validate formdata
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'

        ]);

        //attempt to log user in need guard admin otherwise default user
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
        //if succesful redirect to location
            return redirect()->intended(route('admin.dashboard'));
        } else{
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
        
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }

}
