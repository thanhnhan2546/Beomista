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
    @if(Session::has('success'))
        <div class="alert alert-success">
            <strong id="success">{{Session::get('success')}}</strong>
            <button style=" position: absolute; right: 5px;" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
        
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Chi tiết</th>
                                        <th class="product_remove">Mã hóa đơn</th>
                                        <th class="product_name">Ngày lập</th>
                                        <th class="product-price">Tổng tiền</th>
                                        <th class="product_quantity">Tình trạng</th>
                                        <th class="product_remove" > </th>
                                        <th class="product_remove"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    @foreach($hd as $c)
                                    <tr>
                                    
                                    <td class="product_remove"><a href="{{route('home.myDetails',$c->MAHD)}}"><img src="{{url('/img/icon')}}/details.jpg" width="50px"></a></td>
                                        <td class="product_remove" ><a href="#">{{$c->MAHD}}</a></td>
                                        <td class="product-price">{{$c->NGAYLAP}}</td>
                                        <td class="product_quantity">{{number_format($c->TONGTIEN)}} VNĐ</td>
                                    <?php
                                        if($c->TINHTRANG == 0){
                                            $status = 'Đang chờ xác nhận';   
                                        }
                                        if($c->TINHTRANG == 1){
                                            $status = 'Đã xác nhận';   
                                        }
                                        if($c->TINHTRANG == 2){
                                            $status = 'Đang chuẩn bị hàng';   
                                        }
                                        if($c->TINHTRANG == 3){
                                            $status = 'Đang giao hàng';   
                                        }
                                        if($c->TINHTRANG == 4){
                                            $status = 'Đã nhận hàng';   
                                        }
                                    ?>
                                       <td class="product_total"><i class="btn btn-sm btn-outline-info" >{{$status}}</i>
                            
                                    </td>  
                                      
                                       @if($c->TINHTRANG== 3)
                                       <td class=""><a href="{{route('home.doneBill',$c->MAHD)}}"><i class="btn btn-sm btn-success"> Đã nhận hàng</i></a></td>
                                       <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Vì đơn hàng đã được xác nhận, vui lòng điền lý do hủy đơn</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="GET" action="{{route('home.cancleBill',$c->MAHD)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                                <div class="form-group">
                                    <label for="maspAdd">Lý do hủy đơn</label>
                                    <textarea value="" type="text" name="CMT" id="maspAdd" class="form-control" ></textarea>
                                </div>
                               
                                <br>
                                <button type="submit" class="btn btn-primary btnUpdate">Gửi</button>
                          
                                </div>
                        </div>

                    </form>


                </div>
            </div>

        </div>

    </div>
                                        
                                       @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
                </div>
            </div>



         

      
    </div>
</div>

@stop