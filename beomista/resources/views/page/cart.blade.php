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
                        <li>cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- shopping cart area start -->
<div class="shopping_cart_area">
    <div class="container">
        @if(Session::has('successPay'))
        <div class="alert alert-success">
            <strong id="success">Đặt hàng thành công</strong>
            <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        @if(Session::has('errorsCus'))
        <div class="alert alert-success">
            <strong id="success">{{Session::get('errorsCus')}}</strong>
            <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        <form action="">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $content = Cart::content();

                                    ?>
                                    @foreach($content as $c)
                                    <tr>

                                        <td class="product_remove btnDel"><a href="{{route('home.delCart',$c->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_thumb"><a href="#"><img src="{{url('public/img/imgSanpham')}}/{{$c->options->image}}" alt=""></a></td>
                                        <td class="product_name"><a href="#">{{$c->name}}</a></td>
                                        <td class="product-price">{{number_format($c->price)}} VNĐ</td>
                                        <td class="product_quantity"><input min="1" max="100" value="{{$c->qty}}" type="number" data-id="{{$c->rowId}}"></td>

                                        <?php
                                        $sub = $c->price * $c->qty;
                                        ?>
                                        <td class="product_total">{{number_format($sub)}} VNĐ</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($content->count()!=0)
                        <div class="cart_submit">
                            <button class="update-all" type="button">update cart</button>
                        </div>
                        @else
                        <i>Giỏ hàng trống</i>
                        @endif
                    </div>
                </div>
            </div>

            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Cart Totals</h3>
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
                                @if($content->count()!=0)
                                <div class="checkout_btn">
                                    <a href="{{route('home.payment')}}">Đặt hàng</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->

        </form>
    </div>
</div>

@stop