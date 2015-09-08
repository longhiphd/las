<!DOCTYPE html>

<html lang="en" ng-app="main">
<head>
<meta charset="utf-8"/>
<title>ShopOnline | Feature</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="{{url('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('admin/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{url('admin/assets/admin/pages/css/tasks.css')}}" rel="stylesheet" type="text/css"/>

<!-- BEGIN THEME STYLES -->
<link href="{{url('admin/assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{url('admin/assets/global/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{url('admin/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{url('admin/assets/admin/layout2/css/layout.css')}}" rel="stylesheet" type="text/css"/>
<link id="style_color" href="{{url('admin/assets/admin/layout2/css/themes/default.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{url('admin/assets/admin/layout2/css/custom.css')}}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{url('admin/angular-js/css/xeditable.css')}}"/>
<link rel="stylesheet" href="{{url('admin/angular-js/css/colorpicker.min.css')}}"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="{{url('admin/assets/preload/css/normalize.css')}}">
<link rel="stylesheet" href="{{url('admin/assets/preload/css/main.css')}}">
<script src="{{url('admin/assets/preload/js/vendor/modernizr-2.6.2.min.js')}}"></script>
<!-- END THEME STYLES -->
@yield('css')
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-container-bg-solid page-sidebar-closed-hide-logo page-header-fixed-mobile page-footer-fixed1">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
            <img src="{{url('admin/assets/admin/layout2/img/logo-default.png')}}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->

                <div id="loader-wrapper">
        			<div id="loader"></div>

        			<div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>

        		</div>

        <div class="page-actions">
            <div class="btn-group hide">
                <button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-user"></i> New User </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-basket"></i> New order </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i>&nbsp;<span class="hidden-sm hidden-xs">Create&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{url('admin/post')}}">
                        <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="{{url('admin/ecommerce/product')}}">
                        <i class="fa fa-briefcase"></i> New Product </a>
                    </li>
                    <li>
                        <a href="{{url('admin/user')}}">
                        <i class="fa fa-user"></i> New User </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    @if (Auth::check())

                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                        <span class="username username-hide-on-mobile">
                        {{ Auth::user()->name }}</span>
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="#">
                                <i class="icon-user"></i> My Profile </a>
                            <li>
                                <a href="{{{url('logout')}}}">
                                <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="start ">
                    <a href="{{{url('/admin/dashboard')}}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Blog</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/post/all-post')}}}">
                            <i class="fa fa-bars"></i>
                            All Post</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/post')}}}">
                            <i class="fa fa-plus"></i>
                            Add new</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/post/trash')}}}">
                            <i class="fa fa-trash"></i>
                            Trash</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">eCommerce</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/ecommerce/orders')}}}">
                            <i class="icon-basket"></i>
                            Orders</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/product')}}}">
                            <i class="fa fa-plus"></i>
                            Add Products</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/all-product')}}}">
                            <i class="icon-handbag"></i>
                            All Products</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/categories')}}}">
                            <i class="fa fa-bars"></i>
                            Categories</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/categories-custom')}}}">
                            <i class="fa fa-bars"></i>
                            Categories Custom</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/groups')}}}">
                            <i class="fa fa-list-alt"></i>
                            Group Product</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/ecommerce/attributes')}}}">
                            <i class="fa fa-ship"></i>
                            Attributes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-phone"></i>
                    <span class="title">Contacts</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/contacts/contact')}}}">
                            <i class="fa fa-phone"></i>
                            Contact</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/contacts/advisory')}}}">
                            <i class="fa fa-phone-square"></i>
                            Advisory</a>
                        </li>
                    </ul>
                </li>
                @if(Session::has('isAdmin'))
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Users</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/user')}}}">
                            <i class="fa fa-users"></i>
                            All users</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/user/trash')}}}">
                            <i class="fa fa-trash"></i>
                            Trash</a>
                        </li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-gear"></i>
                    <span class="title">Settings</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/setting/theme-options')}}}">
                            <i class="fa fa-desktop"></i>
                            Theme Options</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/setting/editor')}}}">
                            <i class="fa fa-desktop"></i>
                            Editor </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="fa fa-comment"></i>
                    <span class="title">Comment</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{{url('admin/manage/comments')}}}">
                            <i class="fa fa-comment"></i>
                            All Comment</a>
                        </li>
                        <li>
                            <a href="{{{url('admin/manage/rates')}}}">
                            <i class="fa fa-star"></i>
                            All Product Rate</a>
                        </li>
                    </ul>
                </li>
                
                <!--<li>
                    <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">Login Options</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="login.html">
                            Login Form 1</a>
                        </li>
                        <li>
                            <a href="login_2.html">
                            Login Form 2</a>
                        </li>
                        <li>
                            <a href="login_3.html">
                            Login Form 3</a>
                        </li>
                        <li>
                            <a href="login_soft.html">
                            Login Form 4</a>
                        </li>
                        <li>
                            <a href="extra_lock.html">
                            Lock Screen 1</a>
                        </li>
                        <li>
                            <a href="extra_lock2.html">
                            Lock Screen 2</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-envelope-open"></i>
                    <span class="title">Email Templates</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="email_template1.html">
                            New Email Template 1</a>
                        </li>
                        <li>
                            <a href="email_template2.html">
                            New Email Template 2</a>
                        </li>
                        <li>
                            <a href="email_template3.html">
                            New Email Template 3</a>
                        </li>
                        <li>
                            <a href="email_template4.html">
                            New Email Template 4</a>
                        </li>
                        <li>
                            <a href="email_newsletter.html">
                            Old Email Template 1</a>
                        </li>
                        <li>
                            <a href="email_system.html">
                            Old Email Template 2</a>
                        </li>
                    </ul>
                </li>
                <li class="last ">
                    <a href="javascript:;">
                    <i class="icon-pointer"></i>
                    <span class="title">Maps</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="maps_google.html">
                            Google Maps</a>
                        </li>
                        <li>
                            <a href="maps_vector.html">
                            Vector Maps</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                             Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN STYLE CUSTOMIZER -->
            <!-- END STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE HEADER-->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    @yield('breadcrumb')
                </ul>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!--Cooming Soon...-->
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
         2014 &copy; Metronic by keenthemes.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
{{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
<script src="{{url('admin/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('/angular-js/angular.min.js')}}"></script>
<script src="{{url('/angular-js/dirPagination.js')}}"></script>
<script src="{{url('/angular-js/xeditable.min.js')}}"></script>
<script src="{{url('/angular-js/app.js')}}"></script>


<script src="{{url('admin/assets/preload/js/main.js')}}"></script>
<script src="{{url('admin/assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{url('admin/assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{url('admin/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/admin/layout2/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{url('admin/assets/admin/layout2/scripts/demo.js')}}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
@yield('script')



<script>
      jQuery(document).ready(function() {    
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
      });
</script>

</body>
<!-- END BODY -->
</html>