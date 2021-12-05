<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Khachhang::Paginate(15);
        if($key =  request()->key){
            $data = khachhang::search()->Paginate(15);
        };
       
        return view('admin.khachhang.khachhang', compact('data'));
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
        //
        $addd = khachhang::create($request->all());
        if($addd){
            return redirect()->route('khachhang.index')->with('success','Đã thêm thành công khách hàng '.$request->MAKH);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function show(KhachHang $khachHang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function edit(KhachHang $khachhang)
    {
        //
       
       
       $kh = khachhang::find($khachhang);
       
       if($kh){
           return response()->json([
               'status'=>200,
               'KH'=> $kh,
               
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KhachHang $khachhang)
    {
        //
        $KH = $khachhang->update($request->all());
        return response()->json(['status'=> $KH, 'kh'=> $khachhang, 'with'=>'Đã chỉnh sửa thành công khách hàng'.$khachhang->MAKH]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KhachHang  $khachHang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KhachHang $khachhang)
    {
        //
        $khachhang->delete();
        return redirect()->route('khachhang.index')->with('success','Đã xóa thành công khách hàng '.$khachhang->MAKH);
    }
}
