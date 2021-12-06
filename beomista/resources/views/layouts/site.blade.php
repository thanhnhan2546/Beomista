<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BEOMISTA</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/img')}}/favicon.ico">

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{url('public/css/home')}}/plugins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{url('public/css/home')}}/style.css">
    

</head>

<body>
    <!--HEADER-->
    <header class="header_area header_three">
        <!--header black-->
        <div class="header_top">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="welcome_text">

                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="top_right text-right">
                            <ul>
                                @if(session()->has('name'))
                                <li class="top_links"><a style="font-size: 15px;" href=""><i style="font-size: 13px;">Xin chào &ensp; </i> {{session()->get('name')}}<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{route('home.logout')}}">Đăng xuất </a></li>
                                        <li><a href="{{route('home.profile')}}">Thông tin cá nhân</a></li>
                                        <li><a href="{{route('home.myBills')}}">Đơn hàng của tôi</a></li>
                                    </ul>
                                </li>
                                @else
                                <li class="top_links"><a href="#">Tài khoản <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{route('home.login')}}">Đăng nhập </a></li>
                                        <li><a href="{{route('home.register')}}">Đăng ký </a></li>

                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header white (cart, search, logo)-->
        <div class="header_middel">
            <div class="container-fluid">
                <div class="middel_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="search_bar">
                                <form action="{{route('home.cate')}}">
                                    <input placeholder="Search entire store here..." type="text" name="key">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="logo">
                                <a href="{{route('home.index')}}"><img src="{{url('public/img')}}/logo/Logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart_area">
                                <div class="cart_link">
                                    <a href="{{route('home.cart')}}"><i class="fa fa-shopping-basket"></i>item( <b class="text-danger">{{Cart::count()}}</b> )</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Menu-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="main_menu_inner">
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="{{route('home.index')}}">Trang chủ </a></li>
                                        <li><a href="{{route('home.cate')}}">Sản phẩm <i class="fa fa-angle-down"></i> </a>
                                            <ul class="sub_menu pages">
                                                @foreach($loai as $l)
                                                <li><a href="{{route('home.cate')}}?cate={{$l->MALOAI}}">{{$l->TENLOAI}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="">Giới thiệu</a></li>
                                       
                                        <li><a href="">Bài viết</a></li>

                                        <li><a href="">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('main')
        <section class="blog_section blog_section_three">
    <div class="container">
      
        <div class="row">
            <div class="blog_wrapper blog_column3 owl-carousel">
             
              
            
            </div>
        </div>  
    </div>
</section>
        <!--Footer-->
        <footer class="footer_widgets">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="widgets_container">
                                <h3>Thông tin </h3>
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="">Giới thiệu</a></li>
                                        <li><a href="#">Thông tin giao hàng</a></li>
                                        <li><a href="">Chính sách bảo mật</a></li>
                                        <li><a href="#">Điều khoản</a></li>
                                        <li><a href="">Liên hệ</a></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="widgets_container">
                                <h3> </h3>
                                <div class="footer_menu">
                                    <ul>
                                       
                                        <li><a href="#">Phiếu quà tặng</a></li>
                                        <li><a href="contact.html">Vị trí cửa hàng</a></li>
                                        <li><a href="my-account.html">Tài khoản</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widgets_container contact_us">
                                <h3>Liên hệ</h3>
                                <div class="footer_contact">
                                    <p>Địa chỉ: 105 Thành Thái Phường 14 Quận 10 TP.HCM, Việt Nam</p>
                                    <p>Hotline: <a href="tel:+(+012)800456789-987">(+012) 800 456 789</a> </p>
                                    <p>Email: beomista@gmail.com</p>
                                    <ul>
                                        <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title="youtube"><i class="fa fa-youtube"></i></a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="widgets_container newsletter">
                                <h3>Đăng ký thành viên của shop</h3>
                                <div class="newleter-content">
                                    <p>Để được tận hưởng sự chất lượng, những phần quà hấp dẫn và được chăm sóc vẻ dẹp của mình</p>
                                    <div class="subscribe_form">
                                        <form id="mc-form" class="mc-form footer-newsletter">
                                            <input id="mc-email" type="email" autocomplete="off" placeholder="Enter you email address here..." />
                                            <button id="mc-submit">Đăng ký</button>
                                        </form>
                                        <!-- mailchimp-alerts Start -->
                                        <div class="mailchimp-alerts text-centre">
                                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                        </div><!-- mailchimp-alerts end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!--footer area end-->

        <!-- modal area start-->

        <!-- modal area start-->


        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/css/home')}}/plugins.js"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
        <!-- Main JS -->
        <script src="{{url('public/css/home')}}/main.js"></script>
        <script>
            $('.update-all').click(function() {
                var list = [];
                $(' table tbody tr td ').each(function() {

                    $(this).find('input').each(function() {
                        var element = {
                            key: $(this).data('id'),
                            value: $(this).val()
                        };
                        list.push(element);
                        console.log(element);
                    })
                })
                //  
                console.log(list);
                $.ajax({
                    url: '{{route("home.updateCart")}}',
                    type: 'post',
                    data: {
                        "_token": "{{csrf_token()}}",
                        "data": list
                    }
                }).done(function(response) {
                      window.location.reload();
                    alert('Update giỏ hàng thành công');
                })
            })

           
            function addCart(id){
               
                $.ajax({
                    url: "{{route('home.addCart')}}",
                    type: 'post',
                    data: {
                        "_token": "{{csrf_token()}}",
                        MASP: id,
                        qty: "1"
                    }
                }).done(function(response) {
                      window.location.reload();
                     alert('Update giỏ hàng thành công');
                })
            }
            $('#sortby').on('change',function(){
                var url = $(this).val();
               
                if(url){
                    window.location = url;
                }
                return false;
            });
            $('.btnEdit').click(function(ev){
        var url = $(this).attr('data-url');
        
        ev.preventDefault();
        $.ajax({
            type: 'get',
            url: url,
            dataType: "json",
            success: function(response){
                
                
                 if(response.status==200){
                     $('#makhEdit').val(response.SP[0].MAKH);
                     
                     $('#hokhEdit').val(response.SP[0].HOKH);
                     $('#tenkhEdit').val(response.SP[0].TENKH);
                    
                     $('#sdtEdit').val(response.SP[0].SDT);
                     $('#diachiEdit').val(response.SP[0].DIACHI);
                     $('#emailEdit').val(response.SP[0].EMAIL);
                    //  $('#form-edit').attr('data-url','{{ asset("admin/sanpham/") }}/'+response.SP[0].MASP)
                     
                 }
            }
        })
    })
        </script>


</body>

</html>