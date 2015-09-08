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
   <a href="{{url('admin/ecommerce/groups')}}">eCommerce Group Product</a>
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
<div class="row">
	    <div class="col-md-12">
	        <div class="col-md-12">
                <div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Groups</span>
							<span class="caption-helper">view all</span>
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

                       <table class="table table-hover">
                           <thead>
                             <tr>
                               <th><small>ID</small></th>
                               <th><small>Name</small></th>
                               <th><small>Slug</small></th>
                               <th width="15%"><small>Action</small></th>
                             </tr>
                           </thead>
                           <tbody>
                           @foreach($groups as $group)
                             <tr>
                               <td>{{$group->id}}</td>
                               <td>{{$group->name}}</td>
                               <td>{{$group->slug}}</td>
                               <td width="20%">
                                  <a href="/admin/ecommerce/groups/{{$group->id}}"><button class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button></a>
                                  <a href="" data-toggle="modal" data-target="#GroupEdit{{$group->id}}">
                                     <button class="btn btn-sm btn-primary" onclick="Slugify({{$group->id}}); updateKeyup({{$group->id}})"><i class="fa fa-pencil"></i></button>
                                  </a>
                                  <div id="GroupEdit{{$group->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <form action="{{url('admin/ecommerce/groups/edit-group')}}" method="POST" enctype="multipart/form-data">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Edit Group</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for=""><small>Name:</small></label>
                                                <input type="text" name="name" id="name_edit{{$group->id}}" class="form-control input-sm" value="{{$group->name}}"/>
                                            </div>
                                            <div class="form-group">
                                                <label for=""><small>Slug:</small></label>
                                                <input type="text" name="slug" id="slug_edit{{$group->id}}" class="form-control input-sm"/>
                                            </div>
                                            <div class="form-group">
                                                <label for=""><small>Meta Title</small></label>
                                                <input type="text" name="meta_title" value="{{$group->meta_title}}" class="form-control input-sm"/>
                                            </div>
                                            <div class="form-group">
                                                <label for=""><small>Meta Description</small></label>
                                                <input type="text" name="meta_description" value="{{$group->meta_description}}" class="form-control input-sm"/>
                                            </div>
                                            <input type="hidden" name="group_id" value="{{$group->id}}"/>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#image">Change Image ?</button>
                                                <div id="image" class="collapse">
                                                    <div class="form-group">
                                                        <label for=""><small>Image</small></label>
                                                        <input  name="feature_image_edit" type="file"  >
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary btn-sm">Save change</button>
                                          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      </form>

                                    </div>
                                  </div>
                                  <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                  <a href="" data-toggle="modal" data-target="#DeleteGroup{{$group->id}}"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>
                                    <div id="DeleteGroup{{$group->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                        <form action="{{url('admin/ecommerce/groups/delete-group')}}" method="POST">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Delete</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Do you want delete: {{$group->name}}</p>
                                            <input type="hidden" name="group_id" value="{{$group->id}}"/>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                               </td>
                             </tr>
                             @endforeach
                           </tbody>
                         </table>
                         @if($count == 0)
                            <p class="text-center"><small>You don't have group</small></p>
                         @endif
					</div>
			    </div>
			</div>
	    </div>
	</div>
	<div class="row">
	<form action="{{url('admin/ecommerce/groups/create-group')}}" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">
           <div class="col-md-8">
				<!-- BEGIN ALERTS PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-plus font-red-sunglo"></i>
							<span class="caption-subject font-red-sunglo bold uppercase">Group</span>
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
                        <div class="form-group">
                            <label for=""><small>Slug</small></label>
                            <input type="text" class="form-control input-sm" name="slug" id="slug"/>
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
                            <label for=""><small>Meta Title</small></label>
                            <input type="text" class="form-control input-sm" name="meta_title"/>
                        </div>
                        <div class="form-group">
                            <label for=""><small>Meta Description</small></label>
                            <input type="text" class="form-control input-sm" name="meta_description"/>
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
                        <input id="input-image" name="feature_image" type="file" class="file input-sm" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
					</div>
			    </div>
				<!-- END ALERTS PORTLET-->
				<button class="btn btn-sm btn-danger btn-block">Create</button>
		   </div>
		</div>
		</form>
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
	<script>
        	    function Slugify(id){
        	        $('#slug_edit'+id).slugify('#name_edit'+id);
        	    }
        </script>
    	<script>
    	    function updateKeyup(id){
    	        $('#name_edit'+id).keyup();
    	    }
    	</script>
@stop