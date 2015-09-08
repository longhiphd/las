<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/4/2015
 * Time: 10:36 PM
 */

namespace App\Dao;
use App\Models\Product;
use Input;

use App\Models\Order;

class OrderDao {
    public static function getOrder(){
        return view('admin.order.order');
    }
    //api
    public static function getApiAllOrder(){
        $orders = Order::orderBy('id','desc')->get();
        return response()->json($orders);
    }
    public static function postSaveOrder(){
        $order = Order::find(Input::get('id'));
        $order->status = Input::get('status');
        $order->save();

    }
    public static function getOrderView($id){
        $order = Order::find($id);
        foreach($order->order_items as $order_item){
            $product = Product::where('id','=',$order_item->product_id)->first();
            $products[]= array(
                'product_name'=>$product->name,
                'product_slug'=>$product->slug,
                'product_quantity'=>$order_item->quantity,
                'product_listed_price'=>$product->listed_price,
                'product_feature_image'=>$product->feature_image
            );
        }
        return view('admin.order.order-view',[
            'order'=>$order,
            'products'=>$products
        ]);
    }

} 