@extends('layouts.site')
@section('main')

<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">home</a></li>
                        <li>/</li>
                        <li>pay</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<form action="{{route('home.addBill')}}" method="POST">
    @csrf
<div class="customer_login">
    <div class="container">
        <div class="row">
            <!--login area start-->
            <div class="col-lg-6 col-md-6">
                <div class="account_form register">
                    <h2>Thông tin khách hàng</h2>
                    
                        <input type="hidden" name="MAKH" value="{{session()->get('id')}}">
                        <p>
                            <label>Tên khách hàng <span>*</span></label>
                            <input type="text" name="hoten" value="{{session()->get('fname')}} {{session()->get('name')}}" readonly>
                        </p>
                        <p>
                            <label>Số điện thoại <span>*</span></label>
                            <input type="text" name="phone" value="{{session()->get('phone')}}" readonly>
                        </p>
                        <p>
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="diachi" value="{{session()->get('addr')}} " readonly>
                        </p>
                        <p>
                            <label>Email <span>*</span></label>
                            <input type="text" name="email" value="{{session()->get('email')}} " readonly>
                        </p>


                    

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="account_form">
                    <h2>Sản phẩm</h2>

                    <div class="shopping_cart_area">

                        <form action="">
                            <div class="row">
                                <div class="col-12">


                                    <table>
                                        <thead>
                                            <tr>

                                                <th class="product_thumb" style="text-align: center;">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price" style="text-align: center;">Price</th>
                                                <th class="product_quantity">Quantity</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $content = Cart::content();

                                            ?>
                                            @foreach($content as $c)
                                            <tr>


                                                <td class="" style="width: 30%;"><a href="#"><img src="{{url('public/img/imgSanpham')}}/{{$c->options->image}}" width="90%" alt=""></a></td>
                                                <td class="" style="width: 40%;"><a href="#">{{$c->name}}</a></td>
                                                <td class="product-price" style="width: 30%;text-align: center;">{{number_format($c->price)}} VNĐ</td>
                                                <td style="width: 40px; text-align: center;">{{$c->qty}}</td>



                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>




                                </div>
                            </div>



                        </form>

                    </div>


                    </form>
                    <div class="coupon_code right">

                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Tổng mặt hàng</p>
                                <p class="cart_amount">{{Cart::content()->count()}}</p>
                            </div>
                            <div class="cart_subtotal ">
                                <p>Tổng sản phẩm</p>
                                <p class="cart_amount">{{Cart::count()}}</p>
                            </div>
                            <a href=""></a>

                            <div class="cart_subtotal">
                                <p>Tổng tiền</p>
                                <p class="cart_amount">{{Cart::subtotal()}}</p>
                            </div>
                            <div class="checkout_btn">
                                <button type="submit" >Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--login area start-->

            <!--register area start-->

            <!--register area end-->
        </div>
    </div>
</div>
</form>
@stop