@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{url('admin/assets/css/fileinput.min.css')}}"/>
@stop
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/ecommerce/all-product')}}">eCommerce All Product</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row" ng-controller="ProductAll">
		<div class="col-md-12">
		<div class="col-md-4">
		    <input type="text" class="form-control input-sm" placeholder="Search product..." ng-model="search"/>
		</div>
        <div class="col-md-4">
		    <input type="text" class="form-control input-sm" placeholder="Product per page" ng-model="pageSize"/>
		</div>
		<div class="col-md-4">
            <select name="" class="form-control input-sm" id="" ng-model="category">
            <option value=""><small>All</small></option>
            <option value="Quần áo nam"><small>Quần áo nam</small></option>
        </select>
        </div>
		<div style="margin-bottom: 50px;"></div>
            <div class="col-md-3" dir-paginate="product in products | itemsPerPage:pageSize | filter:search |filter:category" current-page="currentPage">
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<small class="text-danger">@{{ product.name }}</small>
						</div>
					</div>
					<div class="portlet-body">
                        <img ng-src="/uploads/images/ecommerce/@{{ product.feature_image }}" class="img-responsive" alt=""/>
                        <hr/>
                        <p><strong class="text-danger">@{{ product.name }}</strong><br/></p>
                        <p><strong ng-if="product.selling_price == 0">@{{ product.listed_price }}đ</strong></p>
                        <p><strong ng-if="product.selling_price > 0"><del>@{{ product.listed_price }}đ</del></strong></p>
                        <p><strong ng-hide="product.selling_price == 0">@{{ product.selling_price }}đ</strong></p>
                        <p><strong class="text-success">@{{ product.category }}</strong></p><br/>
                        <a href="/admin/ecommerce/product/edit-product/@{{ product.id }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button></a>
                         <button ng-really-message="Are you sure?" ng-really-click="DeleteProduct($index,product.id)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                         <button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button>
					</div>
			    </div>
            </div>
		</div>
		<div class="col-md-12">
            <div class="clear-fix"></div>
               <div ng-if="posts.length == 0" class="col-md-12 text-center">Chưa có sản phẩm nào</div>
                   <div class="pull-right">
                   <div ng-controller="OtherController" class="other-controller">
                       <div class="text-center">
                       <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template_url="/admin/angular-js/html/phantrang.html">
                       </dir-pagination-controls>
                   </div>
            </div>
        </div>
		</div>
	</div>
@stop
@section('script')
<script src="{{url('/admin/assets/js/jquery.slugify.js')}}"></script>
<script src="{{url('/admin/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{url('admin/assets/js/fileinput.min.js')}}"></script>
	<script>
	$("#input-4").fileinput();
    // with plugin options
    $("#input-4").fileinput({'showUpload':false, 'previewFileType':'any'});
	</script>
	<script>
    	$("#input-image").fileinput();
        // with plugin options
        $("#input-image").fileinput({'showUpload':false,'showFilename':false, 'previewFileType':'any'});
    	</script>
	<script>
	$('#slug').slugify('#name');
	</script>
@stop