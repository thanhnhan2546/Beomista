<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
session_start();
class AdminControllers extends Controller
{
    public function index(){
        return view('admin.dasboard');
    }
    public function showLogin()
    {
        return view('admin.login');
    }
    public function chekLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'passwd' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $remember = $request->remember;

        if (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN'=>'admin'])) {
            session()->put('tendn',$request->user);
                session()->put('quyen','admin');
                 return redirect()->route('admin.index');
                //dd($user_email = auth()->user()->QUYEN);
            }
            elseif (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN'=>'ql'])) {
                session()->put('tendn',$request->user);
                session()->put('quyen','ql');
                 return redirect()->route('admin.index');
                //dd($user_email = auth()->user()->QUYEN);
            }
            elseif (Auth::attempt(['TENDN' => $request->user, 'password' => $request->passwd, 'QUYEN'=>'nv'])) {
                session()->put('tendn',$request->user);
                session()->put('quyen','nv');
                 return redirect()->route('admin.index');
            }else{
                return redirect()->back()->with('errorspw','Sai thông tin đăng nhập');
            }
           
    }
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            session()->forget('quyen');
            session()->forget('tendn');
            return redirect()->route('admin.showLogin');
        }
    }
}