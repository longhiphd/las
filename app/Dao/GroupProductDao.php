<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/6/2015
 * Time: 2:49 PM
 */

namespace App\Dao;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Input;
use Intervention\Image\Facades\Image;
use App\Models\GroupProduct;
use Illuminate\Support\Facades\Session;


class GroupProductDao {

    public static function getGroupProduct(){
        $groups = Group::all();
        $count = Group::count();
        return view('admin.ecommerce.product-group',[
            'groups'=>$groups,
            'count'=>$count
        ]);
    }
    public static function postAddGroupProduct(){
        $image = Input::file('feature_image');
        $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
        Image::make(Input::file('feature_image'))->save('uploads/images/ecommerce/'.$filename);
        $group = new Group;
        $group->name = Input::get('name');
        $group->slug = Input::get('slug');
        $group->img = $filename;
        $group->meta_title = Input::get('meta_title');
        $group->meta_description = Input::get('meta_description');
        $group->created_by = Auth::user()->id;
        $group->updated_by = Auth::user()->id;
        DB::beginTransaction();
        try {
            $group->save();
            DB::commit();
            Session::flash('success','The group was created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors','The group can not create!');
            return redirect('admin/ecommerce/groups');
        }
        return redirect('admin/ecommerce/groups');
    }
    public static  function postEditGroupProduct(){
        if(Input::file('feature_image_edit')==null){
            $group = Group::find(Input::get('group_id'));
            $group->name = Input::get('name');
            $group->slug = Input::get('slug');
            $group->meta_title = Input::get('meta_title');
            $group->meta_description = Input::get('meta_description');
            $group->created_by = Auth::user()->id;
            $group->updated_by = Auth::user()->id;
            DB::beginTransaction();
            try {
                $group->save();
                DB::commit();
                Session::flash('success','The group was edited successfully!');
                return redirect('admin/ecommerce/groups');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors','The group can not edited!');
                return redirect('admin/ecommerce/groups');
            }
        }
        else{
            $image = Input::file('feature_image_edit');
            $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
            Image::make(Input::file('feature_image_edit'))->save('uploads/images/ecommerce/'.$filename);
            $group = Group::find(Input::get('group_id'));
            $group->name = Input::get('name');
            $group->slug = Input::get('slug');
            $group->img = $filename;
            $group->meta_title = Input::get('meta_title');
            $group->meta_description = Input::get('meta_description');
            $group->created_by = Auth::user()->id;
            $group->updated_by = Auth::user()->id;
            DB::beginTransaction();
            try {
                $group->save();
                DB::commit();
                Session::flash('success','The group was edited successfully!');
                return redirect('admin/ecommerce/groups');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors','The group can not edited!');
                return redirect('admin/ecommerce/groups');
            }
        }
    }

    public static function postDeleteGroupProduct(){
        $group = Group::find(Input::get('group_id'));
        $group->delete();
        $group_products = GroupProduct::where('group_id','=',Input::get('group_id'))->get();
        foreach($group_products as $group_product){
            $group_product->delete();
        }
        Session::flash('success','The group was edited successfully!');
        return redirect('admin/ecommerce/groups');
    }

    //GROUP PRODUCT
    public static function getGroupProductManager ($id){
        $products = Product::orderBy('id','desc')->get();
        $count_product = GroupProduct::where('group_id','=',$id)->count();
        $group = Group::find($id);
        return view('admin.ecommerce.group-product-manager',[
            'group'=>$group,
            'products'=>$products,
            'count_product'=>$count_product
        ]);
    }
    public static function postInsertProductIntoGroup(){
        $products = Input::get('product_id');
        if(is_array($products)){
            foreach($products as $product){
                $group_product = new GroupProduct;
                $group_product->group_id = Input::get('group_id');
                $group_product->product_id = $product;
                DB::beginTransaction();
                try {
                    $group_product->save();
                    DB::commit();
                    Session::flash('success','The group was edited successfully!');
                    return redirect('admin/ecommerce/groups/'.Input::get('group_id'));
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('errors','The group can not edited!');
                    return redirect('admin/ecommerce/groups/'.Input::get('group_id'));
                }

            }
        }
    }
    public static function postDeleteProductInGroup(){
        $products = Input::get('product_id');
        if(is_array($products)){
            foreach($products as $product){
                $group_product = GroupProduct::where('group_id','=',Input::get('group_id'))->where('product_id','=',$product);
                $group_product->delete();
            }
        }
        Session::flash('success','The group was edited successfully!');
        return redirect('admin/ecommerce/groups/'.Input::get('group_id'));
    }


} 