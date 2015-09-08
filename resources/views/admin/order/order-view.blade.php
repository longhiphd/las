@extends('layouts.admin')
@section('breadcrumb')
   <li>
      <i class="fa fa-home"></i>
      <a href="{{url('/admin/dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
   </li>
   <li>
   <a href="{{url('admin/ecommerce/orders')}}">eCommerce Order View</a>
   <i class="fa fa-angle-right"></i>
   </li>
@stop
@section('content')
<div class="row">
	<div class="col-md-6">
        <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-shopping-cart font-red-sunglo"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Order #{{$order->id}}</span>
					<span class="caption-helper">view</span>
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
                        <div class="col-md-6">
                            <p><strong>Order #:</strong></p>
                            <p><strong>Order Datetime:</strong></p>
                            <p><strong>Order Status:</strong></p>
                            <p><strong>Order Method:</strong></p>
                            <p><strong>Order Note:</strong></p>
                            <p><strong>Order Total:</strong></p>

                        </div>
                        <div class="col-md-6">
                            <p><strong>{{$order->id}}</strong></p>
                            <p><strong>{{$order->created_at}}</strong></p>
                            <p><strong>{{$order->status}}</strong></p>
                            <p><strong>{{$order->order_method}}</strong></p>
                            <p><strong>{{$order->note}}</strong></p>
                            <p><strong>{{number_format($order->total)}} VNĐ</strong></p>
                        </div>
                    </div>
			</div>
		</div>
	</div>
    <div class="col-md-6">
        <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user font-red-sunglo"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Billing Address</span>
					<span class="caption-helper">view</span>
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
                        <div class="col-md-6">
                            <p><strong>First Name:</strong></p>
                            <p><strong>Last Name:</strong></p>
                            <p><strong>Email:</strong></p>
                            <p><strong>Phone Number:</strong></p>
                            <p><strong>Address:</strong></p>
                            <p><strong>City:</strong></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>{{$order->first_name}}</strong></p>
                            <p><strong>{{$order->last_name}}</strong></p>
                            <p><strong>{{$order->email}}</strong></p>
                            <p><strong>{{$order->phone}}</strong></p>
                            <p><strong>{{$order->address}}</strong></p>
                            <p><strong>{{$order->city}}</strong></p>
                        </div>
                    </div>
                </div>
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-suitcase font-red-sunglo"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Products</span>
					<span class="caption-helper">in this order</span>
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
				<table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Product slug</th>
                        <th>Product price</th>
                        <th>Quantity</th>
                        <th>Preview</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td width="10%"><img src="/uploads/images/ecommerce/{{$product['product_feature_image']}}" class="img-responsive" alt=""/></td>
                        <td>{{$product['product_name']}}</td>
                        <td>{{$product['product_slug']}}</td>
                        <td>{{$product['product_listed_price']}}</td>
                        <td>{{$product['product_quantity']}}</td>
                        <td width="5%"><button class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button></td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
			</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-6">
        <div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-suitcase font-red-sunglo"></i>
					<span class="caption-subject font-red-sunglo bold uppercase">Order Total</span>
					<span class="caption-helper"></span>
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
				    <div class="col-md-6">
				    @foreach($products as $product)
                        <p><strong>Product:</strong></p>
                        <p><strong>Price</strong></p>
                    @endforeach
				    </div>
				    <div class="col-md-6">
                        @foreach($products as $product)
                            <p class="text-right"><strong>{{$product['product_name']}} x {{$product['product_quantity']}}</strong></p>
                            <p class="text-right"><strong>{{$product['product_listed_price']}} x {{$product['product_quantity']}}</strong></p>
                        @endforeach
                        <hr/>
                        <h1 class="text-danger text-right"><strong>Total:</br>{{number_format($order->total)}} VNĐ</strong></h1>
				    </div>
				</div>

                </div>
			</div>
	</div>
</div>
@stop