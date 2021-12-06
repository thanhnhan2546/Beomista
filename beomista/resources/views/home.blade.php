@extends('layouts.site')

@section('main')
<!--banner top-->

<div class="slider_area slider_style home_three_slider owl-carousel" style="height: 650px;" >
    <div class="single_slider" data-bgimg="{{url('public/img/logo')}}/banner1.jpg"  style="height: 650px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_content content_one">
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single_slider" data-bgimg="{{url('public/img/logo')}}/banner2.jpg" style="height: 650px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_content content_two">
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single_slider" data-bgimg="{{url('public/img/logo')}}/banner3.jpg" style="height: 650px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_content content_three">
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner bottom-->


<section class="product_section womens_product bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm thịnh hành</h2>
                    <!-- <p>Sản phẩm ấn tượng và bán chạy nhất</p> -->
                </div>
            </div>
        </div>
        <div class="product_area">
            <div class="row">
                <div class="product_carousel product_three_column4 owl-carousel">
                   @foreach($sph as $s)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{route('home.des', $s->MASP)}}"><img src="{{url('public/img/imgSanpham')}}/{{$s->ANH}}" alt=""></a>
                                

                                <div class="quick_button">
                                <button onclick="addCart('{{$s->MASP}}')" title="quick_view" class="btn btn-info btnAddCart" type="button"><i class="fa fa-shopping-cart"></i></button>
                                </div>

                                <div class="product_sale" style="background: red;">
                                    <span>HOT</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="{{route('home.des', $s->MASP)}}">{{$s->TENSP}}</a></h3>
                                <span class="current_price">{{ number_format($s->DONGIA, ) }}</span>
                                <span class="old_price" style="text-decoration: none;">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
<!--Sản phẩm thịnh hành-->
<section class="product_section womens_product bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Sản phẩm mới</h2>
                    <!-- <p>Sản phẩm ấn tượng và bán chạy nhất</p> -->
                </div>
            </div>
        </div>
        <div class="product_area">
            <div class="row">
                <div class="product_carousel product_three_column4 owl-carousel">
                   @foreach($sp as $s)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{route('home.des', $s->MASP)}}"><img src="{{url('public/img/imgSanpham')}}/{{$s->ANH}}" alt=""></a>
                                

                                <div class="quick_button">
                                <button onclick="addCart('{{$s->MASP}}')" title="quick_view" class="btn btn-info btnAddCart" type="button"><i class="fa fa-shopping-cart"></i></button>
                                </div>

                                <div class="product_sale">
                                    <span>NEW</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <h3><a href="{{route('home.des', $s->MASP)}}">{{$s->TENSP}}</a></h3>
                                <span class="current_price">{{ number_format($s->DONGIA, ) }}</span>
                                <span class="old_price" style="text-decoration: none;">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>

<!--Sản phẩm của chúng tôi -->
<section class="product_section womens_product">
        <div class="container">
            <div class="row">   
                <div class="col-12">
                   <div class="section_title">
                       <h2>Sản phẩm của chúng tôi</h2>
                       
                   </div>
                </div> 
            </div>    
            <div class="product_area"> 
                <div class="row">
                 
                </div>
                 <div class="tab-content">
                      <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                             <div class="product_container">
                                <div class="row product_column4">
                                @foreach($sps as $s)
                    <div class="col-lg-3">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{route('home.des', $s->MASP)}}"><img src="{{url('public/img/imgSanpham')}}/{{$s->ANH}}" alt=""></a>
                                

                                <div class="quick_button">
                                <button onclick="addCart('{{$s->MASP}}')" title="quick_view" class="btn btn-info btnAddCart" type="button"><i class="fa fa-shopping-cart"></i></button>
                                </div>

                                
                            </div>
                            <div class="product_content">
                                <h3><a href="{{route('home.des', $s->MASP)}}">{{$s->TENSP}}</a></h3>
                                <span class="current_price">{{ number_format($s->DONGIA, ) }}</span>
                                <span class="old_price" style="text-decoration: none;">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                                   
                                </div>
                            </div>
                      </div>
                   
                </div>
            </div>
               
        </div>
    </section>

<!--Banner sau sản phẩm -->
<section class="banner_section banner_section_three">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-6 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href=""><img src="{{url('public/img/logo')}}/banner4.jpg" alt="#"></a>
                        <div class="banner_content">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href=""><img src="{{url('public/img/logo')}}/banner5.png" alt="#"></a>
                        <div class="banner_content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Blog mới nhất-->

@stop()