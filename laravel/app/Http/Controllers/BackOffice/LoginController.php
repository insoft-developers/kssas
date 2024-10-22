<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login() {
        $view = 'backoffice-login';
        $setting = Setting::findorFail(1);
        return view('backend.login', compact('view','setting'));
    }
    
    
    public function processLogin(Request $request) {
        $input = $request->all();
        $data = [
          "email" => $input['loginEmail'],
          "password" => $input['loginPassword']
        ];
        
        if(Auth::Attempt($data)) {
            return redirect('/backoffice');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect(route('login'));
        }
    }
    
    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/backoffice');
    }
}
