@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/ecommerce/orders')}}">eCommerce Orders</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="col-md-12" ng-controller="Order" style="padding: 0px;">
        <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bars font-red-sunglo"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Orders</span>
					<span class="caption-helper">view all</span>
				</div>
			<div class="tools">
				<a href="javascript:;" class="collapse">
				</a>
				<a href="javascript:;" class="reload">
				</a>
				<a href="javascript:;" class="remove">
				</a>
			</div>
			</div>
				<div class="portlet-body" style="padding-bottom: 30px;">
				<div class="row">
				    <div class="col-md-3">
				        <strong>Search:</strong><input type="text" ng-model="search" class="form-control input-sm" placeholder="Search order..."/>
				    </div>
				    <div class="col-md-3">
                    	<strong>Order per page:</strong><input type="text" ng-model="pageSize" class="form-control input-sm"/>
                    </div>
                    <div class="col-md-3">
                        <strong>Status</strong><select name="" class="form-control input-sm" ng-model="order_status" >
                            <option value="">None</option>
                            <option value="Chờ xử lý">Chờ xử lý</option>
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Hoàn thành">Hoàn thành</option>
                        </select>
                    </div>
				</div>
				<div style="margin-bottom: 20px;"></div>
                    <table class="table table-striped table-hover table-bordered">
                         <thead>
                              <tr>
                                  <th>Order ID</th>
                                  <th>Frist Name</th>
                                  <th>Last Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Note</th>
                                  <th>Status</th>
                                  <th>Update Status</th>
                              </tr>
                         </thead>
                         <tbody dir-paginate="order in orders | itemsPerPage:pageSize | filter:search | filter:order_status" current-page="currentPage" >
                               <tr >
                                    <td>#@{{ order.id }}</td>
                                    <td>@{{ order.first_name }}</td>
                                    <td>@{{ order.last_name }}</td>
                                    <td>@{{ order.email }}</td>
                                    <td>@{{ order.phone }}</td>
                                    <td>@{{ order.note }}</td>
                                    <td>
                                        <span editable-select="order.status" e-name="status" e-form="rowform" e-ng-options="s.value as s.text for s in statuses">
                                              @{{ order.status }}
                                        </span>
                                    </td>
                                    <td style="white-space: nowrap">
                                        <!-- form -->
                                        <form editable-form name="rowform" onbeforesave="saveOrder($data, order.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="inserted == order">
                                             <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary btn-sm">
                                                  <i class="fa fa-check"></i>
                                             </button>
                                             <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default btn-sm">
                                                   <i class="fa fa-times"></i>
                                             </button>
                                        </form>
                                        <div class="buttons" ng-show="!rowform.$visible">
                                             <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                             <a href="/admin/ecommerce/order/@{{ order.id }}"><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></a>
                                        </div>
                                    </td>
                               </tr>
                         </tbody>
                    </table>
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