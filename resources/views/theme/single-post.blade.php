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
                        <li><a href="{{url('/tu-van')}}">Tư vấn</a></li>
                        <li><a href="{{url('/thiet-ke')}}">Thiết kế</a></li>
                        <li><a href="{{url('/blog-nha-dep')}}">Blog nhà đẹp</a></li>
                        <li><a href="{{url('/tin-tuc')}}">Tin tức</a></li>
                        <li><a href="{{url('/lien-he')}}">Liên hệ</a></li>
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
                    <li class="">Blog</li>
                    <li class="active">{{$post->name}}</li>
                </ol>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-md-9 news-detail">
            <div class="row">
                <header class="text-uppercase"><h2>{{$post->name}}</h2></header>
                <p class="date">{{date("d-m-Y", strtotime($post->created_at))}}</p>
                <div class="content">{!! $post->content !!}</div>
                <div class="tags"><i class="fa fa-tags"></i>
                @foreach($post->tags as $tag)
                {{$tag->name}},
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3">
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