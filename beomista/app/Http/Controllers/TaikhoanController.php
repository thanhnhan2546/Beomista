<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaikhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::Paginate(15);
        return view('admin.taikhoan.taikhoan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'TENDN'=>'required',
            'password'=>'required',
            'password2'=>'required',
            'QUYEN'=>'required',
            
        ]);
        if ($validator->fails()) {
            
            return redirect()->route('taikhoan.index')->with('errors','Thêm tài khoản không thành công, bạn đã để trống một ô');
        }
        if($request->password != $request->password2){
            return redirect()->route('taikhoan.index')->with('errors','Thêm tài khoản không thành công, hai password không trùng khớp');
        }
        $pass = bcrypt($request->password);
        $request->merge(['password'=>$pass]);
        $addd = User::create($request->all());
        if($addd){
            return redirect()->route('taikhoan.index')->with('success','Đã thêm thành công tài khoản '.$request->TENDN);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
         DB::table('taikhoan')->where('TENDN',$user)->delete();
        // echo($user);
     return redirect()->route('taikhoan.index')->with('success','Đã xóa thành công tài khoản '.$user);
    }
}
