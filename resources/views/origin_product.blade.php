@extends ('layouts.content')

@section('content')

    <!--banner-->
    <div class="banner">
        <div class="container">
            <section class="rw-wrapper">
                <h1 class="rw-sentence">
                    <span>Headphone Store</span>
                    <div class="rw-words rw-words-1" >
                        <span style="color: #ff804a">Nhiều mẫu mã</span>
                        <span style="color: #ffe543">Đẹp và chất lượng</span>
                    </div>
                    <div class="rw-words rw-words-2" >
                        <span>We denounce with right</span>
                        <span>But in certain circum</span>
                        <span>Sed ut perspiciatis unde</span>
                        <span>There are many variation</span>
                        <span>The generated Lorem Ipsum</span>
                        <span>Excepteur sint occaecat</span>
                    </div>
                </h1>
            </section>
        </div>
    </div>

    <!--content-->
    <div class="content">
        <div class="container">
        {{--            <div class="content-top">--}}
        {{--                <div class="col-md-6 col-md">--}}
        {{--                    <div class="col-1">--}}
        {{--                        <a href="single.html" class="b-link-stroke b-animate-go  thickbox">--}}
        {{--                            <img src="{{asset('assets/frontend/images/pi.jpg')}}" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Lorem ipsum</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3></div></a>--}}

        {{--                        <!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->--}}
        {{--                    </div>--}}
        {{--                    <div class="col-2">--}}
        {{--                        <span>Hot Deal</span>--}}
        {{--                        <h2><a href="single.html">Luxurious &amp; Trendy</a></h2>--}}
        {{--                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years</p>--}}
        {{--                        <a href="single.html" class="buy-now">Buy Now</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-md-6 col-md1">--}}
        {{--                    <div class="col-3">--}}
        {{--                        <a href="single.html"><img src="{{asset('assets/frontend/images/pi1.jpg')}}" class="img-responsive" alt="">--}}
        {{--                            <div class="col-pic">--}}
        {{--                                <p>Lorem Ipsum</p>--}}
        {{--                                <label></label>--}}
        {{--                                <h5>For Men</h5>--}}
        {{--                            </div></a>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3 row-3">--}}
        {{--                        <a href="single.html"><img src="{{asset('assets/frontend/images/pi2.jpg')}}" class="img-responsive" alt="">--}}
        {{--                            <div class="col-pic">--}}
        {{--                                <p>Lorem Ipsum</p>--}}
        {{--                                <label></label>--}}
        {{--                                <h5>For Kids</h5>--}}
        {{--                            </div></a>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-3 row-3">--}}
        {{--                        <a href="single.html"><img src="{{asset('assets/frontend/images/pi3.jpg')}}" class="img-responsive" alt="">--}}
        {{--                            <div class="col-pic">--}}
        {{--                                <p>Lorem Ipsum</p>--}}
        {{--                                <label></label>--}}
        {{--                                <h5>For Women</h5>--}}
        {{--                            </div></a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="clearfix"></div>--}}
        {{--            </div>--}}

        <!--products-->
            <div class="content-mid">
                <h3>
                    Tai nghe {{$title}}
                </h3>

                <label class="line"></label>
                <div>{{$product->appends(request()->all())->links()}}</div>

                <div class="mid-popular">
                    @foreach($product as $value)
                        <div class="col-md-3 item-grid simpleCart_shelfItem">

                            <div class=" mid-pop">
                                <div class="pro-img">
                                    <img src='{{asset("assets/frontend/images/products/$value->image")}}' class="img-responsive" alt="" >
                                    <div class="zoom-icon ">
                                        <a class="picture" href="{{asset("assets/frontend/images/products/$value->image")}}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                        <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                                    </div>
                                </div>
                                <div class="mid-1">
                                    <div class="women">
                                        <div class="women-top">
                                            @foreach($origins as $value1)
                                                <span>
                                                    @if (($value->origin_id)==($value1->origin_id))
                                                        {{$value1->origin_name}}
                                                    @endif
                                                </span>
                                            @endforeach
                                            <h6><a href="single.html">{{$value->product_name}}</a></h6>
                                        </div>
                                        <div class="img item_add">
                                            <a href="#"><img src="{{asset('assets/frontend/images/ca.png')}}" alt=""></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="mid-2">
                                        <p ><label>{{$value->price}} VND</label><em class="item_price">{{$value->actual_price}} VND</em></p>
                                        {{--                                            <div class="block">--}}
                                        {{--                                                <div class="starbox small ghosting"> </div>--}}
                                        {{--                                            </div>--}}

                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>

            </div>
            <!--//products-->
            <!--brand-->
            <div class="brand">
                <div class="col-md-3 brand-grid">
                    <img src="{{asset('assets/frontend/images/ic.png')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="{{asset('assets/frontend/images/ic1.png')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="{{asset('assets/frontend/images/ic2.png')}}" class="img-responsive" alt="">
                </div>
                <div class="col-md-3 brand-grid">
                    <img src="{{asset('assets/frontend/images/ic3.png')}}" class="img-responsive" alt="">
                </div>
                <div class="clearfix"></div>
            </div>
            <!--//brand-->
        </div>

    </div>
    <!--//content-->

@endsection

