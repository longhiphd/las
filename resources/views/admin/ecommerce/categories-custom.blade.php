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
   <a href="{{url('admin/ecommerce/categories-custom')}}">eCommerce Categories Custom</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
{{--START MESSAGE--}}
<div class="col-md-12" style="padding: 0">
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
	<div class="row">
           <div class="col-md-12">
				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Categories Custom</span>
							<span class="caption-helper">add new</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
					    <form action="{{url('admin/ecommerce/categories-custom')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""><small>Name</small></label>
                                <input type="text" class="form-control input-sm" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for=""><small>Link</small></label>
                                <input type="text" class="form-control input-sm" name="link" required/>
                            </div>
                            <div class="form-group">
                                <label for=""><small>Count</small></label>
                                <input type="number" class="form-control input-sm" name="count" required/>
                            </div>
                            <div class="form-group">
                                <label for=""><small>Image</small></label>
                                <input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
                                {{--<input type="file" name="image"/>--}}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block btn-sm">Create</button>
                            </div>
                        </form>
					</div>
			    </div>
		   </div>
           <div class="col-md-12">
				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">All Categories Custom</span>
							<span class="caption-helper">view all</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Count</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($categories as $category)
                                    <td>{{$category->id}}</td>
                                    <td width="5%"><img src="/uploads/images/ecommerce/{{$category->image}}" class="img-responsive" alt=""/></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->link}}</td>
                                    <td>{{$category->count}}</td>
                                    <td width="5%"><button data-target="#DeleteCategoryCustom{{$category->id}}" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button></td>
                                    <div id="DeleteCategoryCustom{{$category->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <form action="{{url('admin/ecommerce/categories-custom/delete-category-custom')}}" method="POST">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Delete Category</h4>
                                          </div>
                                          <div class="modal-body">
                                          <input type="hidden" name="category_id" value="{{$category->id}}"/>
                                            <p>Do you want delete this category?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
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
    	$("#input-image").fileinput();
        $("#input-image").fileinput({'showUpload':false,'showFilename':false, 'previewFileType':'any'});
    </script>
@stop