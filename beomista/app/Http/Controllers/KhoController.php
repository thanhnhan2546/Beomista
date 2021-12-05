<?php

namespace App\Http\Controllers;

use App\Models\kho;
use App\Models\nhacungcap;
use App\Models\sanpham;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kho::Paginate(15);
        return view('admin.kho.kho', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ncc = nhacungcap::orderBy('TENNCC', 'ASC')->get();
        $count = $ncc->count();
        $sp = sanpham::orderBy('MASP', 'ASC')->get();
        $count2 = $sp->count();
        return response()->json(['ncc'=> $ncc, 'count'=>$count,'count2'=>$count2,  'sp'=>$sp]);
        
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
            'MANCC'=>'required',
            'HSD_SP'=>'required',
            'SLCON'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('kho.index')->with('errors','Thêm không thành công, bạn đã để trống một ô');
        }
        if(Kho::find($request->MASP)){
            return redirect()->route('kho.index')->with('errors','Thêm không thành công. Sản phẩm này đã có trong kho');
        }
        $addd = kho::create($request->all());
        if($addd){
            return redirect()->route('kho.index')->with('success','Đã thêm thành công ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function show(kho $kho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function edit(kho $kho)
    {
        $loai = nhacungcap::orderBy('TENNCC', 'ASC')->get();
        $count = $loai->count();
       
       $sp = kho::find($kho);
       
       if($sp){
           return response()->json([
               'status'=>200,
               'SP'=> $sp,
               'ncc'=> $loai, 
               'count'=>$count
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kho $kho)
    {
        $validator = Validator::make($request->all(),[
            'MASP'=>'required',
            'MANCC'=>'required',
            'HSD_SP'=>'required',
            'SLCON'=>'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=> $request, 'with'=>'Chỉnh sửa không thành công, bạn đã để trống']);
        }
        
        $SP = $kho->update($request->all());
        return response()->json(['status'=> $request, 'with'=>'Đã chỉnh sửa thành công ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kho  $kho
     * @return \Illuminate\Http\Response
     */
    public function destroy(kho $kho)
    {
        //
    }
}
