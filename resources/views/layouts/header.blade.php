<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="index.blade.php"><img src="{{asset('assets/frontend/images/logo.png')}}" alt=""></a>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">
                <ul >
                    <li><a href="register.html">Đăng ký</a></li>
                    <li><p style="color: white">|</p></li>
                    <li><a href="login.html">Đăng nhập</a></li>
                    <li>
                        <form action="{{route('timkiem')}}" role="form" method="post">
                            @csrf
                            <input type="text" id="text_search" class="text-search" name="search_product" autocomplete="off" placeholder="Bạn muốn tìm sản phẩm gì ?" style="width: 200px">
                            <button type="submit" class="btn-info">Search</button>
                        </form>

                    </li>
                </ul>
            </div>

            <div class="col-sm-5 header-social">
                <ul >
{{--                    <li><a href="#"><i></i></a></li>--}}
{{--                    <li><a href="#"><i class="ic1"></i></a></li>--}}
{{--                    <li><a href="#"><i class="ic2"></i></a></li>--}}
{{--                    <li><a href="#"><i class="ic3"></i></a></li>--}}
{{--                    <li><a href="#"><i class="ic4"></i></a></li>--}}
                </ul>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="container">

        <div class="head-top">

            <div class="col-sm-8 col-md-offset-2 h_menu4">
                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="navbar1">
                        <a href="{{URL::to('/')}}">Home</a>
                        <div class="dropdown1">
                            <button class="dropbtn">Danh mục
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                @foreach($categories as $value)
                                <a href="{{route('sanpham.categoryp',$value->category_id)}}">{{$value->category_name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown1">
                            <button class="dropbtn">Thương hiệu
                                <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                @foreach($origins as $value)
                                    <a href="{{route('sanpham.originp',$value->origin_id)}}">{{$value->origin_name}}</a>
                                @endforeach
                            </div>
                        </div>
                        <a href="{{URL::to('/lienhe')}}">Liên hệ</a>
                    </div>

                </nav>
            </div>
            <div class="col-sm-2 search-right">
                <ul class="heart">
                    <li>
                        <a href="wishlist.html" >
                            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                        </a></li>
                    <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
                </ul>
                <div class="cart box_1">
                    <a href="checkout.html">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span></div>
                            <img src="{{asset('assets/frontend/images/cart.png')}}" alt=""/></h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                </div>
                <div class="clearfix"> </div>

                <!----->


                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
