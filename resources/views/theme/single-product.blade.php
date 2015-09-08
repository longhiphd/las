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
        <div class="">
            <ol class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li class="active">Blog</li>
            </ol>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-sm-6">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" data-thumb="0">
                    <img src="http://placehold.it/350x250/e8117f/fff&amp;text=Product+Main">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/00ffff/000&amp;text=Product+Image+2">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/ff00ff/fff&amp;text=Product+Image+3">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/ffff00/000&amp;text=Product+Image+4">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/7B1C8E/fff&amp;text=Product+Image+5">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/9EF383/000&amp;text=Product+Image+6">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/D64908/fff&amp;text=Product+Image+7">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/E3A3A1/000&amp;text=Product+Image+8">
                </div>
            </div>
        </div>
    <div class="clearfix">
        <div id="thumbcarousel" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="item active">
                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="http://placehold.it/100/e8117f/fff&amp;text=Product+Main"></div>
                    <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="http://placehold.it/100/00ffff/000&amp;text=Product+Image+2"></div>
                    <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="http://placehold.it/100/ff00ff/fff&amp;text=Product+Image+3"></div>
                    <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="http://placehold.it/100/ffff00/000&amp;text=Product+Image+4"></div>
                </div><!-- /item -->
                <div class="item">
                    <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="http://placehold.it/100/7B1C8E/fff&amp;text=Product+Image+5"></div>
                    <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="http://placehold.it/100/9EF383/000&amp;text=Product+Image+6"></div>
                    <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="http://placehold.it/100/D64908/fff&amp;text=Product+Image+7"></div>
                    <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="http://placehold.it/100/E3A3A1/000&amp;text=Product+Image+8"></div>
                </div><!-- /item -->
            </div><!-- /carousel-inner -->
            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div> <!-- /thumbcarousel -->
    </div><!-- /clearfix -->
    </div> <!-- /col-sm-6 -->
    <div class="col-sm-6 product-detail">
        <h1 class="text-uppercase pro-name">Tên sản phẩm</h1>
        <h3 class="pro-desc-header">Mô tả</h3>
        <p>Bộ 2 tranh vintage gỗ bướm và hoa (bộ)
		Giá: 650.000 (bộ) 2 bức <br>
		Chất liệu: Tranh gỗ <br>
		Kích thước: 30*40cm/bức <br>
		Hãy gọi ngay cho TreeHouse để chúng tôi có thể tư vấn cho bạn. <br>
		Hotline Hà Nội : 0962872200 - Sài Gòn : 0909463132</p>

		<h2 class="pro-price">630.000 VNĐ</h2>

		<div style="margin-top: 50px;">
			<input type="number" class="pull-left">
			<button class="btn btn-cart btn-lg pull-left">THÊM VÀO GIỎ HÀNG</button>
			<div class="clearfix"></div>
		</div>
    </div> <!-- /col-sm-6 -->
    <div class="clearfix"></div>
    <div class="col-md-12 details">
    	<ul class="nav nav-pills">
		  	<li class="active"><a data-toggle="tab" href="#detail">Chi tiết</a></li>
		  	<li><a data-toggle="tab" href="#policy">Chính sách đổi hàng</a></li>
		  	<li><a data-toggle="tab" href="#comment">Nhận xét</a></li>
		</ul>

		<div class="tab-content">
		  	<div id="detail" class="tab-pane fade in active">
		  		<h3>Tab 1</h3>
			    <p>Bộ 2 tranh vintage gỗ bướm và hoa (bộ)
				Giá: 650.000 (bộ) 2 bức<br>
				Chất liệu: Tranh gỗ <br>
				Kích thước: 30*40cm/bức <br>
				Hãy gọi ngay cho TreeHouse để chúng tôi có thể tư vấn cho bạn. <br>
				Hotline Hà Nội : 0962872200 - Sài Gòn : 0909463132</p>
		  	</div>
		  	<div id="policy" class="tab-pane fade">
		  		<h3>Tab 2</h3>
			    <p>Bộ 2 tranh vintage gỗ bướm và hoa (bộ)
				Giá: 650.000 (bộ) 2 bức<br>
				Chất liệu: Tranh gỗ <br>
				Kích thước: 30*40cm/bức <br>
				Hãy gọi ngay cho TreeHouse để chúng tôi có thể tư vấn cho bạn. <br>
				Hotline Hà Nội : 0962872200 - Sài Gòn : 0909463132</p>
		  	</div>
		  	<div id="comment" class="tab-pane fade">
		  		<h3>Tab 3</h3>
			    <p>Bộ 2 tranh vintage gỗ bướm và hoa (bộ)
				Giá: 650.000 (bộ) 2 bức<br>
				Chất liệu: Tranh gỗ <br>
				Kích thước: 30*40cm/bức <br>
				Hãy gọi ngay cho TreeHouse để chúng tôi có thể tư vấn cho bạn. <br>
				Hotline Hà Nội : 0962872200 - Sài Gòn : 0909463132</p>
		  	</div>
		</div>
    </div>
  </div> <!-- /row -->
</div>
@stop