<?php

namespace App\Http\Controllers;

use App\Models\loaiSanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LengthException;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $data = Sanpham::Paginate(15);
        if($key =  request()->key){
            $data = sanpham::search()->Paginate(15);
        };
       
        return view('admin.sanpham.sanpham', compact('data'));
     


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
        $validator = Validator::make($request->all(),[
            'MASP'=>'required',
            'TENSP'=>'required',
            'DVTINH'=>'required',
            'DONGIA'=>'required',
            'MALOAI'=>'required',
            'MOTA'=>'required',
            'uploadAdd'=>'required',
        ]);
        if ($validator->fails()) {
            
            return redirect()->route('sanpham.index')->with('errors','Thêm sản phẩm không thành công, bạn đã để trống một ô');
        }
        if (sanpham::find($request->MANCC)) {
            return redirect()->route('sanpham.index')->with('errors','Thêm sản phẩm không thành công, mã sản phẩm đã tồn tại');
        }
        if($request->has('uploadAdd')){
            $img_name = $request->uploadAdd->getClientOriginalName();
            $request->uploadAdd->move(public_path('img/imgSanpham'),$img_name);
            $request->merge(['ANH'=> $img_name]);
            
        }
        $today = date('Y-m-d');
        $request->merge(['NGAYLAP'=>$today]);
        // dd($request->all());
       $addd = sanpham::create($request->all());
       if($addd){
           return redirect()->route('sanpham.index')->with('success','Đã thêm thành công sản phẩm '.$request->MASP);
       }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(sanpham $sanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit(sanpham $sanpham)
    {
        $loai = loaiSanpham::orderBy('TENLOAI', 'ASC')->get();
        $count = $loai->count();
       
       $sp = sanpham::find($sanpham);
       
       if($sp){
           return response()->json([
               'status'=>200,
               'SP'=> $sp,
               'loai'=> $loai, 
               'count'=>$count
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sanpham $sanpham)
    {
        $validator = Validator::make($request->all(),[
            'MASP'=>'required',
            'TENSP'=>'required',
            'DVTINH'=>'required',
            'DONGIA'=>'required',
            'MALOAI'=>'required',
            'MOTA'=>'required',
           
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=> $request, 'with'=>'Chỉnh sửa không thành công, bạn đã để trống']);
        }
       
          $SP = $sanpham->update($request->all());
        return response()->json(['status'=> $request, 'sp'=> $sanpham->ANH, 'with'=>'Đã chỉnh sửa thành công sản phẩm'.$sanpham->MASP]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy(sanpham $sanpham)
    {
       $sanpham->delete();
     return redirect()->route('sanpham.index')->with('success','Đã xóa thành công sản phẩm '.$sanpham->MASP);
    }
}
