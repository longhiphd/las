@extends('layouts.template')
@section('nav')
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
                        <li><a href="{{url('/')}}">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-5">
                                <div class="col-md-12">
                                    <div class="menu-list">
                                    @foreach($categories as $category)
                                        <div class="col-md-15"><a href="/danh-muc/{{$category->slug}}">{{$category->name}}</a></div>
                                    @endforeach
                                    </div>
                                    <div class="menu-img row">
                                    <div class="col-md-6">
                                        <a href="#"><img src="{{'/theme/images/submenu-img-1.png'}}" class="img-responsive" alt=""></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#"><img src="{{'/theme/images/submenu-img-2.png'}}" class="img-responsive" alt=""></a>
                                    </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="{{url('/#/tu-van')}}">Tư vấn</a></li>
                        <li><a href="{{url('/#/thiet-ke')}}">Thiết kế</a></li>
                        <li><a href="{{url('/blog-nha-dep')}}">Blog nhà đẹp</a></li>
                        <li><a href="{{url('/tin-tuc')}}">Tin tức</a></li>
                        <li><a href="{{url('/#/lien-he')}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Blog Nhà Đẹp</li>
                </ol>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-9">
            <div class="row">
                <!-- Carousel
                ================================================== -->
                <div id="myCarousel" class="carousel slide blog-slide" data-ride="carousel">
                  <!-- Indicators -->
                  <!-- <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                  </ol> -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item">
                      <img class="img-responsive" src="{{url('theme/images/slider.png')}}" alt="First slide">
                      <div class="container">
                        <div class="carousel-caption">
                          <h1>Example headline.</h1>
                          <p class="hidden-xs">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ipsum autem reiciendis natus blanditiis earum voluptas, fuga, labore provident alias deserunt quod ad maxime repellat. Id labore aliquam fugit laborum!</p>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <img class="img-responsive" src="{{url('theme/images/slider.png')}}" alt="Second slide">
                      <div class="container">
                        <div class="carousel-caption">
                          <h1>Another example headline.</h1>
                          <p class="hidden-xs">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                      </div>
                    </div>
                    <div class="item active">
                      <img class="img-responsive" src="{{url('theme/images/slider.png')}}" alt="Third slide">
                      <div class="container">
                        <div class="carousel-caption">
                          <h1>One more for good measure.</h1>
                          <p class="hidden-xs">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- /.carousel -->

                <div class="col-xs-12 visible-xs">
                    <div class="sidebar-nav">
                      <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <span class="navbar-brand">Danh mục</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                          <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Menu Item 1</a></li>
                            <li><a href="#">Menu Item 2</a></li>
                            <li><a href="#">Menu Item 3</a></li>
                            <li><a href="#">Menu Item 4</a></li>
                            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
                          </ul>
                        </div><!--/.nav-collapse -->
                      </div>
                    </div>
                </div>

                <!-- news -->
                <div class="blog container-fluid">
                    <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 col-xs-6 blog-item">
                            <a href="chi-tiet/{{$post->slug}}"><h3 class="text-uppercase">{{$post->name}}</h3></a>
                            <div class="date">{{date("d-m-Y", strtotime($post->created_at))}}</div>
                            <a href="chi-tiet/{{$post->slug}}"><img src="/uploads/images/post/{{$post->img}}" class="img-responsive" alt=""></a>
                        </div>
                    @endforeach
                    </div>
                </div>
                <!-- end news -->
            </div>
        </div>
        <div class="col-md-3 visible-lg">
            <img src="{{url('theme/images/subscribe.jpg')}}" class="img-responsive" alt="">
            <div class="sidebar-nav">
              <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              </div>
            </div>
        </div>
    </div>
</div>
@stop