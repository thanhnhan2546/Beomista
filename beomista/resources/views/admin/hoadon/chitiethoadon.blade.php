@extends('layouts.admin')

@section('main')

<a type="button" href="{{route('hoadon.index')}}" class="btn btn-outline-secondary" >Quay lại</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="text-align:center;">Mã khách hàng</th>
            <th style="text-align:center;">Ngày lập</th>
            <th style="text-align:center;">Tên khách hàng</th>
            <th style="text-align:center;">Giới tính</th>
            <th style="text-align:center;">Số điện thoại</th>
            <th style="text-align:center;">Địa chỉ</th>
            <th style="text-align:center;">Email</th>

        </tr>
    </thead>
    <tbody>
        
        <tr>
            <td style="vertical-align: middle;text-align:center;">{{$kh->MAKH}}</td>
            <td style="vertical-align: middle;text-align:center;">{{ \Carbon\Carbon::parse($hoadon->NGAYLAP)->format('d-m-Y')}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$kh->TENKH}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$kh->GIOITINH}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$kh->SDT}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$kh->DIACHI}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$kh->EMAIL}}</td>
            
           
        </tr>

       
    </tbody>
</table>

<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center;">Mã sản phẩm</th>
            <th >Tên sản phẩm</th>
            <th style="text-align:center;">Ảnh sản phẩm</th>
            <th style="text-align:center;">Số lượng đặt</th>
            <th style="text-align:center;">Đơn giá</th>
            <th style="text-align:center;">Thành tiền</th>
          

        </tr>
    </thead>
    <tbody>
        @foreach($ct as $c)
        <tr>
            <td style="vertical-align: middle;text-align:center;">{{$c['MASP']}}</td>
            <td >{{$c['TENSP']}}</td>
            <td style="vertical-align: middle;"><img src="{{url('/img/imgSanpham')}}/{{$c['ANHSP']}}" width="110px" ></td>
            <td style="vertical-align: middle;text-align:center;">{{$c['SOLUONG']}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$c['DONGIA']}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$c['THANHTIEN']}}</td>
           
            
           
        </tr>
        @endforeach
       
    </tbody>
</table>
<div class="">
    
</div>
<form method="POST" action="" class="formDel">
    @csrf @method('DELETE')
</form>
@stop
@section('name')
<p>Hóa đơn / Hóa đơn {{$hoadon->MAHD}}</p>
@stop
@section('search')
<form class="form-inline" action="">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" name="key" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</form>

@stop
<!-- @section('js') -->

<!-- @stop -->
@section('css')
<link rel="stylesheet" href="{{url('/css/addform')}}/addForm.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop