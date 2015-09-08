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
   <a href="{{url('admin/setting/theme-options')}}">Settings</a>
   <i class="fa fa-angle-right"></i>
   </li>
    <li>
   <a href="{{url('admin/setting/theme-options')}}">Theme Options</a>
   </li>
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
		    <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-desktop font-red-sunglo"></i>
                        <span class="caption-subject font-red-sunglo bold uppercase">Theme Options</span>
                        <span class="caption-helper">setting</span>
                    </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                    </div>
                </div>
                    <div class="portlet-body">
								<div class="tabbable-line">
									<ul class="nav nav-tabs ">
										<li class="active">
											<a href="#tab_general" data-toggle="tab">
											General </a>
										</li>
										<li>
											<a href="#tab_slides" data-toggle="tab">
											Slides </a>
										</li>
										<li>
											<a href="#tab_scripts" data-toggle="tab">
											Scripts </a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tab_general">
                                            <div class="row">
                                                 @if(Session::has('success_theme_options'))
                                                     <div class="alert alert-success alert-dismissable">
                                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                        <strong>Success!</strong> {{Session::get('success_theme_options')}}
                                                     </div>
                                                 @endif
                                                     @if(Session::has('errors_theme_options'))
                                                        <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Fails!</strong> {{Session::get('errors_theme_options')}}
                                                        </div>
                                                 @endif
                                            </div>
                                            <button data-toggle="modal" data-target="#EditLogo" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Change logo</button>
                                                    <div id="EditLogo" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <form action="{{url('admin/setting/update/theme-options/logo')}}" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Edit logo</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text">
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger btn-sm">Save chang</button>
                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                        </form>
                                                      </div>
                                                    </div>
											<div class="row">
											<form action="{{url('admin/setting/update/theme-options/general-text')}}" method="POST">
											    <div class="col-md-6">
											        <p class="text-danger"><strong>Logo:</strong></p>
                                                    <img src="/uploads/images/theme_options/{{$option->logo}}" class="img-responsive" alt=""/>
                                                    <div style="height: 10px;"></div>

                                                    <hr/>
                                                     <strong>Website:</strong>
                                                    <input type="text" class="form-control input-sm" name="website" value="{{$option->website}}"/>
                                                    <hr/>
                                                    <strong>Email:</strong>
                                                    <input type="text" class="form-control input-sm" name="email" value="{{$option->email}}"/>
                                                    <hr/>
                                                    <strong>Hotline:</strong>
                                                    <input type="text" class="form-control input-sm" name="hotline" value="{{$option->hotline}}"/>
                                                     <hr/>
                                                    <strong>Showroom:</strong>
                                                    <textarea name="showroom" id="" class="form-control"  cols="30" rows="10">{{$option->showroom}}</textarea>

											    </div>
                                                <div class="col-md-6">
											        <p class="text-danger"><strong>Social</strong></p>
											        <hr/>
											        <i class="fa fa-facebook-official fa-3x"></i>
											        <i class="fa fa-twitter-square fa-3x"></i>
											        <i class="fa fa-google-plus-square fa-3x"></i>
											        <i class="fa fa-pinterest-square fa-3x"></i>
											        <hr/>
                                                    <strong>Facebook:</strong>
                                                    <input type="text" class="form-control input-sm" name="social_fb" value="{{$option->social_fb}}"/>
                                                    <hr/>
                                                    <strong>Twitter:</strong>
                                                    <input type="text" class="form-control input-sm" name="social_twitter" value="{{$option->social_twitter}}"/>
                                                    <hr/>
                                                    <strong>Google+:</strong>
                                                    <input type="text" class="form-control input-sm" name="social_google_plus" value="{{$option->social_google_plus}}"/>
                                                    <hr/>
                                                    <strong>Pinterest:</strong>
                                                    <input type="text" class="form-control input-sm" name="social_pinterest" value="{{$option->social_pinterest}}"/>
                                                    <hr/>
                                                    <button class="btn btn-block btn-sm btn-danger">Update</button>
											    </div>
											</form>
											</div>
										</div>
										<div class="tab-pane" id="tab_slides">
                                            <div class="row">
                                                 @if(Session::has('success_slide'))
                                                     <div class="alert alert-success alert-dismissable">
                                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                        <strong>Success!</strong> {{Session::get('success_slide')}}
                                                     </div>
                                                 @endif
                                                     @if(Session::has('errors_slide'))
                                                        <div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <strong>Fails!</strong> {{Session::get('errors_slide')}}
                                                        </div>
                                                 @endif
                                            </div>
                                            <div class="row">
                                                @foreach($slides as $slide)
                                                <div class="col-md-6">
                                                    <img src="/uploads/images/theme_options/{{$slide->img}}" class="img-responsive" alt=""/>
                                                    <a href="" data-toggle="modal" data-target="#ModalCreateSlide{{$slide->id}}"><button  class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                                                    <div id="ModalCreateSlide{{$slide->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                        <form action="{{url('admin/setting/slide/edit-slide')}}" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Edit Slide</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                    <label for=""><small>Name:</small></label>
                                                                    <input type="text" class="form-control input-sm" value="{{$slide->name}}" name="name" required/>
                                                                    </div>
                                                                <div class="form-group">
                                                                    <label for=""><small>Caption:</small></label>
                                                                    <input type="text" class="form-control input-sm" value="{{$slide->caption}}" name="caption" required/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""><small>Link:</small></label>
                                                                    <input type="text" class="form-control input-sm" value="{{$slide->link}}" name="link" required/>
                                                                </div>
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="collapse" data-target="#image{{$slide->id}}">Change image?</button>
                                                                <div id="image{{$slide->id}}" class="collapse">
                                                                    <div class="form-group">
                                                                         <label for=""><small>Image:</small></label>
                                                                          <input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" value="{{$slide->id}}" name="slide_id"/>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger btn-sm">Save Change</button>
                                                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                         </form>
                                                    </div>
                                                </div>
                                                <button data-toggle="modal" data-target="#ModalDeleteSlide{{$slide->id}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                                    <div id="ModalDeleteSlide{{$slide->id}}" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <form action="{{url('admin/setting/slide/delete-slide')}}" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Delete Slide</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Do you want delete: {{$slide->name}} ?</p>
                                                                        <input type="hidden" value="{{$slide->id}}" name="slide_id"/>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-success"><i class="fa fa-eye"></i></button>
                                                    <p><strong>{{$slide->name}}</strong></p>
                                                    <p><strong>{{$slide->caption}}</strong></p>
                                                    <p><strong>{{$slide->link}}</strong></p>
                                                </div>
                                                @endforeach

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="clearfix">
                                                        <a href="" data-target="#ModalCreateSlide" data-toggle="modal"><button class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Add new</button></a>
                                                    </div>
                                                </div>
                                                <div id="ModalCreateSlide" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                    <form action="{{url('admin/setting/slide/create-slide')}}" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Create Slide</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for=""><small>Name:</small></label>
                                                                    <input type="text" class="form-control input-sm" name="name" required/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""><small>Caption:</small></label>
                                                                    <input type="text" class="form-control input-sm" name="caption" required/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""><small>Link:</small></label>
                                                                    <input type="text" class="form-control input-sm" name="link" required/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""><small>Image:</small></label>
                                                                    <input id="input-image" name="image" type="file" class="file" data-show-upload="false" data-show-filename="false" data-preview-file-type="text" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger btn-sm">Create</button>
                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="tab-pane" id="tab_scripts">
										<div class="row">
                                            @if(Session::has('success_script'))
                                                <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                     <strong>Success!</strong> {{Session::get('success_script')}}
                                                </div>
                                            @endif
                                            @if(Session::has('errors_script'))
                                                <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                    <strong>Fails!</strong> {{Session::get('errors_script')}}
                                                </div>
                                           @endif
										</div>
										<p class="text-danger"><strong>Scripts</strong></p>
                                            @foreach($scripts as $script)
                                                    <form action="/admin/setting/scripts/update-script/{{$script->id}}" method="POST">
                                                    <div class="form-group">
                                                        <label for=""><small>Script</small></label>
                                                        <textarea name="script" id="" class="form-control"  cols="30" rows="10">{{$script->script}}</textarea>
                                                    </div>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i> Update</button>
                                                    </form>
                                            @endforeach
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