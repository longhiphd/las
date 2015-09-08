<?php

namespace App\Http\Controllers;

use App\Dao\CommentManage;
use App\Dao\ContactDao;
use App\Dao\GroupProduct;
use App\Dao\GroupProductDao;
use App\Dao\LangsDao;
use App\Dao\PostDao;
use App\Dao\ProductDao;
use App\Dao\OrderDao;
use App\Dao\RateManage;
use App\Dao\TagsDao;
use App\Dao\ThemeOptionDao;
use App\Dao\UserDao;
use App\Models\CategoriesArticle;
use App\Models\Order;
use App\Models\Post;
use App\Models\PostLang;
use App\Models\PostsTags;
use App\Models\Product;
use App\Models\Tags;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(){
        $product_count = Product::count();
        $product_sum_price = Product::sum('listed_price');
        $order_sum_1 = Order::where('status','=','Chờ xử lý')->sum('total');
        $order_sum_2 = Order::where('status','=','Đang xử lý')->sum('total');
        $order_sum_3 = Order::where('status','=','Hoàn thành')->sum('total');
        $order_count = Order::count();
        return view('admin.index',[
            'product_count'=>$product_count,
            'product_sum_price'=>$product_sum_price,
            'order_sum_1'=>$order_sum_1,
            'order_sum_2'=>$order_sum_2,
            'order_sum_3'=>$order_sum_3,
            'order_count'=>$order_count
        ]);
    }
    //************** USER MANAGER **************
    public function getAllUser(){
        return view('admin.user.user');
    }
    public function postAddUser(){
        UserDao::AddUser();
    }
    //Language
    public function postAddLang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'slug' => 'required',
        ]);
        $success = [
            ['msg'=>'Success']
        ];
        $error = $validator->errors()->all();
        $fail = [
            ['msg'=>'Fail',
             'error'=>$error,
            ]
        ];
        if($validator->fails()){
            return response()->json($fail);
        }
        else{
            $lang = new PostLang;
            $lang->name = Input::get('name');
            $lang->slug = Input::get('slug');
            DB::beginTransaction();
            try {
                $lang->save();
                DB::commit();
                return response()->json($success);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json($fail);
            }
        }
    }
    public function getRemoveLang($id){
        $success = [
            ['msg'=>'Success']
        ];
        $fail = [
            ['msg'=>'Fail']
        ];
        $lang = PostLang::find($id);
        DB::beginTransaction();
        try {
            $lang->delete();
            DB::commit();
            return response()->json($success);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($fail);
        }
    }
    //************************ TAG ***********************
    public function postAddTag(){
        TagsDao::AddTag();
    }
    public function getRemoveTag($id){
        $tag = Tags::find($id);
        $tag->delete();
        return response()->json(['msg'=>'Success']);
    }
    public function postSaveTag(){
        $tag = Tags::find(Input::get('id'));
        $tag->name = Input::get('name');
        $tag->slug = Input::get('slug');
        $tag->save();
    }
    //*********************** POST ***********************
    public function getPost(){
        $categories_article = CategoriesArticle::all();
        return view('admin.post.post',[
            'categories_article'=>$categories_article
        ]);
    }
    public function postPostAdd(){
         return PostDao::postPostAdd();
    }
    public function getAllPost(){
        return view('admin.post.all-post');
    }
    public function getEditPost($id){
        return PostDao::getEditPost($id);
    }
    public function postEditPost(){
        return PostDao::postEditPost();
    }
    public function getEditPostRemoveTag($post_id,$tag_id){
        return PostDao::getEditPostRemoveTag($post_id,$tag_id);
    }
    public function postEditPostAddTag(){
        return PostDao::postEditPostAddTag();
    }
    public function postEditPostImage(){
        return PostDao::postEditPostImage();
    }
    public function getMovePostIntoTrash($id){
        return PostDao::getMovePostIntoTrash($id);
    }
    public function getPostTrash(){
        return view('admin.post.trash');
    }
    public function getRestorePost($id){
        return PostDao::getRestorePost($id);
    }
    public function getRemovePost($id){
        return PostDao::getRemovePost($id);
    }
    public function getSetDisableHot($id){
        return PostDao::getSetDisableHot($id);
    }
    public function getSetEnableHot($id){
        return PostDao::getSetEnableHot($id);
    }
    public function getSetDisableSticky($id){
        return PostDao::getSetDisableSticky($id);
    }
    public function getSetEnableSticky($id){
        return PostDao::getSetEnableSticky($id);
    }




    //******************** PRODUCT ***************************
    public function getProductCategories(){
        return ProductDao::getProductCategories();
    }
    public function postAddProductCategories(){
        return ProductDao::postAddProductCategories();
    }
    public function postEditProductCategories(){
        return ProductDao::postEditProductCategories();
    }
    public function postDeleteProductCategories(){
        return ProductDao::postDeleteProductCategories();
    }
    public function getCategoriesCustom(){
        return ProductDao::getCategoriesCustom();
    }
    public function postAddCategoriesCustom(){
        return ProductDao::postAddCategoriesCustom();
    }
    public function postDeleteCategoriesCustom(){
        return ProductDao::postDeleteCategoriesCustom();
    }

    //attribute category
    public function getProductAttributes(){
        return ProductDao::getProductAttributes();
    }
    public function postAddAttributeCategory(){
        return ProductDao::postAddAttributeCategory();
    }
    //attribute
    public function postAddAttribute(){
        return ProductDao::postAddAttribute();
    }
    public function getDeleteAttribute($id){
        return ProductDao::getDeleteAttribute($id);
    }
    public function postUpdateAttribute(){
        return ProductDao::postUpdateAttribute();
    }
    public function getDeleteAttributeCategory($id){
        return ProductDao::getDeleteAttributeCategory($id);
    }
    //product
    public function getProduct(){
        return ProductDao::getProduct();
    }
    public function postAddProduct(){
        return ProductDao::postAddProduct();
    }
    public function getAllProduct(){
        return ProductDao::getAllProduct();
    }
    public function getDeleteProduct($id){
        return ProductDao::getDeleteProduct($id);
    }
    public function getEditProduct($id){
        return ProductDao::getEditProduct($id);
    }
    public function postEditProductText(){
        return ProductDao::postEditProductText();
    }
    public function postEditProductFeatureImage(){
        return ProductDao::postEditProductFeatureImage();
    }
    public function postEditProductGalery(){
        return ProductDao::postEditProductGalery();
    }
    public function postDeleteProductGalery(){
        return ProductDao::postDeleteProductGalery();
    }
    public function postCreateProductGalery(){
        return ProductDao::postCreateProductGalery();
    }
    public function getDeleteProductAttribute($product_id,$attribute_id){
        return ProductDao::getDeleteProductAttribute($product_id,$attribute_id);
    }
    public function postAddProductAttribute(){
        return ProductDao::postAddProductAttribute();
    }
    //************************GROUP PRODUCT ***********************
    public function getGroupProduct(){
        return GroupProductDao::getGroupProduct();
    }
    public function postAddGroupProduct(){
        return GroupProductDao::postAddGroupProduct();
    }
    public function postEditGroupProduct(){
        return GroupProductDao::postEditGroupProduct();
    }
    public function postDeleteGroupProduct(){
        return GroupProductDao::postDeleteGroupProduct();
    }
    //group product manager
    public function getGroupProductManager($id){
        return GroupProductDao::getGroupProductManager($id);
    }
    public function postInsertProductIntoGroup(){
        return GroupProductDao::postInsertProductIntoGroup();
    }
    public function postDeleteProductInGroup(){
        return GroupProductDao::postDeleteProductInGroup();
    }

    //*************************ORDER*******************************
    public function getOrder(){
        return OrderDao::getOrder();
    }
    public function postSaveOrder(){
        return OrderDao::postSaveOrder();
    }
    public function getOrderView($id){
        return OrderDao::getOrderView($id);
    }
    //**********************CONTACT*********************************
    public function getContact(){
        return ContactDao::getContact();
    }
    public function getDeleteContact($id){
        return ContactDao::getDeleteContact($id);
    }
    public function getAdvisory(){
        return ContactDao::getAdvisory();
    }
    public function getDeleteAdvisory($id){
        return ContactDao::getDeleteAdvisory($id);
    }
    //**********************THEME OPTIONS***************************
    public function getThemeOption(){
        return ThemeOptionDao::getThemeOption();
    }
    public function postUpdateThemeOptionGeneral(){
        return ThemeOptionDao::postUpdateThemeOptionGeneral();
    }
    public function postCreateSlide(){
        return ThemeOptionDao::postCreateSlide();
    }
    public function postEditSlide(){
        return ThemeOptionDao::postEditSlide();
    }
    public function postDeleteSlide(){
        return ThemeOptionDao::postDeleteSlide();
    }
    public function postUpdateScript($id){
        return ThemeOptionDao::postUpdateScript($id);
    }
    public function postEditLogo(){
        return ThemeOptionDao::postEditLogo();
    }
    public function getEditor(){
        $file = File::get(base_path('resources\views\index.blade.php'));
        return view('admin.setting.editor',[
            'file'=>$file
        ]);
    }
    public function postEditor(){
       File::put(base_path('resources\views\test.blade.php'),Input::get('data'));
    }
    //**************************MANAGE**************************
    public function getCommentManage(){
        return CommentManage::getCommentManage();
    }
    public function getDeleteComment($id){
        return CommentManage::getDeleteComment($id);
    }
    public function getRateManage(){
        return RateManage::getRateManage();
    }
    public function getDeleteRate($id){
        return RateManage::getDeleteRate($id);
    }

















    //************************ API **************************
    public function getApiTagsByLang(){
        $lang = PostLang::with('tags')->get();
        return response()->json($lang);
    }
    public function getApiAllUser(){
        $users = User::with('roles')->get();
        foreach($users as $user){
            foreach($user->roles as $role){
                $data[] = array(
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'role'=>$role->name,
                );
            }
        }
        return response()->json($data);
    }
    public function getApiAllPost(){
        $posts = Post::orderBy('id','desc')->where('deleted','=',false)->get();
        return response()->json($posts);
    }
    public function getApiPostInTrash(){
        $posts = Post::orderBy('id','desc')->where('deleted','=',true)->get();
        return response()->json($posts);
    }
    public function getApiProductAttributes(){
        return ProductDao::getApiProductAttributes();
    }
    public function getApiAllProduct(){
        return ProductDao::getApiAllProduct();
    }
    public function getApiAllOrder(){
        return OrderDao::getApiAllOrder();
    }
    public function getApiContact(){
        return ContactDao::getApiContact();
    }
    public function getApiConsult(){
        return ContactDao::getApiConsult();
    }
    public function getApiAllComment(){
        return CommentManage::getApiAllComment();
    }
    public function getApiAllRate(){
        return RateManage::getApiAllRate();
    }



}
