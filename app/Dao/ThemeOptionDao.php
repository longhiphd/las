<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/11/2015
 * Time: 9:37 AM
 */

namespace App\Dao;
use App\Models\Script;
use App\Models\Slide;
use App\Models\ThemeOption;
use Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
class ThemeOptionDao {
    public static function getThemeOption(){
        $option = ThemeOption::find(1);
        $slides = Slide::all();
        $scripts = Script::all();
        return view('admin.setting.theme-options',[
            'option'=>$option,
            'slides'=>$slides,
            'scripts'=>$scripts
        ]);
    }
    public static function postUpdateThemeOptionGeneral(){
        $option = ThemeOption::find(1);
        $option->website = Input::get('website');
        $option->email = Input::get('email');
        $option->hotline = Input::get('hotline');
        $option->showroom = Input::get('showroom');
        $option->social_fb = Input::get('social_fb');
        $option->social_twitter = Input::get('social_twitter');
        $option->social_google_plus = Input::get('social_google_plus');
        $option->social_pinterest = Input::get('social_pinterest');
        DB::beginTransaction();
        try {
            $option->save();
            DB::commit();
            Session::flash('success_theme_options','Update successfully');
            return redirect('admin/setting/theme-options');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_theme_options','Can not update! Please try again');
            return redirect('admin/setting/theme-options');
        }
    }
    public static function postCreateSlide(){
        $image = Input::file('image');
        $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
        Image::make(Input::file('image'))->save('uploads/images/theme_options/'.$filename);
        $slide = new Slide;
        $slide->name = Input::get('name');
        $slide->caption = Input::get('caption');
        $slide->link = Input::get('link');
        $slide->img = $filename;
        DB::beginTransaction();
        try {
            $slide->save();
            DB::commit();
            Session::flash('success_slide','The slide was created successfully');
            return redirect('admin/setting/theme-options#tab_slides');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_slide','Can not create! Please try again');
            return redirect('admin/setting/theme-options#tab_slides');
        }
    }
    public static function postEditSlide(){
        if(Input::file('image') == null){
            $slide = Slide::find(Input::get('slide_id'));
            $slide->name = Input::get('name');
            $slide->caption = Input::get('caption');
            $slide->link = Input::get('link');
            DB::beginTransaction();
            try {
                $slide->save();
                DB::commit();
                Session::flash('success_slide','The slide was updated successfully');
                return redirect('admin/setting/theme-options#tab_slides');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors_slide','Can not update! Please try again');
                return redirect('admin/setting/theme-options#tab_slides');
            }
        }
        else{
            $image = Input::file('image');
            $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
            Image::make(Input::file('image'))->save('uploads/images/theme_options/'.$filename);
            $slide = Slide::find(Input::get('slide_id'));
            $slide->name = Input::get('name');
            $slide->caption = Input::get('caption');
            $slide->link = Input::get('link');
            $slide->img = $filename;
            DB::beginTransaction();
            try {
                $slide->save();
                DB::commit();
                Session::flash('success_slide','The slide was updated successfully');
                return redirect('admin/setting/theme-options#tab_slides');
            } catch (\Exception $e) {
                DB::rollback();
                Session::flash('errors_slide','Can not update! Please try again');
                return redirect('admin/setting/theme-options#tab_slides');
            }
        }
    }
    public static function postDeleteSlide(){
        Slide::find(Input::get('slide_id'))->delete();
        Session::flash('success_slide','The slide was delete successfully');
        return redirect('admin/setting/theme-options#tab_slides');
    }
    public static function postUpdateScript($id){
        $script = Script::find($id);
        $script->script= Input::get('script');
        DB::beginTransaction();
        try {
            $script->save();
            DB::commit();
            Session::flash('success_script','The script was updated successfully');
            return redirect('admin/setting/theme-options#tab_scripts');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_script','Can not update! Please try again');
            return redirect('admin/setting/theme-options#tab_scripts');
        }
    }
    public static function postEditLogo(){
        $image = Input::file('image');
        $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
        Image::make(Input::file('image'))->save('uploads/images/theme_options/'.$filename);
        $option = ThemeOption::find(1);
        $option->logo = $filename;
        try {
            $option->save();
            DB::commit();
            Session::flash('success_theme_options','The logo was updated successfully');
            return redirect('admin/setting/theme-options');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('errors_theme_options','Can not update! Please try again');
            return redirect('admin/setting/theme-options');
        }
    }

    public static function getApiThemeOption(){
        $slides = Slide::all();
        $option = ThemeOption::find(1);
        $scripts = Script::all();
        $cart_count = Cart::count();
        return response()->json([
            'option'=>$option,
            'slides'=>$slides,
            'scripts'=>$scripts,
            'cart_count'=>$cart_count
        ]);
    }



} 