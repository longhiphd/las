@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/post/edit-post')}}">Edit Post</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row">
					<div class="col-md-12">
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-pencil font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										EDIT POST </span>
									</div>
									<div class="actions btn-set">

										<div class="btn-group">
											<a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
											<i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													Duplicate </a>
												</li>
												<li>
													<a href="javascript:;">
													Delete </a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="javascript:;">
													Print </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active" >
												<a href="#tab_general" data-toggle="tab">
												Edit Post </a>
											</li>
											<li>
												<a href="#tab_edit_image" data-toggle="tab">
												Edit Image </a>
											</li>
                                            <li>
												<a href="#tab_tags" data-toggle="tab">
												Edit Tags </a>
											</li>
										</ul>
										<div class="tab-content no-space">
											<div class="tab-pane active" id="tab_general">
                                            @if(Session::has('success'))
                                                 <div class="alert alert-success alert-dismissable">
                                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Success!</strong> {{Session::get('success')}}
                                                 </div>
                                             @endif
												<form action="{{url('admin/post/edit-post')}}" class="form-row-seperated" method="POST" enctype="multipart/form-data">
													<div class="form-body">
													    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
													    <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label class="control-label">Name: <span class="required">
                                                                * </span>
                                                                </label>
                                                                <input type="text" class="form-control" name="name" value="{{$post->name}}" placeholder="">
                                                            </div>
                                                            {{--<div class="form-group">--}}
                                                                {{--<label class="control-label">Slug: <span class="required">--}}
                                                                {{--* </span>--}}
                                                                {{--</label>--}}
                                                                {{--<input type="text" class="form-control" name="slug" value="{{$post->slug}}" placeholder="">--}}
                                                            {{--</div>--}}
                                                            <div class="form-group">
                                                                <label class="control-label">Content: <span class="required">
                                                                * </span>
                                                                </label>
                                                                <textarea name="content" class="ckeditor" id="" cols="30" rows="10">{{$post->content}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Title: <span class="required">
                                                                * </span>
                                                                </label>
                                                                <input type="text" class="form-control" name="meta_title" value="{{$post->meta_title}}" placeholder="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Description: <span class="required">
                                                                * </span>
                                                                </label>
                                                                <input type="text" class="form-control" name="meta_description" value="{{$post->meta_description}}" placeholder="">
                                                            </div>
														</div>
														<div class="col-md-4">
														    <div class="form-group">
														        <div class="col-md-12">
														            <label for="" class="control-label">Language:</label><span class="required">
                                                                    * </span>
														        </div>
														        <div class="col-md-12">
                                                                    <select name="lang_id" class="form-control" id="">
                                                                        @foreach($langs as $lang)
                                                                            @if($post->id == $lang->id)
                                                                                <option selected="selected" value="{{$lang->id}}">{{$lang->name}}</option>
                                                                            @endif
                                                                            @if($post->id != $lang->id)
                                                                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
														        </div>
														        <div class="clearfix"></div>
														    </div>
                                                            <div class="form-group">
														        <div class="col-md-12">
														            <label for="" class="control-label">Category:</label><span class="required">
                                                                    * </span>
														        </div>
														        <div class="col-md-12">
                                                                    <select name="category_id" class="form-control" id="">
                                                                        @foreach($categories as $category)
                                                                            @if($post->category_id == $category->id)
                                                                                <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                                                            @endif
                                                                            @if($post->category_id != $category->id)
                                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
														        </div>
														        <div class="clearfix"></div>
														    </div>
                                                            <input type="hidden" value="{{$post->id}}" name="post_id"/>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-danger btn-block"><i class="fa fa-check"></i> Save</button>
                                                                </div>
                                                            </div>
														</div>
												    </div>
												</form>
											</div>
											<!-- Edit Post Image -->
											<div class="tab-pane" id="tab_edit_image" ng-controller="EditImage">
                                                <div class="portlet box green">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-image"></i>Edit Image
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
                                                        @if(Session::has('success'))
											                <div class="alert alert-success">{{Session::get('success')}}</div>
											            @endif
                                                        @if(Session::has('error'))
											                <div class="alert alert-danger">{{Session::get('error')}}</div>
											            @endif
														<div class="tabbable-custom nav-justified">
														    <div class="row">
														        <div class="col-md-3">
														            <img src="/uploads/images/post/{{$post->img}}" class="img-responsive" alt=""/>
														            <button class="btn btn-danger" ng-click="isCollapsed = !isCollapsed"><i class=" fa fa-pencil"></i></button>
                                                                    <div collapse="isCollapsed">
                                                                        <form role="form" class="form-horizontal" action="/admin/post/edit-post/image" method="POST" enctype="multipart/form-data">
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                              <div class="fileinput-new thumbnail" style="width: 215px; height: 200px;">
                                                                                <img data-src="holder.js/100%x100%" >
                                                                              </div>
                                                                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 200px;"></div>
                                                                              <div>
                                                                                <span class="btn btn-danger btn-file"><i class="fa fa-image"></i><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                                              </div>
                                                                            </div>
                                                                            <input type="hidden" name="post_id" value="{{$post->id}}"/>
                                                                            <button class="btn btn-primary"><i class="fa fa-check"></i>Update</button>
                                                                        </form>
                                                                    </div>
														        </div>
														    </div>
														</div>
													</div>
												</div>
											</div>
                                            <div class="tab-pane" id="tab_tags" ng-controller="Tags">
                                                <div class="portlet box green">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-tags"></i>Edit Tags
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
                                                          @if(Session::has('success'))
											                <div class="alert alert-success">{{Session::get('success')}}</div>
											              @endif
                                                          @if(Session::has('error'))
											                <div class="alert alert-danger">{{Session::get('error')}}</div>
											              @endif
                                                          <h2>Tags of this post:</h2>
                                                          @foreach($post->tags as $tag)
                                                             <li>{{$tag->name}} <a href="/admin/post/edit-post/remove-tag/{{$post->id}}/{{$tag->id}}"><span class="text-danger">x</span></a></li>
                                                          @endforeach
                                                          <h2>All Tag</h2>
                                                          <form action="/admin/post/edit-post/add-tag" method="POST">
                                                              <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                              <div class="form-control height-auto">
                                                                  <div class="scroller" style="height:275px;" data-always-visible="1">
                                                                      <ul class="list-unstyled">
                                                                          <li >
                                                                              @foreach($tags as $tag)
                                                                                  <label class="checkbox-inline" ><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
                                                                              @endforeach
                                                                          </li>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                              <input type="hidden" value="{{$post->id}}" name="post_id"/>
                                                              <button class="btn btn-danger"><i class="fa fa-check">Add tag</i></button>
                                                          </form>
                                                          <small>Lưu ý không chọn tag đã có!</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
@stop