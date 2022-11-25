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
@include('admin.nhacungcap.editnhacungcap') 
@include('admin.nhacungcap.createnhacungcap')

</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên NCC</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{$d->MANCC}}</td>
            <td>{{$d->TENNCC}}</td>
            <td>{{$d->DIACHI}}</td>
            <td>{{$d->SDT}}</td>
            <td>{{$d->EMAIL}}</td>
            @if(session()->get('quyen')=='admin' || session()->get('quyen')=='ql')
            <td class="text-right">
            <button type="button" data-url="{{route('nhacungcap.edit', $d->MANCC)}}" class="btn btn-sm btn-success btnEdit"  data-toggle="modal" data-target="#MyModal">
                    <i class="fas fa-edit"></i>
            </button>
               
            </td>
            <td class="text-right">
                <a href="{{route('nhacungcap.destroy', $d->MANCC)}}" class="btn btn-sm btn-danger btnDel" id="">
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
<p>Nhà cung cấp</p>
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
            url: 'nhacungcap/create',
            dataType: "json",
            success: function(response){
               
                // for(var i=0; i<response.count;i++){
                //      console.log(response.loai[i].MALOAI);
                //     // $('#maloai').append('<option value="1">One</option>');
                //     var option = new Option(response.loai[i].TENLOAI, response.loai[i].MALOAI);
                // $('#maloaiAdd').append($(option));
                // }
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
                
                 if(response.status==200){
                     $('#manccEdit').val(response.NCC[0].MANCC);
                     $('#tennccEdit').val(response.NCC[0].TENNCC);
                     $('#diachiEdit').val(response.NCC[0].DIACHI);
                     $('#sdtEdit').val(response.NCC[0].SDT);
                     $('#emailEdit').val(response.NCC[0].EMAIL);
                    
                     $('#form-edit').attr('data-url','{{ asset("admin/nhacungcap/") }}/'+response.NCC[0].MANCC)
                     
                 }
            }
        })
    })
//   
$('#form-edit').submit(function(e){
					e.preventDefault();
					var url=$(this).attr('data-url');
					$.ajax({
						type: 'put',
						url: url,
						data: {
							MANCC: $('#manccEdit').val(),
                            TENNCC:  $('#tennccEdit').val(),
                            DIACHI: $('#diachiEdit').val(),
                            SDT: $('#sdtEdit').val(),
                            EMAIL: $('#emailEdit').val(),
                            
						},
						success: function(response) {
							// console.log(response.studentid)
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