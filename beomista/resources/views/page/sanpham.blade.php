@extends('layouts.site')
@section('main')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="">home</a></li>
                        <li>/</li>
                        <li>shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_reverse">
    <div class="container">
    <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <div class="sidebar_widget">
                        <div class="">
                            <h2>Lọc theo giá</h2>
                            <form action="" method="get">
                            
                                <div class="search_bar">
                            <input type="number" name="min" placeholder="min">
                            <input type="number" name="max" placeholder="max">
                                
                            <button type="submit">Lọc</button>
                            </div>
                        </form>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>Danh mục sản phẩm</h2>
                            <ul>
                                @foreach( $loai as $l)
                                <li><a href="{{route('home.cate')}}?cate={{$l->MALOAI}}">{{$l->TENLOAI}}   </a> </li>
                                @endforeach

                            </ul>
                        </div>

                     

                    </div>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>shop</h1>
                    </div>
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button"  class="fa fa-th-large " data-toggle="tooltip" title="3"></button>

                          

                            <button data-role="grid_list" type="button" class="fa fa-bars" data-toggle="tooltip" title="List"></button>
                        </div>
                        

                        <form>
                                @csrf
                                <select name="sortby" id="sortby" class='form-controll'>
                                 
                                    <option  value="{{Request::url()}}?sort_by=none">--none--</option>
                                    <option value="{{Request::url()}}?sort_by=tenA">Sắp xếp theo tên: A-Z</option>
                                    <option value="{{Request::url()}}?sort_by=tenZ">Sắp xếp theo tên: Z-A</option>
                                    <option value="{{Request::url()}}?sort_by=giaZ">Sắp xếp theo giá: Thấp đến cao</option>
                                    <option value="{{Request::url()}}?sort_by=giaA">Sắp xếp theo giá: Cao đến thấp</option>
                                    <option value="{{Request::url()}}?sort_by=sp">Sắp xếp theo sản phẩm mới</option>
                                </select>
                            </form>


                        
                       
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        
                       
                      
                      @foreach($sp as $s)
                        <div class="col-lg-4 col-md-4 col-12 ">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{route('home.des', $s->MASP)}}"><img src="{{url('public/img/imgSanpham')}}/{{$s->ANH}}" width="200px" alt=""></a>
                                  
                                    <div class="quick_button">
                                        
                                        <!-- <a href="{{route('home.des', $s->MASP)}}" title="quick_view" style="font-size: 20px;"><i class="fa fa-shopping-cart"></i></a> -->
                                        <button onclick="addCart('{{$s->MASP}}')" title="quick_view" class="btn btn-info btnAddCart" type="button"><i class="fa fa-shopping-cart"></i></button>
                                        
                                    </div>
                                <input type="hidden" id="masp" name="MASP" id-data="{{$s->MASP}}">
                                
                                </div>

                                <div class="product_content grid_content">
                                    <h3><a href="{{route('home.des', $s->MASP)}}">{{$s->TENSP}}</a></h3>
                                    <span class="current_price">{{number_format($s->DONGIA)}}</span>
                                    <span class="old_price" style="text-decoration: none;">VNĐ</span>
                                </div>


                             

                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                   
                    <div class="shop_toolbar t_bottom">
                       
                            
                            {{$sp->appends(request()->all())->links()}}
                            
                        
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>

    </div>
</div>

@stop
