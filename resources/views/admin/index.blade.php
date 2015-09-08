@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Dashboard</a>
   </li>
@stop
@section('content')
<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-suitcase"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{$product_count}}
							</div>
							<div class="desc">
								 Sản phẩm
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{number_format($product_sum_price)}} đ
							</div>
							<div class="desc">
								 Tổng giá trị sản phẩm
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{$order_count}}
							</div>
							<div class="desc">
								  Số lượng đơn hàng
							</div>
						</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{number_format($order_sum_1)}} đ
							</div>
							<div class="desc">
								 Giá trị đơn hàng chưa xử lý
							</div>
						</div>
						</a>
					</div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light red-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{number_format($order_sum_2)}} đ
							</div>
							<div class="desc">
								 Giá trị đơn hàng đang xử lý
							</div>
						</div>
						</a>
					</div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								{{number_format($order_sum_3)}} đ
							</div>
							<div class="desc">
								 Giá trị đơn hàng đã xử lý
							</div>
						</div>
						</a>
					</div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								3
							</div>
							<div class="desc">
								 Yêu cầu tư vấn
							</div>
						</div>
						</a>
					</div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a class="dashboard-stat dashboard-stat-light purple-soft" href="javascript:;">
						<div class="visual">
							<i class="fa fa-money"></i>
						</div>
						<div class="details">
							<div class="number">
								4
							</div>
							<div class="desc">
								 Contact
							</div>
						</div>
						</a>
					</div>
				</div>

@stop