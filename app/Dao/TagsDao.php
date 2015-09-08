<?php namespace App\Dao;
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 7/14/2015
 * Time: 3:03 PM
 */
use App\Models\Tags;
use Input;
use Illuminate\Support\Facades\DB;
use App\Models\PostsTags;
class TagsDao {
    public static  function AddTag(){
        $tag = new Tags;
        $tag->name = Input::get('name');
        $tag->slug = Input::get('slug');
        $tag->lang_id = Input::get('lang_id');
        DB::beginTransaction();
        try {
            $tag->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
    public static function CheckEditTag($post_id,$tag){
        $check = PostsTags::where('post_id','=',$post_id)->where('tag_id','=',$tag)->count();
        if($check > 0){
            return false;
        }
        else{
            return true;
        }
    }

} 