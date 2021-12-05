<?php

namespace App\Http\Controllers;

use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Nhanvien::Paginate(15);
        if($key =  request()->key){
            $data = nhanvien::search()->Paginate(15);
        };
       
        return view('admin.nhanvien.nhanvien', compact('data'));
        
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
            'MANV'=>'required',
            'HONV'=>'required',
            'TENNV'=>'required',
            'GIOITINH'=>'required',
            'NGAYSINH'=>'required',
            'DCHI'=>'required',
            'SDT'=>'required',
            'EMAIL'=>'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->route('nhanvien.index')->with('errors','Thêm nhân viên không thành công, bạn đã để trống một ô');
        }
        if (nhanvien::find($request->MANCC)) {
            return redirect()->route('nhanvien.index')->with('errors','Thêm nhân viên không thành công, mã sản phẩm đã tồn tại');
        }
        $addd = nhanvien::create($request->all());
        if($addd){
            return redirect()->route('nhanvien.index')->with('success','Đã thêm nhân viên thành công  '.$request->MANV);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show(nhanvien $nhanvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit(nhanvien $nhanvien)
    {
        $nv = nhanvien::find($nhanvien);
       
        if($nv){
           return response()->json([
               'status'=>200,
               'NV'=> $nv,
               
           ]);
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nhanvien $nhanvien)
    {
        $validator = Validator::make($request->all(),[
            'MANV'=>'required',
            'HONV'=>'required',
            'TENNV'=>'required',
            'GIOITINH'=>'required',
            'NGAYSINH'=>'required',
            'DCHI'=>'required',
            'SDT'=>'required',
            'EMAIL'=>'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=> $request, 'with'=>'Chỉnh sửa không thành công, bạn đã để trống']);
        }
       
        $NV = $nhanvien->update($request->all());
        return response()->json(['status'=> $NV, 'nv'=> $nhanvien, 'with'=>'Đã chỉnh sửa thành công nhân viên có mã '.$nhanvien->MANV]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy(nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanvien.index')->with('success','Đã xóa thành công nhân viên '.$nhanvien->MANV);
    }
}
