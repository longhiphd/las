@extends('layouts.admin')

@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Dashboard</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/ecommerce/attributes')}}">eCommerce Attributes</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
	<div class="row" ng-controller='Attribute'>
					<div class="col-md-12">
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-pencil font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Attributes</span>
									</div>
									<div class="actions btn-set">
										<div class="btn-group">
											<a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
											<i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												{{--<li>--}}
													{{--<a href="javascript:;">--}}
													{{--Duplicate </a>--}}
												{{--</li>--}}
												{{--<li>--}}
													{{--<a href="javascript:;">--}}
													{{--Delete </a>--}}
												{{--</li>--}}
												{{--<li class="divider">--}}
												{{--</li>--}}
												{{--<li>--}}
													{{--<a href="javascript:;">--}}
													{{--Print </a>--}}
												{{--</li>--}}
											</ul>
										</div>
									</div>
								</div>
								<strong class="text-success">@{{ msg.msg }}</strong>
								<div class="portlet-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_attributes" data-toggle="tab">
												Attributes </a>
											</li>
										</ul>
										<div class="tab-content no-space">
                                            <div class="tab-pane active" id="tab_attributes">
                                            <div class="col-md-8" >
												<div class="portlet box green" >
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-gift"></i>Add new Attributes
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
													<a href="" data-toggle="modal" data-target="#CreateAttribute"><button type="button" class="btn green-haze btn-circle" ><i class="fa fa-plus"></i> Create</button></a>
                                                    <div id="CreateAttribute" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                        <form ng-submit="AttributeCreate()" name="CreateAttribute">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Create Attribute</h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                  <strong class="text-success">
                                                                  		@{{ msg.msg }}
                                                                  </strong>
                                                                      <div class="form-group">
                                                                         <label for=""><small>Attribute Name</small></label>
                                                                         <input type="text" class="form-control input-sm" ng-model="attribute_name" required/>
                                                                      </div>
                                                                      <div class="form-group">
                                                                          <label for="">Attribute Category</label>
                                                                          <select class="form-control input-sm" ng-model="attribute_category_id" required>
                                                                                <option selected value="">Select Attribute Category</option>
                                                                                <option ng-repeat="attribute_cate in attributes_cate" value="@{{ attribute_cate.id }}">@{{ attribute_cate.name }}</option>
                                                                          </select>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                      <button  type="submit" class="btn btn-primary btn-sm" ng-disabled="CreateAttribute.$invalid || CreateAttribute.$pending">Save</button>
                                                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                  </div>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                    <strong class="text-success">@{{ msgRemove.msg }}</strong>
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Attribute Name</th>
                                                                    <th>Attribute Category</th>
                                                                    <th>Edit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody ng-repeat="attribute_cate in attributes_cate" >
                                                                <tr ng-repeat="attribute in attribute_cate.attributes">
                                                                    <td><strong class="text-danger">@{{ $index + 1 }}</strong></td>
                                                                    <td><span editable-text="attribute.name" e-name="attribute_name" e-form="rowform"  e-required>
                                                                                 <strong class="text-danger">@{{ attribute.name || 'empty' }}</strong>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                                  @{{ attribute_cate.name || 'empty' }}
                                                                    </td>
                                                                    <td style="white-space: nowrap">
                                                                        <!-- form -->
                                                                        <form editable-form name="rowform" onbeforesave="SaveAttribute($data, attribute.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="attribute_cate.attributes == attribute">
                                                                          <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-check"></i>
                                                                          </button>
                                                                          <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-times"></i>
                                                                          </button>
                                                                        </form>
                                                                        <div class="buttons" ng-show="!rowform.$visible">
                                                                          <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                                                          <button class="btn btn-danger btn-sm" ng-really-message="Are you sure?" ng-really-click="RemoveAttribute(attribute.id)"><i class="fa fa-times"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
												</div>
											</div>
											<!-- Language -->
                                            <div class="col-md-4">
												<div class="portlet box green" >
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-gift"></i>Attributes Categories
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
													<a href="" data-toggle="modal" data-target="#CreateAttribute_Cate"><button type="submit" class="btn green-haze btn-circle" ><i class="fa fa-plus"></i> Create</button></a>
													<hr/>

													<div id="CreateAttribute_Cate" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <form name="myForm" ng-submit="CreateAttributeCategory()">
                                                            <div class="modal-content">
                                                                  <div class="modal-header">
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                      <h4 class="modal-title">Create Attribute Category</h4>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                  <strong class="text-success">
                                                                  		@{{ msg.msg }}
                                                                  </strong>
                                                                      <div class="form-group">
                                                                         <label for=""><small>Attribute Category Name</small></label>
                                                                         <input type="text" class="form-control input-sm" ng-model="category_name" required/>
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                      <button type="submit" class="btn btn-primary btn-sm" ng-disabled="myForm.$invalid || myForm.$pending">Save</button>
                                                                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                  </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                        <table class="table table-striped table-hover table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Edit</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody ng-repeat="attribute_cate in attributes_cate" >
                                                                <tr>
                                                                    <td><strong class="text-danger">@{{ $index + 1 }}</strong></td>
                                                                    <td><span editable-text="attribute_cate.name" e-name="name" e-form="rowform"  e-required>
                                                                                 <strong class="text-danger">@{{ attribute_cate.name || 'empty' }}</strong>
                                                                        </span>
                                                                    </td>
                                                                    <td style="white-space: nowrap">
                                                                        <!-- form -->
                                                                        <form editable-form name="rowform" onbeforesave="SaveAttributeCategory($data, attribute.id)" ng-show="rowform.$visible" class="form-buttons form-inline" shown="attribute_cate.attributes == attribute">
                                                                          <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary btn-sm">
                                                                            <i class="fa fa-check"></i>
                                                                          </button>
                                                                          <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default btn-sm">
                                                                            <i class="fa fa-times"></i>
                                                                          </button>
                                                                        </form>
                                                                        <div class="buttons" ng-show="!rowform.$visible">
                                                                          <button class="btn btn-primary btn-sm" ng-click="rowform.$show()"><i class="fa fa-pencil"></i></button>
                                                                          <button class="btn btn-danger btn-sm" ng-really-message="If you remove this attribute category then attributes of this category will remove ? Are you sure ? " ng-really-click="RemoveAttributeCategory($index,attribute_cate.id)"><i class="fa fa-times"></i></button>
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