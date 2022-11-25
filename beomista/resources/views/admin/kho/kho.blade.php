@extends('layouts.admin')

@section('main')
@if(Session::has('success'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong id="success">{{Session::get('success')}}</strong>
</div>
@endif
@if(Session::has('errors'))

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong id="success">{{Session::get('errors')}}</strong>
</div>
@endif
@include('admin.kho.editKho')
@include('admin.kho.createKho')

</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Mã nhà cung cấp</th>
            <th>Hạn sử dụng</th>

            <th>Số lượng còn</th>
            <th> </th>

        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td style="vertical-align: middle;"">{{$d->MASP}}</td>
            <td style="vertical-align: middle;">{{$d->MANCC}}</td>
            <td style="vertical-align: middle;">{{$d->HSD_SP}}</td>
            <td style="vertical-align: middle;">{{$d->SLCON}}</td>
            @if(session()->get('quyen')=='admin' || session()->get('quyen')=='ql')
            <td style="vertical-align: middle;"class="text-right">
            <button type="button" data-url="{{route('kho.edit', $d->MASP)}}" class="btn btn-sm btn-success btnEdit"  data-toggle="modal" data-target="#MyModal">
                    <i class="fas fa-edit"></i>
            </button>
            <a href="{{route('kho.destroy', $d->MASP)}}" class="btn btn-sm btn-danger btnDel" id="">
                    <i class="fas fa-trash"></i>
                </a>
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
<p>Kho</p>
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
            url: 'kho/create',
            
            dataType: "json",
            success: function(response){
               console.log(response);
                for(var i=0; i<response.count;i++){
                     console.log(response.ncc[i].MANCC);
                    var option = new Option(response.ncc[i].TENNCC, response.ncc[i].MANCC);
                $('#manccAdd').append($(option));
                }
                for(var i=0; i<response.count2;i++){
                     console.log(response.sp[i].MASP);
                    var option = new Option(response.sp[i].MASP, response.sp[i].MSP);
                $('#maspAdd').append($(option));
                }
            }
        })
    })
   
    $('.btnDel').click(function(ev) {
        ev.preventDefault();
        var _href = $(this).attr('href');
        // alert(_href);
        $('.formDel').attr('action', _href);
        if (confirm("Bạn có chắc muốn xóa")) {
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
                console.log(response);
                for(var i=0; i<response.count;i++){
                    
                    // $('#maloai').append('<option value="1">One</option>');
                    var option = new Option(response.ncc[i].TENNCC, response.ncc[i].MANCC);
                $('#manccEdit').append($(option));
                }
                 if(response.status==200){
                     $('#dongiaEdit').val(response.SP[0].MASP);
                     $('#hsd').val(response.SP[0].HSD_SP);
                     $('#manccEdit').val(response.SP[0].MANCC);
                     $('#dvtinhEdit').val(response.SP[0].SLCON);
                    
                     $('#form-edit').attr('data-url','{{ asset("admin/kho/") }}/'+response.SP[0].MASP)
                     
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
                            
							MASP: $('#dongiaEdit').val(),
                            MANCC: $('#manccEdit').val(),
                            DVTINH: $('#hsd').val(),
                            
                            SLCON: $('#dvtinhEdit').val(),
                            
						},
						success: function(response) {
							
							 window.location.reload();
                           alert(response.with);
                       
						},
						error: function (response) {
							window.location.reload();
                           alert(response.with);
						}
					})
				})
</script>
<!-- @stop -->
@section('css')
<link rel="stylesheet" href="{{url('/css/addform')}}/addForm.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop