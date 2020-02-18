
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

{{--<!-- Bootstrap -->--}}
{{--<script src="{{asset('bootstrap4/bootstrap.js')}}"></script>--}}
{{--<script src="{{asset('bootstrap4/bootstrap.min.js')}}"></script>--}}

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->

<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<!--- start-rate---->
<script src="{{asset('assets/frontend/js/jstarbox.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/frontend/css/jstarbox.css')}}" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript">
    jQuery(function() {
        jQuery('.starbox').each(function() {
            var starbox = jQuery(this);
            starbox.starbox({
                average: starbox.attr('data-start-value'),
                changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                ghosting: starbox.hasClass('ghosting'),
                autoUpdateAverage: starbox.hasClass('autoupdate'),
                buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                stars: starbox.attr('data-star-count') || 5
            }).bind('starbox-value-changed', function(event, value) {
                if(starbox.hasClass('random')) {
                    var val = Math.random();
                    starbox.next().text(' '+val);
                    return val;
                }
            })
        });
    });
</script>

<!---pop-up-box---->
<script src="{{asset('assets/frontend/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>


<!----->

@stack('js')
