<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\loaiSanpham;
use App\Models\sanpham;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class AccountCus extends Controller
{
    public function login()
    {
        $loai = loaiSanpham::all();
        return view('page.login', compact('loai'));
    }
    public function checklogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('home.login')->with('errorLogin','Email nhập sai hoặc bạn đã không nhập một trường nào đó');
        }
        $email = $request->email;
        $pass = md5($request->password);
        $kh = DB::table('khachhang')->where('EMAIL',$email)->first();
        if($kh){
            if(DB::table('khachhang')->where('EMAIL',$email)->where('password',$pass)->first()){
               session()->put('fname', $kh->HOKH);
               session()->put('name', $kh->TENKH);
               session()->put('email', $kh->EMAIL);
               session()->put('phone', $kh->SDT);
               session()->put('addr', $kh->DIACHI);
               session()->put('id', $kh->MAKH);
               session()->put('sex', $kh->GIOITINH);
               return redirect()->route('home.index');
            }else{
                return redirect()->route('home.login')->with('errorLogin','Mật khẩu không đúng');
            }
        }else{
            return redirect()->route('home.login')->with('errorLogin','Email không đúng');
        }
    }
    public function logout(){
        session()->forget('fname');
               session()->forget('name');
               session()->forget('email');
               session()->forget('phone');
               session()->forget('addr');
               session()->forget('id');
               session()->forget('sex');
        return redirect()->route('home.index');
    }
    public function register(){
        $loai = loaiSanpham::all();
        return view('page.register', compact('loai'));
    }
   
    public function addRegister(Request $request)
    {
        $pass = md5($request->password);
        DB::table('khachhang')->insert(['MAKH'=>null, 'HOKH'=>$request->HOKH, 'TENKH'=>$request->TENKH, 'GIOITINH'=>$request->GIOITINH, 
                                        'SDT'=>$request->SDT, 'DIACHI'=>$request->DIACHI, 'EMAIL'=>$request->EMAIL, 'password'=>$pass]);
        return redirect()->route('home.login')->with('successAdd','Đã thêm thành công, bây giờ bạn có thể đăng nhập');
        }
    public function profile()
    {
        $kh = KhachHang::find(session()->get('id'));
        $loai = loaiSanpham::all();
        return view('page.profile', compact('loai','kh'));
    }
    public function edit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'EMAIL' => 'required|email',
            'password' => 'required',
            'MAKH' => 'required',
            'HOKH' => 'required',
            'TENKH' => 'required',
            'SDT' => 'required',
            'DIACHI' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('home.profile')->with('errorLogin','Bạn chưa nhập password hoặc chưa nhập một mục nào đó');
        }
        
        $pass = md5($request->password);
        // if(DB::table('khachhang')->where('MAKH',$request->MAKH)->where('password',$pass)->first() )
}
}
