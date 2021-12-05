<?php

namespace App\Http\Controllers;

use App\Models\nhacungcap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Nhacungcap::Paginate(15);
        if($key =  request()->key){
            $data = nhacungcap::search()->Paginate(15);
        };
       
        return view('admin.nhacungcap.nhacungcap', compact('data'));
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
            'MANCC'=>'required',
            'TENNCC'=>'required',
            'DIACHI'=>'required',
            'SDT'=>'required',
            'EMAIL'=>'required|email',
            
        ]);
        if ($validator->fails()) {
            return redirect()->route('nhacungcap.index')->with('errors','Thêm không thành công, bạn đã để trống một ô hoặc sai email');
        }
        if (nhacungcap::find($request->MANCC)) {
            return redirect()->route('nhacungcap.index')->with('errors','Thêm không thành công, nhà cung cấp đã tồn tại');
        }
        $addd = nhacungcap::create($request->all());
        if($addd){
            return redirect()->route('nhacungcap.index')->with('success','Đã thêm nhà cung cấp thành công  '.$request->MANCC);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function show(nhacungcap $nhacungcap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function edit(nhacungcap $nhacungcap)
    {
        $ncc = nhacungcap::find($nhacungcap);
       
        if($ncc){
           return response()->json([
               'status'=>200,
               'NCC'=> $ncc,
               
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhacungcap $nhacungcap)
    {
        $validator = Validator::make($request->all(),[
            'MANCC'=>'required',
            'TENNCC'=>'required',
            'DIACHI'=>'required',
            'SDT'=>'required',
            'EMAIL'=>'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=> $request, 'with'=>'Chỉnh sửa không thành công, bạn đã để trống hoặc sai email']);
        }
       
        $NCC = $nhacungcap->update($request->all());
        return response()->json(['status'=> $NCC, 'ncc'=> $nhacungcap, 'with'=>'Đã chỉnh sửa thành công nhà cung cấp có mã '.$nhacungcap->MANCC]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhacungcap  $nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhacungcap $nhacungcap)
    {
        $nhacungcap->delete();
        return redirect()->route('nhacungcap.index')->with('success','Đã xóa thành công nhà cung cấp '.$nhacungcap->MANCC);
    }
}
