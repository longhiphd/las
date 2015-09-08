@extends('template')
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
                        <li class="active">Blog</li>
                    </ol>
                </div>
            </div>

            <div class="clearfix"></div>

            <header><h1 class="cart-header">GIỎ HÀNG CỦA BẠN</h1></header>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 cart text-center">
                        <div class="row cart-table-header">
                            <div class="col-md-6 col-xs-4">Sản phẩm</div>
                            <div class="col-md-3 col-xs-2 ">Số lượng</div>
                            <div class="col-md-2 col-xs-4">Thành tiền</div>
                            <div class="col-md-1 col-xs-2">Xóa</div>
                        </div>
                        <div class="row cart-list-items">
                            <div class="col-md-6 col-xs-4"><img src="./images/product-1.png" style="width: 100%;"></div>
                            <div class="col-md-3 col-xs-2 text-center"><input type="number" class="cart-quantity"></div>
                            <div class="col-md-2 col-xs-4 cart-price">350.000 VNĐ</div>
                            <div class="col-md-1 col-xs-2"><i class="fa fa-times"></i></div>
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-4 col-md-offset-8 bill text-right">
                        <div class="row">
                            <header><h3>TỔNG THANH TOÁN</h3></header>
                            <hr>
                            <table width="100%">
                                <tr>
                                    <td>Thành tiền</td>
                                    <td style="color: red">1.800.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <td>Phí vận chuyển</td>
                                    <td style="color: red">200.000 VNĐ</td>
                                </tr><tr>
                                    <td>Tổng số</td>
                                    <td style="color: red; font-weight: bold; font-size: 1.5em;">2.000.000 VNĐ</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="container button-group">
                        <div class="row">
                            <hr>
                            <button class="btn btn-default btn-lg">Tiếp tục mua hàng</button>
                            <button class="btn btn-default btn-lg">Cập nhật giỏ hàng</button>
                            <button class="btn btn-danger btn-lg pull-right">MUA HÀNG</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop