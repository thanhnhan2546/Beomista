@extends('layouts.site')
@section('main')
<div class="customer_login">
    <div class="container">
        <div class="row">


            <div class="account_form ">
                <h2>Register</h2>
                <form action="{{route('home.addregister')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <label>Họ <span>*</span></label>
                                <input type="text" name="HOKH">
                            </p>
                            <p>
                                <label>Giới tính<span>*</span></label><br>
                                <select name="GIOITINH" >
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                            </p>
                            <p>
                                <label>Địa chỉ <span>*</span></label>
                                <input type="text" name="DIACHI">
                            </p>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <p>
                                <label>Tên <span>*</span></label>
                                <input type="text" name="TENKH">
                            </p>

                            <p>
                                <label>Số điện thoại <span>*</span></label>
                                <input type="text" name="SDT">
                            </p>

                            <p>
                                <label>Email address <span>*</span></label>
                                <input type="text" name="EMAIL">
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                        </div>
                    </div>


                    <div class="login_submit">
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <!--register area end-->
    </div>
</div>
</div>
@stop