@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/user/')}}">User</a>
   </li>
@stop
@section('content')
    <!--Thong ke -->
    <div class="col-md-12"  ng-controller="UserController" style="padding: 0px">
        <div class="portlet box red" >
        	<div class="portlet-title">
        		<div class="caption">
        			<i class="fa fa-users"></i>View All User
        		</div>
        		<div class="tools">
        			<a href="javascript:;" class="collapse">
        			</a>
        			<a href="#portlet-config" data-toggle="modal" class="config">
        			</a>
        		</div>
        	</div>
        		<div class="portlet-body" >
        		    <div class="row">
        		        <div class="col-md-12">
                            <form class="form-horizontal" role="form" ng-submit="AddUser()">
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="name">Name:</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="name" ng-model="name" >
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="email">Email:</label>
                                  <div class="col-sm-8">
                                    <input type="email" class="form-control input-sm" id="email" ng-model="email">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Password:</label>
                                  <div class="col-sm-8">
                                    <input type="password" class="form-control input-sm" id="pwd" ng-model="password">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
                                  <div class="col-sm-8">
                                    <input type="password" class="form-control input-sm" id="pwd" ng-model="password_confirmation">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2" for="pwd">Roles:</label>
                                  <div class="col-sm-8">
                                    <select name="" id="" ng-model="role_id" class="form-control input-sm" >
                                        <option ng-repeat="role in roles" value="@{{ role.value }}">@{{ role.name }}</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button ng-click="refresh()" type="submit" class="btn btn-danger">Register</button>
                                  </div>
                                </div>
                            </form>
                        </div>
        		    </div>
        			<div class="row" style="margin-bottom: 10px;">
        			<div class="col-md-12">
                    <table class="table table-striped table-hover table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody  >
                            <tr dir-paginate="user in users | itemsPerPage:pageSize | filter:search " current-page="currentPage">
                                <td><strong class="text-danger">@{{ $index + 1 }}</strong></td>
                                <td>
                                    <span editable-text="user.name" e-name="name" e-form="rowform"  e-required>
                                        <strong class="text-danger">@{{ user.name || 'empty' }}</strong>
                                    </span>
                                </td>
                                <td>
                                    <span editable-text="user.email" e-name="email" e-form="rowform"  e-required>
                                        @{{ user.email || 'empty' }}
                                    </span>
                                </td>
                                <td>
                                    <span editable-select="user.role" e-name="role_name" e-form="rowform" e-ng-options="x.value as x.name for x in roless">
                                          <span class="label label-danger" ng-if="user.role == 'admin'">@{{ user.role }}</span>
                                          <span class="label label-success" ng-if="user.role == 'shop_manager'">@{{ user.role }}</span>
                                          <span class="label label-primary" ng-if="user.role == 'article_manager'">@{{ user.role }}</span>
                                    </span>
                                </td>
                                <td style="white-space: nowrap">
                                      <!-- form -->
                                    <form editable-form name="rowform" onbeforesave="saveUser($data, user.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="users == user">
                                        <button  type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default btn-sm">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    <div class="buttons" ng-show="!rowform.$visible">
                                            <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm" ng-click="delete($index,user.id)"><i class="fa fa-close"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                    <div class="clear-fix"></div>
                    <div style="height: 10px;"></div>
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
@stop

