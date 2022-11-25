@extends('layouts.site')
@section('main')
@include('page.editProfile')
@include('page.editPass')
<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="">home</a></li>
                    <li>/</li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="about_us" class="about-us container-fluid" style="margin: 20px 0px 100px 0px;">
    <div class="container">
    @if(Session::has('successAdd'))
                    <div class="alert alert-success">
                        <strong id="success">{{Session::get('successAdd')}}</strong>
                        <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    
                    @endif
                    @if(Session::has('errorLogin'))
                    <div class="alert alert-danger">
                        <strong id="success">{{Session::get('errorLogin')}}</strong>
                        <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    @endif
        <div class="session-title row">
            <h2>Thông tin cá nhân</h2>

            <div class="heading-line"></div>
        </div>
        <div class="about-row row" style="margin-top: 30px;">
            <div class="image-col col-md-4">
                @if($kh->GIOITINH=='nam')
                <img src="{{url('/img/icon')}}/male.png" alt="">
                @endif
                @if($kh->GIOITINH =='nu')
                <img src="{{url('/img/icon')}}/female.png" alt="">
                @endif
            </div>
            <div class="detail-col col-md-8">
                <h2>{{$kh->HOKH}} {{$kh->TENKH}}</h2>
                <h4>Mã khách hàng: {{$kh->MAKH}}</h4>
                <p> </p>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6 col-12">
                        <div class="info-list" >
                            <ul style="margin-bottom: 40px;">
                                @if($kh->GIOITINH=='nam')
                                <li><span>Giới tính: </span>Nam</li>
                                @endif
                                @if($kh->GIOITINH=='nu')
                                <li><span>Giới tính: </span>Nữ</li>
                                @endif

                                <li><span>Địa chỉ: </span>{{$kh->DIACHI}}</li>
                                <li><span>Số điện thoại: </span>{{$kh->SDT}}</li>
                                <li><span>Email: </span>{{$kh->EMAIL}}</li>
                            </ul>
                            <button class="btn btn-primary btnEdit"   data-toggle="modal" data-target="#MyModal"> Chỉnh sửa thông tin cá nhân</button><br><br>
                            <button class="btn btn-primary btnEditPass"   data-toggle="modal" data-target="#myModal">Đổi mật khẩu</button>
                        </div>
                    </div>

                </div>


            </div>



        </div>
    </div>

</div>
@stop