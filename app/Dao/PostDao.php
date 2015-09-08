<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 7/31/2015
 * Time: 11:27 AM
 */

namespace App\Dao;
use App\Models\CategoriesArticle;
use App\Models\Post;
use App\Models\PostsTags;
use App\Models\Tags;
use Intervention\Image\Facades\Image;
use App\Dao\TagsDao;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Support\Facades\Validator;
use App\Models\PostLang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class PostDao {
    public static function  postPostAdd(){
        $image = Input::file('image');
        $filename = date('Y-m-d').'-'.$image->getClientOriginalName();
        Image::make(Input::file('image'))->save('uploads/images/post/'.$filename);
        $post = new Post;
        $post->user_id = 1;
        $post->name = Input::get('name');
        $post->slug = Str::slug(Input::get('name'));
        $post->content = Input::get('content');
        $post->meta_title = Input::get('meta_title');
        $post->meta_description = Input::get('meta_description');
        $post->img = $filename;
        $post->lang_id = Input::get('lang_id');
        $post->category_id = Input::get('category_id');
        $post->publish_at = Input::get('publish_at');
        $post->save();
        $tags = Input::get('tags');
        if(is_array($tags)) {
            foreach ($tags as $tag) {
                $post_tag = new PostsTags;
                $post_tag->post_id = $post->id;
                $post_tag->tag_id = $tag;
                $post_tag->save();
            }
        }
        Session::flash('success','The post was posted successfully');
        return redirect('admin/post');
    }
    public static function getAllPost(){
        return view('admin.post.all-post');
    }
    public static function getEditPost($id){
        $langs = PostLang::all();
        $categories = CategoriesArticle::all();
        $post = Post::with('tags')->where('id','=',$id)->first();
        $tags = Tags::all();
        return view('admin.post.edit-post',[
            'post'=>$post,
            'langs'=>$langs,
            'tags'=>$tags,
            'categories'=>$categories
        ]);
    }
    public static function postEditPost(){
        $post =  Post::find(Input::get('post_id'));
        $post->user_id = 1;
        $post->name = Input::get('name');
        $post->slug = Str::slug(Input::get('name'));
        $post->content = Input::get('content');
        $post->meta_title = Input::get('meta_title');
        $post->meta_description = Input::get('meta_description');
        $post->lang_id = Input::get('lang_id');
        $post->category_id = Input::get('category_id');
        $post->save();
        Session::flash('success','The post was posted successfully');
        return redirect('admin/post/edit-post/'.Input::get('post_id'));
    }
    public static function getEditPostRemoveTag($post_id,$tag_id){
        PostsTags::where('post_id','=',$post_id)->where('tag_id','=',$tag_id)->delete();
        Session::flash('success','The tag was removed successfully');
        return redirect('admin/post/edit-post/'.$post_id.'#tab_tags');
    }
    public static function postEditPostAddTag(){
        $post_id = Input::get('post_id');
        $tags = Input::get('tags');
        if(is_array($tags)) {
            foreach ($tags as $tag) {
                $post_tag = new PostsTags;
                $post_tag->post_id = $post_id;
                $post_tag->tag_id = $tag;
                if(!TagsDao::CheckEditTag($post_id,$tag)){
                    Session::flash('error','The tag was has, please choose new tag');
                    return redirect('admin/post/edit-post/'.$post_id.'#tab_tags');
                }
                else{
                    $post_tag->save();
                    Session::flash('success','The tag was added successfully');
                    return redirect('admin/post/edit-post/'.$post_id.'#tab_tags');
                }
            }
        }
    }
    public static function postEditPostImage(){
        $post_id = Input::get('post_id');
        $image = Input::file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        Image::make(Input::file('image'))->save('uploads/images/post/'.'-'.$filename);
        $post = Post::find($post_id);
        $post->img = $filename;
        $post->save();
        Session::flash('success','The image was edited successfully');
        return redirect('admin/post/edit-post/'.$post_id.'#tab_edit_image');

    }
    public static function getMovePostIntoTrash($id){
        $post = Post::find($id);
        $post->deleted = true;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
            return response()->json(['msg'=>'The post was moved to trash']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'The post can not move to trash']);
        }
    }
    public static function getPostTrash(){
        return view('admin.post.trash');
    }
    public static function getRestorePost($id){
        $post = Post::find($id);
        $post->deleted = false;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
            return response()->json(['msg'=>'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'Error']);
        }
    }
    public static function getRemovePost($id){
        $post = Post::find($id);
        DB::beginTransaction();
        try {
            $post->delete();
            DB::commit();
            return response()->json(['msg'=>'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'Error']);
        }
    }
    public static function getSetDisableHot($id){
        $post = Post::find($id);
        $post->isHot = false;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
            return response()->json(['msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'fail']);
        }
    }
    public static function getSetEnableHot($id){
        $post = Post::find($id);
        $post->isHot = true;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
            return response()->json(['msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'fail']);
        }
    }
    public static function getSetDisableSticky($id){
        $post = Post::find($id);
        $post->isSticky = false;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
            return response()->json(['msg'=>'success']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'fail']);
        }
    }
    public static function getSetEnableSticky($id){
        $post = Post::find($id);
        $post->isSticky = true;
        DB::beginTransaction();
        try {
            $post->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['msg'=>'fail']);
        }
    }


} 