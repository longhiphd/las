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
   <a href="{{url('admin/ecommerce/product')}}">eCommerce Product</a>
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
            <strong>Success!</strong> {{Session::get('errors')}}
        </div>
 @endif
</div>
{{--END MESSAGE--}}
{{--CREATE PRODUCT FORM--}}
<form action="{{url('admin/ecommerce/product')}}" method="POST" enctype="multipart/form-data">
	<div class="row">
           <div class="col-md-8">
				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Product</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <div class="form-group">
                            <label for=""><small>Name</small></label>
                            <input type="text" class="form-control input-sm" name="name" id="name"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for=""><small>Slug</small></label>--}}
                            {{--<input type="text" class="form-control input-sm" name="slug" id="slug"/>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for=""><small>Sku</small></label>
                            <input type="text" class="form-control input-sm" name="sku" id="sku" value="#"/>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Price</small></label>
                            <input type="text" class="form-control input-sm" name="listed_price"/>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Sale</small></label>
                            <input type="text" class="form-control input-sm" name="selling_price"/>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Description</small></label>
                            <textarea name="description" class="ckeditor" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Content</small></label>
                            <textarea name="content" class="ckeditor" id="" cols="30" rows="10"></textarea>
                        </div>
					</div>
			    </div>
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Seo</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <div class="form-group">
                            <label for=""><small>Meta title</small></label>
                            <input type="text" class="form-control input-sm" name="meta_title"/>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Meta description</small></label>
                            <input type="text" class="form-control input-sm" name="meta_description"/>
                        </div>
					</div>
			    </div>
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Galery</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <div class="form-group">
                            <input id="input-4" data-show-upload="false" data-show-filename="false" name="galery[]" type="file" multiple="true">
                        </div>
					</div>
			    </div>
				<!-- END ALERTS PORTLET-->
		   </div>
           <div class="col-md-4">
				<!-- BEGIN ALERTS PORTLET-->
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Category</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <div class="form-group">
                            <select name="category_id" class="form-control input-sm" id="">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
			    </div>
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Attributes</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        @foreach($attributes_cate as $attribute_cate)
                            <strong class='text-danger'>{{$attribute_cate->name}}:</strong>
                            @foreach($attribute_cate->attributes as $attribute)
                                <label class="checkbox-inline input-sm"><input name="attributes[]" type="checkbox" value="{{$attribute->id}}"><small>{{$attribute->name}}</small></label>
                            @endforeach
                            <hr/>
                        @endforeach
					</div>
			    </div>
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Feature Image</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="#portlet-config" data-toggle="modal" class="config">
							</a>
							<a href="javascript:;" class="reload">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <input id="input-image" name="feature_image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
					</div>
			    </div>
				<!-- END ALERTS PORTLET-->
				<button class="btn btn-sm btn-danger btn-block">Create</button>
		   </div>
		</div>
</form>
{{--END CREATE PRODUCT FORM--}}
@stop
@section('script')
<script src="{{url('/admin/assets/js/jquery.slugify.js')}}"></script>
<script src="{{url('/admin/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{url('admin/assets/js/fileinput.min.js')}}"></script>
<script src="{{url('admin/assets/js/summernote.min.js')}}"></script>
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