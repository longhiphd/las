<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 7/31/2015
 * Time: 1:46 PM
 */

namespace App\Dao;


use App\Models\AttCategory;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryCustom;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductDao {
    public static function getProductCategories(){
        $categories = Category::all();
        $categories_father = Category::where('father_id','=',null)->get();
        return view('admin.ecommerce.product-categories',[
            'categories'=>$categories,
            'categories_father'=>$categories_father
        ]);
    }
    public static function getProductAttributes(){
        return view('admin.ecommerce.product-attributes',[

        ]);
    }
    public static function getProduct(){
        $categories = Category::all();
        $attributes_cate = AttCategory::all();
        return view('admin.ecommerce.product',[
            'categories'=>$categories,
            'attributes_cate'=>$attributes_cate,
        ]);
    }
    public static function postAddProduct(){

            $image = Input::file('feature_image');
            $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
            Image::make(Input::file('feature_image'))->save('uploads/images/ecommerce/'.$filename);
            $product = new Product;
            $product->name = Input::get('name');
            $product->slug = Str::slug(Input::get('name'));
            $product->sku = Input::get('sku');
            $product->listed_price = Input::get('listed_price');
            $product->selling_price = Input::get('selling_price');
            $product->description = Input::get('description');
            $product->content = Input::get('content');
            $product->meta_title = Input::get('meta_title');
            $product->meta_description = Input::get('meta_description');
            $product->category_id = Input::get('category_id');
            $product->feature_image = $filename;
            $product->created_by = Auth::user()->id;
            $product->updated_by = Auth::user()->id;
            DB::beginTransaction();
            try {
                $product->save();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['msg'=>'The product can not create']);
            }
            $attrubutes = Input::get('attributes');
            if(is_array($attrubutes)){
                foreach($attrubutes as $attrubute){
                    $product_attribute = new ProductAttribute;
                    $product_attribute->product_id = $product->id;
                    $product_attribute->att_id = $attrubute;
                    DB::beginTransaction();
                    try {
                        $product_attribute->save();
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollback();
                        return response()->json(['msg'=>'The attribute  can not create']);
                    }
                }
            }
            $files = Input::file('galery');
            foreach ($files as $file) {
                    $filename = $file->getClientOriginalName();
                    Image::make($file)->save('uploads/images/ecommerce/'.$filename);
                        $product_galery = new ProductGalery;
                        $product_galery->product_id = $product->id;
                        $product_galery->img = $filename;
                        $product_galery->created_by = Auth::user()->id;
                        $product_galery->updated_by = Auth::user()->id;
                        DB::beginTransaction();
                        try {
                            $product_galery->save();
                            DB::commit();
                        } catch (\Exception $e) {
                            DB::rollback();
                            return response()->json(['msg'=>'The galery category can not create']);
                        }
                    }
            Session::flash('success','The product was created successfully!');
            return redirect('admin/ecommerce/product');


    }
    public static function getAllProduct(){
        return view('admin.ecommerce.product-all');
    }
    public static function getDeleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        $order_items = OrderItems::where('product_id','=',$id)->get();
        foreach($order_items as $order_item){
            $order_item->delete();
            Order::where('id','=',$order_item->order_id)->delete();
        }
        return response()->json(['msg'=>'The product was deleted successfully']);
    }
    public static function getEditProduct($id){
        $categories = Category::all();
        $attributes_cate = AttCategory::all();
        $product = Product::find($id);
        return view('admin.ecommerce.product-edit',[
            'product'=>$product,
            'categories'=>$categories,
            'attributes_cate'=>$attributes_cate,
        ]);
    }
    public static function postEditProductText(){
        $product = Product::find(Input::get('product_id'));
        $product->name = Input::get('name');
        $product->slug = Str::slug(Input::get('name'));
        $product->sku = Input::get('sku');
        $product->listed_price = Input::get('listed_price');
        $product->selling_price = Input::get('selling_price');
        $product->description = Input::get('description');
        $product->content = Input::get('content');
        $product->meta_title = Input::get('meta_title');
        $product->in_stock = Input::get('in_stock');
        $product->meta_description = Input::get('meta_description');
        $product->category_id = Input::get('category_id');
        $product->created_by = Auth::user()->id;
        $product->updated_by = Auth::user()->id;
        DB::beginTransaction();
        try {
            $product->save();
            DB::commit();
            Session::flash('success_text','The product was edited successfully');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id'));
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_text','The product can not edit!');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id'));
        }
    }
    public static function postEditProductFeatureImage(){
        $image = Input::file('feature_image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        Image::make(Input::file('feature_image'))->save('uploads/images/ecommerce/'.$filename);
        $product = Product::find(Input::get('product_id'));
        $product->feature_image =$filename;
        DB::beginTransaction();
        try {
            $product->save();
            DB::commit();
            Session::flash('success_image','The product feature image was edited successfully');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id').'#tab_edit_image');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_image','The product feature image can not edit!');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id').'#tab_edit_image');
        }
    }
    public static function postEditProductGalery(){
        $image = Input::file('galery');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        Image::make(Input::file('galery'))->save('uploads/images/ecommerce/'.$filename);
        $galery = ProductGalery::find(Input::get('galery_id'));
        $galery->img = $filename;
        DB::beginTransaction();
        try {
            $galery->save();
            DB::commit();
            Session::flash('success_image','The product galery was edited successfully');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id').'#tab_edit_image');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_image','The product galery can not edit!');
            return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id').'#tab_edit_image');
        }
    }
    public static function postDeleteProductGalery(){
        ProductGalery::find(Input::get('galery_id'))->delete();
        Session::flash('success_image','The product galery was deleted successfully');
        return redirect('admin/ecommerce/product/edit-product/'.Input::get('product_id').'#tab_edit_image');
    }
    public static function postCreateProductGalery(){
        $product_id = Input::get('product_id');
        $files = Input::file('galery');
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            Image::make($file)->save('uploads/images/ecommerce/'.$filename);
            $product_galery = new ProductGalery;
            $product_galery->product_id = $product_id;
            $product_galery->img = $filename;
            $product_galery->created_by = Auth::user()->id;
            $product_galery->updated_by = Auth::user()->id;
            DB::beginTransaction();
            try {
                $product_galery->save();
                DB::commit();
                Session::flash('success_image','The product galery was added successfully');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors_image','The product galery can not add!');
            }
        }
        return redirect('admin/ecommerce/product/edit-product/'.$product_id.'#tab_edit_image');
    }
    public static function getDeleteProductAttribute($product_id,$attribute_id){
        ProductAttribute::where('product_id','=',$product_id)->where('att_id','=',$attribute_id)->delete();
        Session::flash('success_attribute','The product attribute was delete successfully');
        return redirect('admin/ecommerce/product/edit-product/'.$product_id.'#tab_attributes');
    }
    public static function postAddProductAttribute(){
        $product_id = Input::get('product_id');
        $attrubutes = Input::get('attributes');
        if(is_array($attrubutes)){
            foreach($attrubutes as $attrubute){
                $product_attribute = new ProductAttribute;
                $product_attribute->product_id = $product_id;
                $product_attribute->att_id = $attrubute;
                DB::beginTransaction();
                try {
                    if(!ProductDao::checkProductAttribute($product_id,$attrubute)){
                        $product_attribute->save();
                        DB::commit();
                        Session::flash('success_attribute','The product attribute was added successfully');
                    }
                    else{
                        Session::flash('unique','The product attribute was has,please choose new attributes');
                    }
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('errors_attribute','The product attribute can not add');
                }
            }
        }
        return redirect('admin/ecommerce/product/edit-product/'.$product_id.'#tab_attributes');
    }
    //check unique product attribute
    public static function checkProductAttribute($product_id,$attribute){
        $check  = ProductAttribute::where('product_id','=',$product_id)->where('att_id','=',$attribute)->count();
        if($check == 0){
            return false;
        }
        else{
            return true;
        }
    }















    public static function postAddProductCategories(){
        if(Input::get('father_id') == 0){
        $image = Input::file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        Image::make(Input::file('image'))->save('uploads/images/ecommerce/'.$filename);
        $category = new Category;
        $category->name = Input::get('name');
        $category->slug = Str::slug(Input::get('name'));
        $category->module_id = 1; // ShopManager
        $category->description = Input::get('description');
        $category->img = $filename;
        $category->meta_title = Input::get('meta_title');
        $category->meta_description = Input::get('meta_description');
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->save();
            Session::flash('success','The category was created successfully');
            return redirect('admin/ecommerce/categories');
        }
        else{
            $image = Input::file('image');
            $filename = date('Y-m-d').$image->getClientOriginalName();
            Image::make(Input::file('image'))->save('uploads/images/ecommerce/'.$filename);
            $category = new Category;
            $category->name = Input::get('name');
            $category->slug = Str::slug(Input::get('name'));
            $category->module_id = 1; // ShopManager
            $category->description = Input::get('description');
            $category->father_id = Input::get('father_id');
            $category->img = $filename;
            $category->meta_title = Input::get('meta_title');
            $category->meta_description = Input::get('meta_description');
            $category->created_by = Auth::user()->id;
            $category->updated_by = Auth::user()->id;
            $category->save();
            Session::flash('success','The category was created successfully');
            return redirect('admin/ecommerce/categories');
        }
    }
    public static function postEditProductCategories(){
            if(Input::file('feature_image')== null){
            $category = Category::find(Input::get('category_id'));
            $category->name = Input::get('name');
            $category->slug = Str::slug(Input::get('name'));
            $category->module_id = 1; // ShopManager
            $category->description = Input::get('description');
            $category->father_id = Input::get('father_id');
            $category->meta_title = Input::get('meta_title');
            $category->meta_description = Input::get('meta_description');
            $category->created_by = Auth::user()->id;
            $category->updated_by = Auth::user()->id;
            $category->save();
            Session::flash('success','The category was edited successfully');
            return redirect('admin/ecommerce/categories');
            }
            else{
                $image = Input::file('feature_image');
                $filename = date('Y-m-d').$image->getClientOriginalName();
                Image::make(Input::file('feature_image'))->save('uploads/images/ecommerce/'.$filename);
                $category = Category::find(Input::get('category_id'));
                $category->name = Input::get('name');
                $category->slug = Str::slug(Input::get('name'));
                $category->module_id = 1; // ShopManager
                $category->description = Input::get('description');
                $category->father_id = Input::get('father_id');
                $category->img = $filename;
                $category->meta_title = Input::get('meta_title');
                $category->meta_description = Input::get('meta_description');
                $category->created_by = Auth::user()->id;
                $category->updated_by = Auth::user()->id;
                $category->save();
                Session::flash('success','The category was edited successfully');
                return redirect('admin/ecommerce/categories');
            }

    }
    public static function postDeleteProductCategories(){
        Category::find(Input::get('category_id'))->delete();
        Session::flash('success','The category was deleted successfully');
        return redirect('admin/ecommerce/categories');
    }
    public static function checkUniqueCategory($name){
        if(Category::where('name','=',$name)->count()>0){
            return false;
        }
        else{
            return true;
        }
    }

    //Attribute Category
    public static function postAddAttributeCategory(){
        $attribute_cate = new AttCategory;
        $attribute_cate->name = Input::get('name');
        $attribute_cate->created_by = Auth::user()->id;
        $attribute_cate->updated_by = Auth::user()->id;
        DB::beginTransaction();
        try {
            $attribute_cate->save();
            DB::commit();
            return response()->json(['msg'=>'The attribute category was created successfull!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'The attribute category can not create']);
        }
    }
    public static function getDeleteAttributeCategory($id){
        $attributes = Attribute::where('att_category_id','=',$id)->get();
        foreach($attributes as $attribute){
            $attribute->delete();
        }
        $attribute_cate = AttCategory::find($id);
        $attribute_cate->delete();
        if(AttCategory::where('id','=',$id)->count() > 0){
            return response()->json(['msg'=>'The attribute category can not delete!']);
        }
        else{
            return response()->json(['msg'=>'The attribute category was deleted successfully!']);
        }
    }
    //Attribute
    public static function postAddAttribute(){
        $attribute = new Attribute;
        $attribute->name = Input::get('name');
        $attribute->att_category_id = Input::get('att_category_id');
        $attribute->created_by = Auth::user()->id;
        $attribute->updated_by = Auth::user()->id;
        DB::beginTransaction();
        try {
            $attribute->save();
            DB::commit();
            return response()->json(['msg'=>'The attribute was created successfull!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'The attribute can not create']);
        }
    }
    public static function postUpdateAttribute(){
        $attribute = Attribute::find(Input::get('id'));
        $attribute->name = Input::get('attribute_name');
        $attribute->created_by = Auth::user()->id;
        $attribute->updated_by = Auth::user()->id;
        DB::beginTransaction();
        try {
            $attribute->save();
            DB::commit();
            return response()->json(['msg'=>'The attribute was updates successfull!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'The attribute can not update']);
        }

    }
    public static function getDeleteAttribute($id){
        $attribute = Attribute::find($id);
        $attribute->delete();
        if(Attribute::where('id','=',$id)->count() > 0){
            return response()->json(['msg'=>'The attribute can not delete!']);
        }
        else{
            return response()->json(['msg'=>'The attribute was deleted successfully!']);
        }
    }

    //**************************CATEGORIES CUSTOM *******************************
    public static function getCategoriesCustom(){
        $categories = CategoryCustom::orderBy('count','asc')->get();
        return view('admin.ecommerce.categories-custom',[
            'categories'=>$categories
        ]);
    }
    public static function postAddCategoriesCustom(){
        $check = CategoryCustom::where('count','=',Input::get('count'))->count();
        if($check > 0 ){
            Session::flash('errors','The count of category was has, please try a again!');
            return redirect('admin/ecommerce/categories-custom');
        }
        else{
            $image = Input::file('image');
            $filename = date('Y-m-d').$image->getClientOriginalName();
            Image::make(Input::file('image'))->save('uploads/images/ecommerce/'.$filename);
            $category = new CategoryCustom;
            $category->name = Input::get('name');
            $category->link = Input::get('link');
            $category->image = $filename;
            $category->count = Input::get('count');
            DB::beginTransaction();
            try {
                $category->save();
                DB::commit();
                Session::flash('success','The category was created successfully !');
                return redirect('admin/ecommerce/categories-custom');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors',$e);
                return redirect('admin/ecommerce/categories-custom');
            }
        }
    }
    public static function postDeleteCategoriesCustom(){
        $cateory = CategoryCustom::find(Input::get('category_id'));
        $cateory->delete();
        Session::flash('success','The category was deleted successfully !');
        return redirect('admin/ecommerce/categories-custom');
    }

    //Api
    public static function getApiProductAttributes(){
        $att_cate = AttCategory::with('attributes')->get();
        return response()->json($att_cate);
    }
    public static function getApiAllProduct(){
        $products = Product::get();
        foreach($products as $product){
            $category = Category::find($product->category_id);
                $data[] = array(
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'category'=>$category->name,
                    'slug'=>$product->slug,
                    'sku'=>$product->sku,
                    'feature_image'=>$product->feature_image,
                    'listed_price'=>$product->listed_price,
                    'selling_price'=>$product->selling_price,
                    'content'=>$product->content,
                    'meta_title'=>$product->meta_title,
                    'meta_description'=>$product->meta_description,
                    'in_stock'=>$product->in_stock,
                    'attributes_cate'=>$product->attributes,
                    'galeries'=>$product->galeries
                );
            }
            return response()->json($data);
    }
} 