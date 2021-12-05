<?php

namespace App\Http\Controllers;

use App\Models\loaiSanpham;
use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = loaiSanpham::Paginate(15);
        if($key =  request()->key){
            $data = loaiSanpham::search()->Paginate(15);
        };
       
        return view('admin.loaisanpham.loaisanpham', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loai = loaiSanpham::orderBy('TENLOAI', 'ASC')->get();
        $count = $loai->count();
        return response()->json(['loai'=> $loai, 'count'=>$count]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $addd = loaiSanpham::create($request->all());
       if($addd){
           return redirect()->route('loaisanpham.index')->with('success','Đã thêm thành công sản phẩm '.$request->MALOAI);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */
    public function show(loaiSanpham $loaiSanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */

    public function edit(loaisanpham $loaisanpham)
    {
       
       
       $sp = loaiSanpham::find($loaisanpham);
       
       if($sp){
           return response()->json([
               'status'=>200,
               'SP'=> $sp,
               
           ]);
       }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loaisanpham $loaisanpham)
    {
        $SP = $loaisanpham->update($request->all());
        return response()->json(['status'=> $request,  'with'=>'Đã chỉnh sửa thành công sản phẩm'.$loaisanpham->MALOAI]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy(loaisanpham $loaisanpham)
    {
        $loaisanpham->delete();
     return redirect()->route('loaisanpham.index')->with('success','Đã xóa thành công sản phẩm '.$loaisanpham->MALOAI);
    }
}
