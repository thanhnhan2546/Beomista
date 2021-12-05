@extends('layouts.admin')

@section('main')
@if(Session::has('success'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong id="success">{{Session::get('success')}}</strong>
</div>
@endif



</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th style="text-align:center;">Mã Hóa đơn</th>
            <th style="text-align:center;">Mã khách hàng</th>
            <th style="text-align:center;">Ngày lập</th>
            <th style="text-align:center;">Tổng tiền</th>
            <th style="text-align:center;">Tình trạng</th>
            @if(session()->get('quyen')=='admin'|| session()->get('quyen')=='ql')
            <th >Comment</th>
           
            <th style="text-align:center;"> </th>
               @endif   

        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td style="vertical-align: middle;text-align:center;">{{$d->MAHD}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$d->MAKH}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$d->NGAYLAP}}</td>
            <td style="vertical-align: middle;text-align:center;">{{$d->TONGTIEN}}</td>
            
           
            @if($d->TINHTRANG==0)
            <td style="vertical-align: middle;text-align:center;"><i class="alert alert-warning">Đang chờ xác nhận</i></td>
            @endif
            @if($d->TINHTRANG==1)
            <td style="vertical-align: middle;text-align:center;"><i class="alert alert-primary">Đã xác nhận</i></td>
            @endif
            
            @if($d->TINHTRANG==2)
            <td style="vertical-align: middle;text-align:center;"><i class="alert alert-danger">Muốn hủy đơn</i></td>
            
            @endif
            @if($d->TINHTRANG==3)
            <td style="vertical-align: middle;text-align:center;"><i class="alert alert-success">Đã giao hàng</i></td>
            @endif
            @if(session()->get('quyen')=='admin'|| session()->get('quyen')=='ql')
            <td style="vertical-align: middle">{{$d->CMT}}</i></td>
            <td style="vertical-align: middle;text-align:center;"class="text-right">
            <a href="{{route('hoadon.show', $d->MAHD)}}"  class="btn btn-sm btn-outline-info " >
                    Chi tiết
            </a>
            @if($d->TINHTRANG==0)
            <a href="{{route('hoadon.edit',$d->MAHD)}}" class="btn btn-sm btn-primary " id="">
                    <i class="">Xác nhận đơn hàng</i>
                </a>
                @endif
            @if($d->TINHTRANG==2)
            <a href="{{route('hoadon.destroy',$d->MAHD)}}" class="btn btn-sm btn-danger btnDel" id="">
                    <i class="">Xác nhận hủy đơn</i>
                </a>
                @endif

            </td>
           @endif
        </tr>

        @endforeach
    </tbody>
</table>
<div class="">
    {{$data->appends(request()->all())->links()}}
</div>
<form method="POST" action="" class="formDel">
    @csrf @method('DELETE')
</form>
@stop
@section('name')
<p>Hóa đơn</p>
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
<script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $('.btnAdd').click(function(ev){
        ev.preventDefault();
        $.ajax({
            type: 'get',
            url: 'sanpham/create',
            dataType: "json",
            success: function(response){
               
                for(var i=0; i<response.count;i++){
                     console.log(response.loai[i].MALOAI);
                    // $('#maloai').append('<option value="1">One</option>');
                    var option = new Option(response.loai[i].TENLOAI, response.loai[i].MALOAI);
                $('#maloaiAdd').append($(option));
                }
                // $('#maloaiAdd').append('<option value="1">One</option>');
                //$('#SOluong').val(response.count);
                // var option = new Option(response.loai, "value1", true,true);
                // $('#maloaiAdd').append($(option));
            }
        })
    })
    $('.btnDel').click(function(ev) {
        ev.preventDefault();
        var _href = $(this).attr('href');
        // alert(_href);
        $('.formDel').attr('action', _href);
        if (confirm("Bạn có chắc muốn hủy đơn hàng")) {
            $('.formDel').submit();
        }
    })
    $('.btnEdit').click(function(ev){
        var url = $(this).attr('data-url');
        
        ev.preventDefault();
        $.ajax({
            type: 'get',
            url: url,
            dataType: "json",
            success: function(response){
                
                for(var i=0; i<response.count;i++){
                    
                    // $('#maloai').append('<option value="1">One</option>');
                    var option = new Option(response.loai[i].TENLOAI, response.loai[i].MALOAI);
                $('#maloaiEdit').append($(option));
                }
                 if(response.status==200){
                     $('#maspEdit').val(response.SP[0].MASP);
                     
                     $('#tenspEdit').val(response.SP[0].TENSP);
                     $('#dvtinhEdit').val(response.SP[0].DVTINH);
                     $('#dongiaEdit').val(response.SP[0].DONGIA);
                     $('#maloaiEdit').val(response.SP[0].MALOAI);
                     $('#motaEdit').val(response.SP[0].MOTA);
                     $('#anhEdit').val(response.SP[0].ANH);
                     $('#form-edit').attr('data-url','{{ asset("admin/sanpham/") }}/'+response.SP[0].MASP)
                     
                 }
            }
        })
    })
//   
$('#form-edit').submit(function(e){
					e.preventDefault();
					var url=$(this).attr('data-url');
                    console.log($('#uploadEdit').val());
					$.ajax({
						type: 'put',
						url: url,
						data: {
                            
							MASP: $('#maspEdit').val(),
                            TENSP:  $('#tenspEdit').val(),
                            DVTINH: $('#dvtinhEdit').val(),
                            DONGIA: $('#dongiaEdit').val(),
                            MALOAI: $('#maloaiEdit').val(),
                            MOTA: $('#motaEdit').val(),
                            
						},
						success: function(response) {
							// console.log(response.studentid)
							 window.location.reload();
                           alert(response.with);
                       
						},
						error: function (jqXHR, textStatus, errorThrown) {
							//xử lý lỗi tại đây
						}
					})
				})
</script>
<!-- @stop -->
@section('css')
<link rel="stylesheet" href="{{url('public/css/addform')}}/addForm.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop