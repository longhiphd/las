<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/7/2015
 * Time: 5:08 PM
 */

namespace App\Dao;


use App\Models\Product;
use Input;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartDao {

    public static function postAddToCart(){
        $quantity = Input::get('quantity');
        $product_id = Input::get('product_id');
        $product = Product::find($product_id);
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price'=>$product->listed_price,
            'options' => array('feature_image' => $product->feature_image),
            ));
        return response()->json(['msg'=>'Sản phẩm đã được thêm vào giỏ hàng',
                                 'success'=>1,
            'content'=>Cart::content()
        ]);
    }
    public static function getDeleteRow($rowId){
        Cart::remove($rowId);
        return response()->json(['msg'=>'Sản phẩm đã được xóa khỏi giỏ hàng',
            'success'=>1
        ]);
    }
    public static function postUpdateCart(){
        $rowId = Input::get('rowId');
        $quantity = Input::get('quantity');
        Cart::update($rowId, array('qty' => $quantity));
        return redirect('/#/gio-hang');
    }
    public static function postAddToCartCategory(){
        $quantity = Input::get('quantity');
        $product_id = Input::get('product_id');
        $product = Product::find($product_id);
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price'=>$product->listed_price,
            'options' => array('feature_image' => $product->feature_image),
        ));
        return redirect('/#/gio-hang');
    }
} 