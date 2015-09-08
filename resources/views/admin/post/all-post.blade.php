@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/post/all-post')}}">All Post</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row">
					<div class="col-md-12">
							<div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-plus font-red-sunglo"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">All Post</span>
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
								<div class="portlet-body"  ng-controller='AllPost' style="padding-bottom: 30px;">
											    <h4 class="text-success">@{{ msg.msg }}</h4>
											    <div class="row">
                                                    <div class="col-md-3">
                                                       <strong>Post per page</strong><input type="number" min="1" max="100" class="form-control input-sm"  ng-model="pageSize">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <strong>Search post</strong><input type="text"  class="form-control input-sm" ng-model="search" placeholder="Search post...">
                                                    </div>
											    </div>
											    <hr/>
                                                <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Slug</th>
                                                                    <th>Publish</th>
                                                                    <th>Hot</th>
                                                                    <th>Sticky</th>
                                                                    <th>Modify</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody  dir-paginate="post in posts | itemsPerPage:pageSize | filter:search" current-page="currentPage" >

                                                                <tr>
                                                                    <td width="5%">@{{ $index + 1 }}</td>
                                                                    <td width="30%">
                                                                        <span>
                                                                           <strong class="text-danger">@{{ post.name}}</strong>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>
                                                                              @{{ post.slug}}
                                                                        </span>
                                                                    </td>
                                                                    <td width="15%">
                                                                        <span>@{{ post.publish_at }}</span>
                                                                    </td>
                                                                    <td width="5%">
                                                                        <center><span  ng-if="post.isHot == 0"><i style="cursor:pointer" ng-click=" setEnableHot(post.id);" class="fa fa-star-o"></i></span></center>
                                                                        <center><span  ng-if="post.isHot == 1"><i style="cursor:pointer" ng-click=" setDisableHot(post.id);" class="fa fa-star"></i></span></center>
                                                                    </td>
                                                                    <td width="5%">
                                                                        <center><span><i style="cursor:pointer" ng-if="post.isSticky == 0" ng-click=" setEnableSticky(post.id);" class="fa fa-flag-o"></i></span></center>
                                                                        <center><span><i style="cursor:pointer" ng-if="post.isSticky == 1" ng-click=" setDisableSticky(post.id);" class="fa fa-flag"></i></span></center>
                                                                    </td>
                                                                    <td width="10%">
                                                                        <a href="/admin/post/edit-post/@{{ post.id }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button></a>
                                                                        <button class="btn btn-danger btn-sm" ng-really-message="Are you sure?" ng-really-click="moveTrash($index,post.id)"><i class="fa fa-times"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="clear-fix"></div>
                                                        <div ng-if="posts.length == 0" class="col-md-12 text-center">Chưa có bài viết nào</div>
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
@stop