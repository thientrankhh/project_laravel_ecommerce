<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <title>Tai nghe, Headphones chính hãng giá tốt nhất -Nhật Thiên</title>

    @include('layouts.js')
    @include('layouts.css')

</head>
<body>

@include('layouts.header')
@yield('content')
@include('layouts.footer')

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('assets/frontend/js/simpleCart.min.js')}}"> </script>
<!-- slide -->
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<!--light-box-files -->
<script src="{{asset('assets/frontend/js/jquery.chocolat.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/frontend/css/chocolat.css')}}" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
    $(function() {
        $('a.picture').Chocolat();
    });
</script>

</body>
</html>
