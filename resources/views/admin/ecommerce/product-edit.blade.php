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
   <a href="{{url('admin/ecommerce/product/edit-product')}}">Edit Product</a>
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
										EDIT PRODUCT </span>
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
								<div class="portlet-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="active" >
												<a href="#tab_general" data-toggle="tab">
												Edit Product </a>
											</li>
											<li>
												<a href="#tab_edit_image" data-toggle="tab">
												Edit Image </a>
											</li>
                                            <li>
												<a href="#tab_attributes" data-toggle="tab">
												Edit Attributes </a>
											</li>
										</ul>
										<div class="tab-content no-space">
											<div class="tab-pane active" id="tab_general" style="background-color: #ecf0f1; padding-top: 20px;">
                                                <div class="col-md-12">
                                                        @if(Session::has('success_text'))
                                                        <div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Success!</strong> {{Session::get('success')}}
                                                        </div>
                                                        @endif
                                                        @if(Session::has('errors_text'))
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Success!</strong> {{Session::get('errors')}}
                                                        </div>
                                                        @endif
                                                </div>
                                                <form action="{{url('admin/ecommerce/product/edit-product-text')}}" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                           <div class="col-md-8">
                                                                <!-- BEGIN ALERTS PORTLET-->
                                                                <div class="portlet light" >
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-plus font-red-sunglo"></i>
                                                                            <span class="caption-subject font-red-sunglo bold uppercase">Product</span>
                                                                            <span class="caption-helper">change</span>
                                                                        </div>
                                                                        <div class="tools">
                                                                            <a href="javascript:;" class="collapse">
                                                                            </a>

                                                                            <a href="javascript:;" class="remove">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="portlet-body">
                                                                        <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Name</small></label>
                                                                            <input type="text" class="form-control input-sm" name="name" value="{{$product->name}}" id="name" required/>
                                                                        </div>
                                                                        {{--<div class="form-group">--}}
                                                                            {{--<label for=""><small>Slug</small></label>--}}
                                                                            {{--<input type="text" class="form-control input-sm" name="slug" id="slug" required/>--}}
                                                                        {{--</div>--}}
                                                                        <div class="form-group">
                                                                            <label for=""><small>Sku</small></label>
                                                                            <input type="text" class="form-control input-sm" name="sku" value="{{$product->sku}}" id="sku" value="#" required/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Price</small></label>
                                                                            <input type="text" class="form-control input-sm" value="{{$product->listed_price}}" name="listed_price" required/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Sale</small></label>
                                                                            <input type="text" class="form-control input-sm" value="{{$product->selling_price}}" name="selling_price" required/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Description</small></label>
                                                                            <textarea name="description" class="ckeditor" id="" cols="30" rows="10" required>{{$product->description}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Content</small></label>
                                                                            <textarea name="content" class="ckeditor" id="" cols="30" rows="10" required>{{$product->content}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet light">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-plus font-red-sunglo"></i>
                                                                            <span class="caption-subject font-red-sunglo bold uppercase">Seo</span>
                                                                            <span class="caption-helper">change</span>
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
                                                                            <label for=""><small>Meta title</small></label>
                                                                            <input type="text" class="form-control input-sm" value="{{$product->meta_title}}" name="meta_title" required/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for=""><small>Meta description</small></label>
                                                                            <input type="text" class="form-control input-sm" value="{{$product->meta_description}}" name="meta_description" required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                           </div>
                                                           <div class="col-md-4">
                                                                <!-- BEGIN ALERTS PORTLET-->
                                                                <div class="portlet light">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-plus font-red-sunglo"></i>
                                                                            <span class="caption-subject font-red-sunglo bold uppercase">Category</span>
                                                                            <span class="caption-helper">change</span>
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
                                                                                @foreach($categories as $category)
                                                                                @if($product->category_id == $category->id)
                                                                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                                                @else
                                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                                @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet light">
                                                                    <div class="portlet-title">
                                                                        <div class="caption">
                                                                            <i class="fa fa-plus font-red-sunglo"></i>
                                                                            <span class="caption-subject font-red-sunglo bold uppercase">InStock</span>
                                                                            <span class="caption-helper">change</span>
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
                                                                            <select name="in_stock" class="form-control input-sm" id="">
                                                                                @if($product->in_stock == 0)
                                                                                    <option selected value="0">Hết Hàng</option>
                                                                                    <option value="1">Còn Hàng</option>
                                                                                @endif
                                                                                @if($product->in_stock == 1)
                                                                                    <option selected value="1">Còn Hàng</option>
                                                                                    <option value="0">Hết Hàng</option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-sm btn-danger btn-block">Update</button>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </form>
											</div>
											<!-- Edit Post Image -->
											<div class="tab-pane" id="tab_edit_image">
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
                                                    <div class="col-md-12">
                                                        @if(Session::has('success_image'))
                                                        <div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Success!</strong> {{Session::get('success_image')}}
                                                        </div>
                                                        @endif
                                                        @if(Session::has('errors_image'))
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Success!</strong> {{Session::get('errors_image')}}
                                                        </div>
                                                        @endif
                                                     </div>
														    <div class="row">
														        <div class="col-md-3">
														        <strong class="text-success">Feature Image</strong>
														        <hr/>
														            <img src="/uploads/images/ecommerce/{{$product->feature_image}}" class="img-responsive" alt=""/>
														            <button data-toggle="modal" data-target="#editFeatureImage" class="btn btn-danger btn-sm"><i class=" fa fa-pencil"></i></button>
														            <a href="/uploads/images/ecommerce/{{$product->feature_image}}" target="_blank"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a>
                                                                    <div id="editFeatureImage" class="modal fade" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <form action="{{url('admin/ecommerce/product/edit-product-feature-image')}}" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Edit Feature Image</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <img src="/uploads/images/ecommerce/{{$product->feature_image}}" class="img-responsive" alt=""/>
                                                                                <input id="input-image" name="feature_image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
                                                                                <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-sm btn-primary">Save change</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
														        </div>
														    </div>
														    <hr/>
														    <strong class='text-success'>This Product Galeries</strong>
														    <hr/>
														    <div class="row">
														    @foreach($product->galeries as $galery)
														        <div class="col-md-3">
                                                                    <img src="/uploads/images/ecommerce/{{$galery->img}}"  class="img-responsive" alt=""/>
                                                                    <a href="" data-toggle="modal" data-target="#editGalery{{$galery->id}}"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                                                                    <div id="editGalery{{$galery->id}}" class="modal fade" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <form action="{{url('/admin/ecommerce/product/edit-product-galery')}}" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Edit Galeries</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <img src="/uploads/images/ecommerce/{{$galery->img}}" class="img-responsive" alt=""/>
                                                                                <hr/>
                                                                                <input type="hidden" name="galery_id" value="{{$galery->id}}"/>
                                                                                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                                                <input id="input-4" name="galery" type="file" class="file" data-show-upload="false" data-preview-file-type="text" required>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-sm btn-primary">Save change</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                    <a href="" data-toggle="modal" data-target="#deleteGalery{{$galery->id}}"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></a>
                                                                     <div id="deleteGalery{{$galery->id}}" class="modal fade" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <form action="{{url('/admin/ecommerce/product/delete-product-galery')}}" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Delete this galery</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                <img src="/uploads/images/ecommerce/{{$galery->img}}" class="img-responsive" alt=""/>
                                                                                <hr/>
                                                                                <input type="hidden" name="galery_id" value="{{$galery->id}}"/>
                                                                                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
                                                                    <a href="/uploads/images/ecommerce/{{$galery->img}}" target="_blank"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button></a>
														        </div>
														    @endforeach
														    </div>
														    <hr/>
                                                            <a href="" data-toggle="modal" data-target="#CreateGalery"><button type="button" class="btn green-haze btn-circle" ><i class="fa fa-plus"></i> Create</button></a>
                                                                    <div id="CreateGalery" class="modal fade" role="dialog">
                                                                      <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <form action="{{url('/admin/ecommerce/product/create-product-galery')}}" method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title">Create new galery in this product</h4>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                    <input id="input-4" name="galery[]" multiple="true" type="file" class="file" data-show-upload="false" data-preview-file-type="text" required>
                                                                                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                                              </div>
                                                                              <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-sm btn-danger">Create</button>
                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                              </div>
                                                                            </div>
                                                                        </form>
                                                                      </div>
                                                                    </div>
													</div>
												</div>
											</div>
                                            <div class="tab-pane" id="tab_attributes">
                                                <div class="portlet box green">
													<div class="portlet-title">
														<div class="caption">
															<i class="fa fa-tags"></i>Edit Attributes
														</div>
														<div class="tools">
															<a href="javascript:;" class="collapse">
															</a>
															<a href="#portlet-config" data-toggle="modal" class="config">
															</a>
														</div>
													</div>
													<div class="portlet-body">
                                                        <div class="col-md-12">
                                                                @if(Session::has('success_attribute'))
                                                                <div class="alert alert-success alert-dismissable">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                    <strong>Success!</strong> {{Session::get('success_attribute')}}
                                                                </div>
                                                                @endif
                                                                @if(Session::has('errors_attribute'))
                                                                <div class="alert alert-danger alert-dismissable">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                    <strong>Error!</strong> {{Session::get('errors_attribute')}}
                                                                </div>
                                                                @endif
                                                                @if(Session::has('unique'))
                                                                <div class="alert alert-danger alert-dismissable">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                                    <strong>Error!</strong> {{Session::get('unique')}}
                                                                </div>
                                                                @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <strong class="text-success">This product attributes:</strong>
                                                            <hr/>
                                                                 @foreach($product->attributes as $attribute)
                                                                     <a href="/admin/ecommerce/product/delete-attribute/{{$product->id}}/{{$attribute->id}}"><li>{{$attribute->name}} <span><i class="fa fa-times"></i></span></li></a>
                                                                 @endforeach
                                                            </div>
                                                            <div class="col-md-12">
                                                            <hr/>
                                                                <strong class="text-success">All attributes:</strong>
                                                                <hr/>
                                                                <form action="/admin/ecommerce/product/add-attribute" method="POST" >
                                                                 @foreach($attributes_cate as $attribute_cate)
                                                                     <strong class="text-danger">{{$attribute_cate->name}}</strong>
                                                                     @foreach($attribute_cate->attributes as $attribute)
                                                                        <label class="checkbox-inline input-sm"><input type="checkbox" name="attributes[]" value="{{$attribute->id}}">{{$attribute->name}}</label>
                                                                     @endforeach
                                                                     <hr/>
                                                                 @endforeach
                                                                 <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                                 <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add</button>
                                                                 </form>
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
				</div>
@stop
@section('script')
<script type="text/javascript" src="/admin/assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js"></script>
<script src="{{url('/admin/assets/js/jquery.slugify.js')}}"></script>
<script src="{{url('/admin/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{url('admin/assets/js/fileinput.min.js')}}"></script>
<script src="{{url('admin/assets/admin/pages/scripts/portfolio.js')}}"></script>
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
	    $( "#name" ).keyup();
	</script>
	<script>
	    Portfolio.init();
	</script>
@stop
