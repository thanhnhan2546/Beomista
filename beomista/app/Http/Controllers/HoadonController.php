<?php

namespace App\Http\Controllers;

use App\Models\hoadon;
use App\Models\KhachHang;
use App\Models\kho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoadonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = hoadon::orderBy('NGAYLAP','DESC')->Paginate(15);
        return view('admin.hoadon.hoadon', compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function show(hoadon $hoadon)
    {
       
       $kh = KhachHang::find($hoadon->MAKH);
     
       $cthd = DB::table('chitiethoadon')->where('MAHD',$hoadon->MAHD)->get();
    //    dd($cthd);
    foreach($cthd as $c){
        $sp = DB::table('sanpham')->where('MASP',$c->MASP)->get();
        $ct[] = array(
            'MASP'=>$c->MASP,
            'THANHTIEN'=>$c->THANHTIEN,
            'DONGIA'=>$c->DONGIA,
            'SOLUONG'=>$c->SOLUONG,
            'ANHSP'=>$sp[0]->ANH,
            'TENSP'=>$sp[0]->TENSP,
        );
    }
    return view('admin.hoadon.chitiethoadon', compact('hoadon', 'kh','ct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function edit(hoadon $hoadon)
    { 
        DB::table('hoadon')->where('MAHD',$hoadon->MAHD)->update(['TINHTRANG'=>1]);
        $cthd = DB::table('chitiethoadon')->where('MAHD',$hoadon->MAHD)->get();
        foreach($cthd as $c){
            $kho = DB::table('kho')->where('MASP',$c->MASP)->get();
            $sl = array(
                'SLCON'=>$kho[0]->SLCON,
            );
            // DB::table('kho')->where('MAHD',$hoadon->MAHD)->update(['TINHTRANG'=>1]);
            echo($sl['SLCON'].'<br>');
            $sau = $sl['SLCON'] - $c->SOLUONG;
            echo($sau);
            DB::table('kho')->where('MASP',$c->MASP)->update(['SLCON'=>$sau]);
        }
        return redirect()->route('hoadon.index')->with('success', 'Đã xác nhận đơn hàng '.$hoadon->MAHD);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hoadon $hoadon)
    {
       
        // hoadon::update($hoadon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hoadon  $hoadon
     * @return \Illuminate\Http\Response
     */
    public function destroy(hoadon $hoadon)
    {
        
        $cthd = DB::table('chitiethoadon')->where('MAHD',$hoadon->MAHD)->get();
        foreach($cthd as $c){
            $kho = DB::table('kho')->where('MASP',$c->MASP)->get();
            $sl = array(
                'SLCON'=>$kho[0]->SLCON,
            );
            // DB::table('kho')->where('MAHD',$hoadon->MAHD)->update(['TINHTRANG'=>1]);
            echo($sl['SLCON'].'<br>');
            $sau = $sl['SLCON'] + $c->SOLUONG;
            echo($sau);
            DB::table('kho')->where('MASP',$c->MASP)->update(['SLCON'=>$sau]);
        }
        $hoadon->delete();
        return redirect()->route('hoadon.index')->with('success', 'Đã xác nhận hủy đơn hàng '.$hoadon->MAHD);
    }
}
