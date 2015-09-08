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
   <a href="{{url('admin/ecommerce/groups')}}">eCommerce Group Product Manager</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
{{--START MESSAGE--}}
<div class="col-md-12">
 @if(Session::has('success'))
     <div class="alert alert-success alert-dismissable">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Success!</strong> {{Session::get('success')}}
     </div>
 @endif
     @if(Session::has('errors'))
        <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Errors!</strong> {{Session::get('errors')}}
        </div>
 @endif
</div>
{{--END MESSAGE--}}
{{--CREATE PRODUCT FORM--}}
	<div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-list-alt font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">{{$group->name}}</span>
                        {{--<span class="caption-helper">add new</span>--}}
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="{{url('admin/ecommerce/groups/delete-product-in-this-group')}}" method="POST">
                        <table class="table table-hover">
                            <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Sku</th>
                                    <th>Name</th>
                                    <th>Listed Price</th>
                                    <th>Selling Price</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach($group->products as $product)
                                  <tr>
                                    <td width="2%"><input type="checkbox" name="product_id[]" class="" value="{{$product->id}}"/></td>
                                    <td width="5%">{{$product->sku}}</td>
                                    <td width="30%">{{$product->name}}</td>
                                    <td width="10%">{{$product->listed_price}}</td>
                                    <td width="10%">{{$product->selling_price}}</td>
                                  </tr>
                                  @endforeach
                            </tbody>
                        </table>
                        @if($count_product == 0)
                            <p class="text-center"><small>You don't have product in this group</small></p>
                        @else
                        <div class="clearfix">
                            <div class="pull-right">
                                <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete product in this group</button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="group_id" value="{{$group->id}}"/>
                    </form>
                </div>
            </div>
        </div>
	</div>
	<div class="row" ng-controller="ProductAll">
	    <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-suitcase font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">All Products</span>
                            {{--<span class="caption-helper">add new</span>--}}
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="javascript:;" class="remove">
                        </a>
                    </div>
                    </div>
                    <div class="portlet-body" style="padding-bottom: 30px;">
                        <form action="{{url('admin/ecommerce/groups/insert-product-into-group')}}" method="POST">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>Search Product</strong><input type="text" class="form-control input-sm" ng-model="search" placeholder="Search product..."/>
                                </div>
                                <div class="col-md-3">
                                    <strong>Product Per Page</strong><input type="text" class="form-control input-sm" ng-model="pageSize"/>
                                </div>
                                <div class="col-md-3">
                                    <strong>Category</strong><input type="text" class="form-control input-sm" ng-model="category"/>
                                </div>
                                <div class="col-md-3">
                                    <strong>Insert</strong><br/><button class="btn btn-sm btn-danger "><i class="fa fa-plus"></i> Insert products into this group</button>
                                </div>
                            </div>
                            <hr/>
                            <table class="table table-hover">
                                <thead>
                                      <tr>
                                        <th width="2%">#</th>
                                        <th>Sku</th>
                                        <th>Name</th>
                                        <th>Listed Price</th>
                                        <th>Selling Price</th>
                                        <th>Category</th>
                                      </tr>
                                </thead>
                                <tbody dir-paginate="product in products | itemsPerPage:pageSize | filter:search">
                                      <tr>
                                        <td width="2%"><input type="checkbox" name="product_id[]" class="" value="@{{ product.id }}"/></td>
                                        <td>@{{ product.sku }}</td>
                                        <td width="30%">@{{ product.name }}</td>
                                        <td width="10%">@{{ product.listed_price }}</td>
                                        <td width="10%">@{{ product.selling_price }}</td>
                                        <td width="20%">@{{ product.category }}</td>
                                      </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="group_id" value="{{$group->id}}"/>
                        </form>
                            <div class="clear-fix"></div>
                                    <div ng-if="products.length == 0" class="col-md-12 text-center">Chưa có sản phẩm nào</div>
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
	    </div>
	</div>
{{--END CREATE PRODUCT FORM--}}
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