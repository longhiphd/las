<!DOCTYPE html>
<html ng-app="main" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/theme/css')}}/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('/theme/css')}}/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('/theme/css')}}/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/theme/css')}}/hover.css">
    @yield('meta')
</head>
<body style="display:none">
@yield('header')
{{--<div id="loader-wrapper">--}}
        {{--<div id="loader"></div>--}}
        {{--<div class="loader-section section-left"></div>--}}
        {{--<div class="loader-section section-right"></div>--}}
      {{--</div>--}}
@yield('content')
@yield('footer')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{url('/theme/js')}}/jquery-1.11.3.min.js"></script>
    <script src="{{url('/angular-js/angular.min.js')}}"></script>
    <script src="{{url('/angular-js/angular-sanitize.js')}}"></script>
    <script src="{{url('/angular-js/angularjs-facebook-sdk.min.js')}}"></script>
    <script src="{{url('/angular-js/dirPagination.js')}}"></script>
    <script src="{{url('/angular-js/angular-ui-router.js')}}"></script>
    <script src="{{url('/angular-js/app-frontend.js')}}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular-cookies.min.js"></script>--}}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('/theme/js')}}/bootstrap.min.js"></script>
    <script src="{{url('/theme/js')}}/wow.js"></script>
    <script type="text/javascript">
             $(document).ready(function () {
               function playcarousel(){
                 $('.carousel-control.right').trigger('click');
               }
               window.setInterval(playcarousel, 3000);
             });
    </script>
    <script>

    </script>
    @yield('script')
    <script>
    $(document).ready(function() {
        setTimeout(function() {
            $('body').show();
        }, 700);
    });
    </script>

</body>
</html>