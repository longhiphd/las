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
   <a href="{{url('admin/post')}}">Post</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row" ng-controller='Tags' >
					<div class="col-md-12">
							<div class="portlet-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active" >
												<a href="#tab_general" data-toggle="tab">
												Post Add </a>
											</li>
											<li>
												<a href="#tab_tags" data-toggle="tab">
												Tags </a>
											</li>
										</ul>
										<div class="tab-content no-space">
											<div class="tab-pane active" id="tab_general" style="padding: 0px;">
                                            @if(Session::has('success'))
                                                 <div class="alert alert-success alert-dismissable">
                                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Success!</strong> {{Session::get('success')}}
                                                 </div>
                                            @endif
											    <form action="{{url('admin/post')}}" class="form-row-seperated" method="POST" enctype="multipart/form-data">
													    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
													    <div class="col-md-8" style="padding: 0px;">
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Post</span>
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
                                                                    <div class="form-group">
                                                                        <label class="control-label"><small>Name:</small><span class="required">
                                                                        * </span>
                                                                        </label>
                                                                        <input type="text" class="form-control input-sm" id="name" name="name" placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><small>Content:</small><span class="required">
                                                                        * </span>
                                                                        </label>
                                                                        <textarea name="content" class="ckeditor " id="" cols="30" rows="10"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><small>Title:</small><span class="required">
                                                                        * </span>
                                                                        </label>
                                                                        <input type="text" class="form-control input-sm" name="meta_title" placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label"><small>Description:</small><span class="required">
                                                                        * </span>
                                                                        </label>
                                                                        <input type="text" class="form-control input-sm" name="meta_description" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
														<div class="col-md-4" style="padding-right: 0px;">
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Language</span>
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
                                                                    <div class="form-group">
                                                                            <select name="lang_id" class="form-control input-sm" id="">
                                                                                <option  ng-repeat="language in languages" value="@{{ language.id }}">@{{ language.name }}</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                        <a href="javascript:;" class="remove">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="form-group">
                                                                        <select name="category_id" class="form-control input-sm" id="">
                                                                            @foreach($categories_article as $category_article)
                                                                                <option value="{{$category_article->id}}">{{$category_article->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Tags</span>
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
                                                                    <div class="form-group">
                                                                            <div class="form-control height-auto">
                                                                                <div class="scroller" style="height:275px;" data-always-visible="1">
                                                                                <input type="text" class="form-control input-sm" ng-model="search" placeholder="Search"/>
                                                                                    <ul class="list-unstyled" ng-repeat="language in languages ">
                                                                                        <li ng-repeat="tag in language.tags |filter:search">
                                                                                            <label class="checkbox-inline"><input type="checkbox" name="tags[]" value="@{{ tag.id }}">@{{ tag.name }}</label>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                 </div>
                                                            </div>
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Image</span>
                                                                        <span class="caption-helper">add new</span>
                                                                    </div>
                                                                    <div class="tools">
                                                                        <a href="javascript:;" class="collapse">
                                                                        </a>
                                                                        <a href="javascript:;" class="remove">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-title">
                                                                    <div class="form-group">
                                                                        <input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Publish</span>
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
                                                                    <div class="form-group">
                                                                        <input type="datetime-local" name="publish_at" class="form-control input-sm"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-check"></i>Create</button>
														</div>
											    </form>
											</div>
                                            <div class="tab-pane" id="tab_tags">
                                                    <div class="col-md-8" style="padding: 0px;">
                                                            <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Tag</span>
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
                                                                    <form role="form" class="form-horizontal" ng-submit="AddTag()">
                                                                        <div class="form-group">
                                                                            <label class="col-md-2 control-label">Name: <span class="required">
                                                                            * </span>
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text" class="form-control input-sm"  placeholder="" ng-model="name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-2 control-label">Slug: <span class="required">
                                                                            * </span>
                                                                            </label>
                                                                            <div class="col-md-10">
                                                                                <input type="text" class="form-control input-sm"  ng-model="slug" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group" >
                                                                            <label class="col-md-2 control-label">Langguage:<span class="required">*</span></label>
                                                                            <div class="col-md-10">
                                                                                <select class="form-control input-sm" ng-model="lang_id" ng-options="x.id as x.name for x in languages" >
                                                                                </select>
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
                                                                    <table class="table table-striped table-hover table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Tag Name</th>
                                                                                <th>Slug</th>
                                                                                <th>Language</th>
                                                                                <th>Edit</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody ng-repeat="lang in languages" >
                                                                            <tr ng-repeat="tag in lang.tags">
                                                                                <td><strong class="text-danger">@{{ $index + 1 }}</strong></td>
                                                                                <td><span editable-text="tag.name" e-name="name" e-form="rowform"  e-required>
                                                                                             <strong class="text-danger">@{{ tag.name || 'empty' }}</strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td><span editable-text="tag.slug" e-name="slug" e-form="rowform" >
                                                                                              @{{ tag.slug || 'empty' }}
                                                                                    </span>
                                                                                </td>
                                                                                <td>
                                                                                              @{{ lang.name || 'empty' }}
                                                                                </td>
                                                                                <td style="white-space: nowrap">
                                                                                    <!-- form -->
                                                                                    <form editable-form name="rowform" onbeforesave="SaveTag($data, tag.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="lang.tags == tag">
                                                                                      <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">
                                                                                        save
                                                                                      </button>
                                                                                      <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default">
                                                                                        cancel
                                                                                      </button>
                                                                                    </form>
                                                                                    <div class="buttons" ng-show="!rowform.$visible">
                                                                                      <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                                                                      <button class="btn btn-danger btn-sm" ng-really-message="Are you sure?" ng-really-click="RemoveTag(tag.id)"><i class="fa fa-times"></i></button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
												    </div>
											        <!-- Language -->
                                                    <div class="col-md-4" style="padding-right: 0px;">
                                                             <div class="portlet light">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="fa fa-plus font-red-sunglo"></i>
                                                                        <span class="caption-subject font-red-sunglo bold uppercase">Language</span>
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
                                                                    <form role="form" class="form-horizontal" ng-submit="AddLang()">
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <input type="text" class="form-control input-sm"  placeholder="Name" ng-model="lang_name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <input type="text" class="form-control input-sm"  ng-model="lang_slug" placeholder="Slug">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <button type="submit" class="btn green-haze btn-circle" ><i class="fa fa-check"></i> Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <table class="table table-striped table-hover table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID</th>
                                                                                <th>Name</th>
                                                                                <th>Slug</th>
                                                                                <th>Edit</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody ng-repeat="lang in languages" >
                                                                            <tr>
                                                                                <td><strong class="text-danger">@{{ $index + 1 }}</strong></td>
                                                                                <td><span editable-text="lang.name" e-name="lang_name" e-form="rowform"  e-required>
                                                                                             <strong class="text-danger">@{{ lang.name || 'empty' }}</strong>
                                                                                    </span>
                                                                                </td>
                                                                                <td><span editable-text="lang.slug" e-name="lang_slug" e-form="rowform" >
                                                                                              @{{ lang.slug || 'empty' }}
                                                                                    </span>
                                                                                </td>
                                                                                <td style="white-space: nowrap">
                                                                                    <!-- form -->
                                                                                    <form editable-form name="rowform" onbeforesave="saveTag($data, lang.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="lang == languages">
                                                                                      <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary btn-sm">
                                                                                        save
                                                                                      </button>
                                                                                      <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default btn-sm">
                                                                                        cancel
                                                                                      </button>
                                                                                    </form>
                                                                                    <div class="buttons" ng-show="!rowform.$visible">
                                                                                      <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                                                                      <button class="btn btn-danger btn-sm" ng-really-message="Are you sure?" ng-really-click="deleteLang($index,lang.id)"><i class="fa fa-times"></i></button>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
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