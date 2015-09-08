<?php
/**
 * Created by PhpStorm.
 * User: Long Hip
 * Date: 8/19/2015
 * Time: 2:55 PM
 */

namespace App\Dao;
use App\Models\PostComment;

class CommentManage {
    public static function getCommentManage(){
        return view('admin.manage.comment-manage');
    }
    public static function getDeleteComment($id){
        $comment = PostComment::find($id);
        $comment->delete();
        return response()->json([
            'success'=>'1',
            'msg'=>'The comment was has deleted successfully'
        ]);
    }









    //API
    public static function getApiAllComment(){
        $comments = PostComment::orderBy('id','desc')->get();
        return response()->json($comments);
    }
} 