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
        return view('admin.loaisanpham.loaisanpham',compact('data'));
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
    public function edit(loaiSanpham $loaiSanpham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loaiSanpham $loaiSanpham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\loaiSanpham  $loaiSanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy(loaiSanpham $loaiSanpham)
    {
        //
    }
}
