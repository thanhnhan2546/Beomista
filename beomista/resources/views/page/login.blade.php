@extends('layouts.site')
@section('main')
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>login</h2>
                    @if(Session::has('successAdd'))
                    <div class="alert alert-success">
                        <strong id="success">{{Session::get('successAdd')}}</strong>
                        <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    
                    @endif
                    @if(Session::has('errorLogin'))
                    <div class="alert alert-success">
                        <strong id="success">{{Session::get('errorLogin')}}</strong>
                        <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                    @endif
                    <form action="{{route('home.checklogin')}}" method="POST">
                        @csrf
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="text" name="email">
                        </p>

                        <p>
                            <label>Passwords <span>*</span></label>
                            <input type="password" name="password">
                        </p>

                        <div class="login_submit">
                            <a href="#">Lost your password?</a>
                            <label for="remember">
                                <input id="remember" type="checkbox">
                                Remember me
                            </label>
                            <button type="submit">login</button>

                        </div>

                    </form>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->

            <!--register area end-->
        </div>
    </div>
</div>
@stop