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
   <a href="{{url('admin/setting/editor')}}">Editor</a>
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
							<span class="caption-subject font-red-sunglo bold uppercase">Editor</span>
							<span class="caption-helper">edit</span>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
							<a href="javascript:;" class="remove">
						    </a>
						</div>
					</div>
					<div class="portlet-body">
					    <form action="{{url('admin/setting/editor')}}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""><small>Editor</small></label>
                                <textarea name="data" class="form-control" id="" cols="30" rows="30">{{$file}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
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