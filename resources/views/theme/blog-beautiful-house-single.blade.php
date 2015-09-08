@extends('layouts.template')
@section('meta')
    <title>{{$post->meta_title}} | Mir</title>
    <meta name="description" content="{{$post->meta_description}}">
@stop
@section('header')
<header class="" id="back-to-top">
    <div class="" ng-controller="ThemeController">
        <!-- Row 1 -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 header-social">
                        <a href="@{{ option.social_fb }}" target="_blank">
                            <i class="fa fa-facebook fa-fw"></i>
                        </a>
                        <a href="@{{ option.social_google_plus }}" target="_blank">
                            <i class="fa fa-google-plus fa-fw"></i>
                        </a>
                        <a href="mailto:@{{ option.email }}?subject=feedback" "email me">
                            <i class="fa fa-envelope-o fa-fw"></i>
                        </a>
                        <label for="">@{{ option.email }}</label>
                    </div>
                    <div class="col-md-2 col-xs-12 pull-right header-register">
                        <a href="/#/lien-he">Liên hệ</a>
                        <a href="/login">Đăng nhập</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- End row 1 -->
        <!-- Row 2 -->
        <div class="container header-middle" >
            <div class="row" >
                <div class="col-md-2 logo">
                    <a href="/#/home"><img ng-src="/uploads/images/theme_options/@{{ option.logo }}" class="img-responsive" alt=""></a>
                </div>
                <div class="col-md-8 pull-right text-right header-form">
                        <form ng-submit="Search()">
                            <div class="form-group">
                                <label for="sel sr-only"></label>
                                     <select class="form-control" id="sel" ng-model="category">
                                     <option selected value="">All</option>
                                       @foreach($categories as $category)
                                           <option value="{{$category->id}}">{{$category->name}}</option>
                                       @endforeach
                                      </select>
                                <input type="text" class="form-control pull-left" ng-model="search" placeholder="Search">
                                <button type="submit" class="btn pull-left"><i class="fa fa-search fa-fw"></i></button>
                                <a href="/#/gio-hang"><div class="cart-icon pull-left"><i class="fa fa-shopping-cart fa-fw"></i></div></a>
                                <div ng-controller="CartCount" class="cart-count pull-left">@{{ cart_count  }}</div>
                            </div>
                        </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div data-></div>
        <!-- End row 2 -->
        <!-- Nav -->
        <nav class="navbar navbar-default menu-horizontal">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand hidden-lg hidden-md" href="#">Menu</a>
            </div>
            <div class="container">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/#/">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-5">
                                <div class="col-md-12">
                                    <div class="menu-list">
                                    @foreach($categories as $category)
                                        <div class="col-md-15"><a href="#/danh-muc/{{$category->slug}}">{{$category->name}}</a></div>
                                    @endforeach
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li><a  href="{{url('/#/tu-van')}}">Tư vấn</a></li>
                        <li><a href="{{url('/#/thiet-ke')}}" >Thiết kế</a></li>
                        <li><a href="{{url('/blog-nha-dep')}}">Blog nhà đẹp</a></li>
                        <li><a  href="{{url('/tin-tuc')}}" >Tin tức</a></li>
                        <li><a href="{{url('/#/lien-he')}}" >Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End nav -->
    </div>
</header>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li>Blog nhà đẹp</li>
                    <li class="active">{{$post->name}}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-9 news-detail">
            <div class="row">
                <header class="text-uppercase"><h2>{{$post->name}}</h2></header>
                <p class="date"><span class="label label-success">{{date("d-m-Y", strtotime($post->created_at))}}</span></p>
                <p>{!! $post->content !!}</p>
                <div class="tags"><i class="fa fa-tags"></i>
                    @foreach($post->tags as $tag)
                        <strong>{{$tag->name}}</strong>
                    @endforeach
                </div>
            </div>
            <hr/>
            <div class="fb-comments" data-width="100%" data-href="http://developers.facebook.com/docs/plugins/comments/" data-numposts="1"></div>
        </div>
        <div class="col-md-3">
            <h3>Bài viết liên quan</h3>
            @foreach($recent_posts as $recent_post)
                <a href="/blog-nha-dep/{{$post->slug}}"><p>{{$recent_post->name}} <span class="label label-success">{{date("d-m-Y", strtotime($recent_post->created_at))}}</span></p></a>
            @endforeach
            <hr/>
        </div>
    </div>
</div>
@stop
@section('footer')
<footer ng-controller="ThemeController">
    <!-- row 1 -->
    <div class="container-fluid footer-top">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4 col-xs-4">
                                <img src="{{'/theme/images/footer-top-icon-1.png'}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-uppercase">Miễn phí lắp đặt</h4>
                                <p>Chúng tôi hỗ trợ vận chuyển và lắp đặt sản phẩm tại nhà theo yêu cầu của bạn. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4 col-xs-4">
                                <img src="{{'/theme/images/footer-top-icon-2.png'}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-uppercase">Dịch vụ đổi trả</h4>
                                <p>Thoải mái đổi trả sản phẩm với chính sách linh hoạt và dễ dàng trong vòng 7 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4 col-xs-4">
                                <img src="{{'/theme/images/footer-top-icon-3.png'}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-uppercase">Chế độ bảo hành</h4>
                                <p>Bạn có thể yên tâm tuyệt đối bởi chế độ bảo hành và hậu bán hàng trong suốt quá trình sử dụng sản phẩm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row 1 -->

    <!-- row 2 -->
    <div class="container-fluid footer-middle">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 footer-middle-item">
                        <div class="row">
                            <div class="col-md-4 col-xs-5">
                                <img ng-src="/uploads/images/theme_options/@{{ option.logo }}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-8">
                                <h5 class="text-uppercase">Mir decor</h5>
                                <div class="clearfix"></div>
                                <p>Website: @{{ option.website }}</p>
                                <p>Facebook: @{{ option.social_fb }}</p>
                                <p>Email: @{{ option.email }}</p>
                                <p>Hotline: @{{ option.hotline }}</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <hr class="visible-xs">
                    <div class="col-md-4 footer-middle-item">
                        <h5 class="text-uppercase">Showroom mir decor</h5>
                        <p><htmldiv content="option.showroom"></htmldiv></p>
                    </div>
                    <hr class="visible-xs">
                    <div class="col-md-3 footer-middle-item">
                        <h5 class="text-uppercase">Kết nối với mir</h5>
                        <a href="@{{ option.social_fb }}" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <a href="@{{ option.social_twitter }}" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                        <a href="@{{ option.social_google_plus }}" target="_blank">
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row 2 -->
    <!-- row 3 -->
    <div class="container-fluid text-center footer-bottom">
        <div class="row">
        <h5>Copyright © 2015 - All rights reserved.</h5>
        <p>Powered by MIR.VN</p>
        </div>
    </div>
    <!-- end row 3 -->
</footer>
<div id="fb-root"></div>
@stop
@section('script')
    @foreach($scripts as $script)
        {!!$script->script!!}
    @endforeach
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=1418370238458730";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
@stop