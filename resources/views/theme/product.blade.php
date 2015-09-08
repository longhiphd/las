

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
                <form action="/search" method="GET">
                    <input type="text" name="category"/>
                    <input type="text" name="search"/>
                    <button type="submit">Search</button>
                </form>

            </div>
        </nav>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Tranh treo tường</li>
                </ol>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="container">
            <div class="row">
                <a href="#"><img src="{{url('theme/images/product-banner.jpg')}}" class="img-responsive" alt=""></a>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="container">
            <div class="row filter">
                <div class="col-md-3">
                    <span class="label pull-left">SẮP XẾP THEO</span>
                    <div class="dropdown pull-left">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Giá tăng dần<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">JavaScript</a></li>
                        </ul>
                    </div>
                    <div class="clearfix visible-xs"></div>
                </div>
                <div class="col-md-3">
                    <span class="label pull-left">XEM</span>
                    <div class="dropdown pull-left">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">1<span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                        </ul>
                    </div>
                    <span class="label pull-left">mỗi trang</span>
                    <div class="clearfix visivle-xs"></div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <button class="btn pull-right more-btn">Xem tất cả</button>
                </div>
            </div>
        </div>

        <!-- Product group -->
        <section class="product-group">
            <div class="">
                <figure class="product-group-item col-md-3 col-xs-6">
                    <div class="product-wraper">
                        <div class="product-img">
                            <a href="#"><img src="{{url('theme/images/best-seller-1.png')}}" alt="" class="img-responsive"></a>
                            <div class="price-hover visible-lg">500.000VNĐ</div>
                        </div>
                        <header class="text-center text-uppercase">Giá gỗ treo tường thanh ngang</header>
                        <p class="price text-center">500.000VNĐ</p>
                        <div class="product-btn col-md-12 visible-lg">
                            <button class="pull-left btn-buy">Mua ngay</button>
                            <button class="pull-right btn-more">Xem thêm</button>
                        </div>
                    </div>
                </figure>
            </div>
        </section>
        <hr>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row filter" id="filter-bottom">
                <div class="col-md-3 pull-left">Hiển thị 1 - 24 của 27 sản phẩm</div>
                <div class="clearfix visible-xs"></div>
                <div class="col-md-4 col-md-offset-4">
                    <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <button class="btn pull-right more-btn">Xem thêm</button>
                </div>
            </div>
        </div>
        <!-- End product group -->
    </div>
</div>
