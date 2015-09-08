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
   <a href="{{url('admin/ecommerce/categories')}}">Categories</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row" ng-app="main">
					<div class="col-md-12">
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-bars font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Categories </span>
									</div>
									<div class="actions btn-set">
										<div class="btn-group">
											<a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
											<i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
											</ul>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_categories" data-toggle="tab">
												Categories </a>
											</li>
										</ul>
											<div class="tab-pane" id="tab_categories">
												<div class="portlet box green">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-gift"></i>Add new Category
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
														<div class="tabbable-custom nav-justified">
															<form role="form" id="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('admin/ecommerce/categories')}}">
															@if(Session::has('success'))
                                                                <div class="alert alert-success">{{Session::get('success')}}</div>
															@endif
															@if(Session::has('errors'))
                                                               <div class="alert alert-success">{{Session::get('errors')}}</div>
                                                            @endif
																<div class="form-group">
																	<label class="col-md-2 control-label">Name: <span class="required">
																	* </span>
																	</label>
																	<div class="col-md-10">
																		<input type="text" class="form-control" id="name" name="name">
																	</div>
																</div>
                                                                {{--<div class="form-group">--}}
																	{{--<label class="col-md-2 control-label">Slug: <span class="required">--}}
																	{{--* </span>--}}
																	{{--</label>--}}
																	{{--<div class="col-md-10">--}}
																		{{--<input type="text" class="form-control" id="slug" name="slug">--}}
																	{{--</div>--}}
																{{--</div>--}}
                                                                <div class="form-group">
																	<label class="col-md-2 control-label">Description: <span class="required">
																	* </span>
																	</label>
																	<div class="col-md-10">
																		<input type="text" class="form-control" id="description" name="description" placeholder="">
																	</div>
																</div>
																<div class="form-group" >
																    <label class="col-md-2 control-label">Father:<span class="required">*</span></label>
																    <div class="col-md-10">
                                                                        <select class="form-control" name="father_id">
                                                                           <option selected value="0">None</option>
                                                                           @foreach($categories_father as $category_father)
                                                                                <option value="{{$category_father->id}}">{{$category_father->name}}</option>
                                                                           @endforeach
                                                                        </select>
																    </div>
																</div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label">Image: <span class="required">
																	    * </span>
																	</label>
																	<div class="col-md-10">
																	<input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-preview-file-type="text" >
                                                                    </div>
																</div>
																<hr/>
                                                                <div class="form-group">
																	<label class="col-md-2 control-label">Meta title: <span class="required">
																	* </span>
																	</label>
																	<div class="col-md-10">
																		<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="">
																	</div>
																</div>
                                                                <div class="form-group">
																	<label class="col-md-2 control-label">Meta description:<span class="required">
																	* </span>
																	</label>
																	<div class="col-md-10">
																		<input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label class="col-md-2 control-label"><span class="required">
																	    </span>
																	</label>
																	<div class="col-md-10">
																		<button type="submit" class="btn green-haze btn-circle" ><i class="fa fa-check"></i> Save</button>
																	</div>
																</div>
															</form>
														</div>
														<hr/>
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Image</th>
                                                                    <th>Name</th>
                                                                    <th>Description</th>
                                                                    <th>Slug</th>
                                                                    <th>Edit</th>
                                                                    <th>Delete</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($categories as $category)
                                                                <tr>
                                                                    <td>{{$category->id}}</td>
                                                                    <td width="10%"><img src="/uploads/images/ecommerce/{{$category->img}}" class="img-responsive" alt="td"/>
                                                                    <td>{{$category->name}}</td>
                                                                    <td>{{$category->description}}</td>
                                                                    <td>{{$category->slug}}</td>
                                                                    <td width="5%"><a href="" data-toggle="modal" data-target="#myModal{{$category->id}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button></a></td>
                                                                    <div id="myModal{{$category->id}}" class="modal fade" role="dialog">
                                                                        <div class="modal-dialog">
                                                                            <!-- Modal content-->
                                                                            <form action="{{url('admin/ecommerce/categories/edit')}}" role="form" id="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Edit: {{$category->name}}</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for=""><small>Name</small></label>
                                                                                        <input type="text" name="name" id="name_edit{{$category->id}}" value="{{$category->name}}" class="form-control input-sm"/>
                                                                                    </div>
                                                                                    {{--<div class="form-group">--}}
                                                                                        {{--<label for=""><small>Slug</small></label>--}}
                                                                                        {{--<input type="text" name="slug" id="slug_edit{{$category->id}}"  class="form-control input-sm"/>--}}
                                                                                    {{--</div>--}}

                                                                                    <div class="form-group">
                                                                                        <label for=""><small>Description</small></label>
                                                                                        <input type="text" name="description" id="description" value="{{$category->description}}" class="form-control input-sm"/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for=""><small>Father</small></label>
                                                                                        <select class="form-control input-sm" name="father_id">
                                                                                            @foreach($categories_father as $category_father)
                                                                                               @if($category->father_id  == $category_father->id)
                                                                                               <option selected value="{{$category_father->id}}">{{$category_father->name}}</option>
                                                                                               @else
                                                                                               <option value="">None</option>
                                                                                               <option value="{{$category_father->id}}">{{$category_father->name}}</option>
                                                                                               @endif
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <hr/>
                                                                                    <div class="form-group">
                                                                                        <label for=""><small>Meta title</small></label>
                                                                                        <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control input-sm"/>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for=""><small>Meta description</small></label>
                                                                                        <input type="text" value="{{$category->meta_description}}" name="meta_description" class="form-control input-sm"/>
                                                                                    </div>
                                                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#image{{$category->id}}">Change Image ?</button>
                                                                                      <div id="image{{$category->id}}" class="collapse">
                                                                                        <div class="form-group">
                                                                                            <label for=""><small>Image</small></label>
                                                                                            <input  name="feature_image" type="file"  >
                                                                                        </div>
                                                                                      </div>
                                                                                      <input type="hidden" name="category_id" value="{{$category->id}}"/>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button class="btn btn-primary btn-sm" type="submit">Save change</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                            </form>
                                                                          </div>
                                                                    </div>
                                                                    <td width="5%">
                                                                    <a href="" data-toggle="modal" data-target="#Delete{{$category->id}}"><button class="btn btn-sm btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                    </button></a>
                                                                    </td>
                                                                    <div id="Delete{{$category->id}}" class="modal fade" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <form action="{{url('admin/ecommerce/categories/delete')}}" method="POST">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Delete item</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <p>Do you want delete : {{$category->name}} ?</p>
                                                                                <input type="hidden" name="category_id" value="{{$category->id}}"/>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                                                              </div>
                                                                            </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
												</div>
											</div>
										</div>
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

{{--Validate--}}
	<script>
        $("#form").validate({
            rules:{
                name:{
                required:true,
                remote:{
                    url:"{{url('/check/check-category')}}",
                    method:"POST"
                    }
                },
                description:{
                required:true
                }
            },
            messages:{
                name:{
                    required:'Bạn chưa nhập tên danh mục',
                    remote:'Danh mục đã tồn tại'
                },
                description:{
                    required:'Bạn chưa nhập mô tả ngắn cho danh mục'
                }
            }
        });
	</script>
	<script>
	$("#input-image").fileinput();
    // with plugin options
    $("#input-image").fileinput({'showUpload':false, 'previewFileType':'any'});
	</script>
	<script>
	$('#slug').slugify('#name')
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