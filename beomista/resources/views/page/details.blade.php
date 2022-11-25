@extends('layouts.site')
@section('main')

<div class="breadcrumbs_area other_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>home</li>
                        <li>/</li>
                        <li>cart</li>
                        <li>/</li>
                        <li>Mã đơn hàng: {{$id}}</li>
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
       
        
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                <thead>
                                    <tr>
                                        
                                        <th class="product_thumb">Ảnh sản phẩm</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product-price">Đơn giá</th>
                                        <th class="product_quantity">Số lượng đặt</th>
                                        <th class="product_total">Tổng tiền</th>

                                    </tr>
                                </thead>
                                </thead>
                                <tbody>
                                     @foreach($cthd as $c)
                                    
                                    <tr>

                                       
                                        <td class="product_thumb" style="width: 40px;"><a href="#"><img src="{{url('/img/imgSanpham')}}/{{$c['ANHSP']}}" alt=""></a></td>
                                        <td class="product_name"><a href="#">{{$c['TENSP']}}</a></td>
                                        <td class="product-price">{{number_format($c['DONGIA'])}} VNĐ</td>
                                        <td class="product_quantity">{{$c['SOLUONG']}}</td>
                                        <td class="product_total">{{number_format($c['THANHTIEN'])}} VNĐ</td>

                                    </tr>
                                    
                                    @endforeach
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            </div>

            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">

                    </div>
                    <div class="col-lg-6 col-md-6">
                       
                            <div class="coupon_inner">
                               
                                <a href=""></a>

                                <div class="cart_subtotal">
                                    <p>Tổng tiền</p>
                                    <p class="cart_amount">{{number_format($total)}} VNĐ</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

      
    </div>
</div>

@stop