<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Dao\ProductDao;
Route::get('/','FrontendController@index');
Route::get('tin-tuc','FrontendController@getBlog');
Route::get('blog-nha-dep','FrontendController@getBlogBeautifulHouse');
Route::get('blog-nha-dep/{slug}','FrontendController@getBlogBeautifulHouseSingle');
Route::get('thiet-ke','FrontendController@getTheDesign');
Route::get('tin-tuc/{slug}','FrontendController@getSinglePost');
Route::get('product',function(){
    return view('theme.product');
});




//***************************************************************************************************
//                                              BACKEND
//***************************************************************************************************
Route::get('admin/dashboard','BackendController@index');

//******************* TAG **********************
Route::post('admin/post/add-tag','BackendController@postAddTag');
Route::get('admin/post/remove-tag/{id}','BackendController@getRemoveTag');
Route::post('admin/post/save-tag','BackendController@postSaveTag');
//***************** POST ***********************
Route::post('admin/post','BackendController@postPostAdd');
Route::get('admin/post','BackendController@getPost');
Route::get('admin/post/all-post','BackendController@getAllPost');
Route::get('admin/post/edit-post/{id}','BackendController@getEditPost');
Route::get('admin/post/set-disable-hot/{id}','BackendController@getSetDisableHot');
Route::get('admin/post/set-enable-hot/{id}','BackendController@getSetEnableHot');
Route::get('admin/post/set-disable-sticky/{id}','BackendController@getSetDisableSticky');
Route::get('admin/post/set-enable-sticky/{id}','BackendController@getSetEnableSticky');
Route::post('admin/post/edit-post','BackendController@postEditPost');
Route::get('admin/post/edit-post/remove-tag/{post_id}/{tag_id}','BackendController@getEditPostRemoveTag');
Route::post('admin/post/edit-post/add-tag','BackendController@postEditPostAddTag');
Route::post('admin/post/edit-post/image','BackendController@postEditPostImage');
Route::get('admin/post/move-trash/{id}','BackendController@getMovePostIntoTrash');
//POST TRASH
Route::get('admin/post/trash','BackendController@getPostTrash');
Route::get('admin/post/restore-post/{id}','BackendController@getRestorePost');
Route::get('admin/post/remove-post/{id}','BackendController@getRemovePost');

//********************* PRODUCT ************************
//categories, attributes
Route::get('admin/ecommerce/categories','BackendController@getProductCategories');
Route::post('admin/ecommerce/categories','BackendController@postAddProductCategories');
Route::post('admin/ecommerce/categories/edit','BackendController@postEditProductCategories');
Route::post('admin/ecommerce/categories/delete','BackendController@postDeleteProductCategories');
Route::get('admin/ecommerce/attributes','BackendController@getProductAttributes');
Route::post('admin/ecommerce/attributes/create-attribute-category','BackendController@postAddAttributeCategory');
Route::post('admin/ecommerce/attributes/create-attribute','BackendController@postAddAttribute');
Route::get('admin/ecommerce/attributes/delete-attribute/{id}','BackendController@getDeleteAttribute');
Route::post('admin/ecommerce/attributes/update-attribute','BackendController@postUpdateAttribute');
Route::get('admin/ecommerce/attributes/delete-attribute-category/{id}','BackendController@getDeleteAttributeCategory');

//product
Route::get('admin/ecommerce/product','BackendController@getProduct');
Route::post('admin/ecommerce/product','BackendController@postAddProduct');
Route::get('admin/ecommerce/all-product','BackendController@getAllProduct');
Route::get('admin/ecommerce/product/delete-product/{id}','BackendController@getDeleteProduct');
Route::get('admin/ecommerce/product/edit-product/{id}','BackendController@getEditProduct');
Route::post('admin/ecommerce/product/edit-product-text','BackendController@postEditProductText');
Route::post('admin/ecommerce/product/edit-product-feature-image','BackendController@postEditProductFeatureImage');
Route::post('admin/ecommerce/product/edit-product-galery','BackendController@postEditProductGalery');
Route::post('admin/ecommerce/product/delete-product-galery','BackendController@postDeleteProductGalery');
Route::post('admin/ecommerce/product/create-product-galery','BackendController@postCreateProductGalery');
Route::get('admin/ecommerce/product/delete-attribute/{product_id}/{attribute_id}','BackendController@getDeleteProductAttribute');
Route::post('admin/ecommerce/product/add-attribute','BackendController@postAddProductAttribute');
//*******************************GROUP PRODUCT *******************************

Route::get('admin/ecommerce/groups','BackendController@getGroupProduct');
Route::post('admin/ecommerce/groups/create-group','BackendController@postAddGroupProduct');
Route::post('admin/ecommerce/groups/edit-group','BackendController@postEditGroupProduct');
Route::post('admin/ecommerce/groups/delete-group','BackendController@postDeleteGroupProduct');
Route::get('admin/ecommerce/groups/{id}','BackendController@getGroupProductManager');
Route::post('admin/ecommerce/groups/insert-product-into-group','BackendController@postInsertProductIntoGroup');
Route::post('admin/ecommerce/groups/delete-product-in-this-group','BackendController@postDeleteProductInGroup');
//******************************* CATEGORIES CUSTOM ************************
Route::get('admin/ecommerce/categories-custom','BackendController@getCategoriesCustom');
Route::post('admin/ecommerce/categories-custom','BackendController@postAddCategoriesCustom');
Route::post('admin/ecommerce/categories-custom/delete-category-custom','BackendController@postDeleteCategoriesCustom');
//********************************ORDER**********************************
Route::get('admin/ecommerce/orders','BackendController@getOrder');
Route::post('/admin/ecommerce/orders/save-order','BackendController@postSaveOrder');
Route::get('admin/ecommerce/order/{id}','BackendController@getOrderView');

//********************************THEME OPTION **************************
Route::get('admin/setting/theme-options','BackendController@getThemeOption');
Route::post('admin/setting/update/theme-options/general-text','BackendController@postUpdateThemeOptionGeneral');
Route::post('admin/setting/slide/create-slide','BackendController@postCreateSlide');
Route::post('admin/setting/slide/edit-slide','BackendController@postEditSlide');
Route::post('admin/setting/slide/delete-slide','BackendController@postDeleteSlide');
Route::post('/admin/setting/scripts/update-script/{id}','BackendController@postUpdateScript');
Route::post('admin/setting/update/theme-options/logo','BackendController@postEditLogo');
Route::get('admin/setting/editor','BackendController@getEditor');
Route::post('admin/setting/editor','BackendController@postEditor');
//******************************* CONTACT ********************************
Route::get('admin/contacts/contact','BackendController@getContact');
Route::get('admin/contacts/contact/delete-contact/{id}','BackendController@getDeleteContact');

Route::get('admin/contacts/advisory','BackendController@getAdvisory');
Route::get('admin/contacts/advisory/delete-advisory/{id}','BackendController@getDeleteAdvisory');

//**************** LANG ************************
Route::post('admin/post/add-lang','BackendController@postAddLang');
Route::get('admin/post/remove-lang/{id}','BackendController@getRemoveLang');
//**************** COMMENT *********************
Route::get('admin/manage/comments','BackendController@getCommentManage');
Route::get('admin/manage/comments/delete-comment/{id}','BackendController@getDeleteComment');
//************** PRODUCT RATE ******************
Route::get('admin/manage/rates','BackendController@getRateManage');
Route::get('admin/manage/rates/delete-rate/{id}','BackendController@getDeleteRate');

//*************** USERS ************************
Route::get('admin/user','BackendController@getAllUser');
Route::post('admin/user/add-user','BackendController@postAddUser');






//Fronend
Route::get('login','FrontendController@getLogin');
Route::post('login','FrontendController@postLogin');
Route::get('logout','FrontendController@getLogout');
Route::post('add-to-cart','FrontendController@postAddToCart');
Route::post('add-to-cart-category','FrontendController@postAddToCartCategory');
Route::get('delete-row/{rowid}','FrontendController@getDeleteRow');
Route::post('update-cart','FrontendController@postUpdateCart');
Route::post('save-order','FrontendController@postSaveOrder');
Route::get('create/cart','FrontendController@createCart');
Route::get('destroy/cart','FrontendController@getDestroy');
Route::post('create-consult','FrontendController@postCreateConsult');
Route::post('create-contact','FrontendController@postCreateContact');
Route::post('add-rate','FrontendController@postAddRateProduct');
Route::post('add-post-comment','FrontendController@postAddCommentPost');
Route::get('test/open-file','FrontendController@Test');


//Api
Route::group(array('prefix'=>'admin/api/backend'),function(){
    Route::get('tagsbylang','BackendController@getApiTagsByLang');
    Route::get('user/all','BackendController@getApiAllUser');
    Route::get('post/all','BackendController@getApiAllPost');
    Route::get('post/trash','BackendController@getApiPostInTrash');
    Route::get('ecommerce/attributes','BackendController@getApiProductAttributes');
    Route::get('ecommerce/all-product','BackendController@getApiAllProduct');
    Route::get('ecommerce/all-order','BackendController@getApiAllOrder');
    Route::get('contacts/contact','BackendController@getApiContact');
    Route::get('contacts/consult','BackendController@getApiConsult');
    Route::get('manage/comments','BackendController@getApiAllComment');
    Route::get('manage/rates','BackendController@getApiAllRate');
});
Route::group(array('prefix'=>'/api/frontend'),function(){
    Route::get('home','FrontendController@getApiHome');
    Route::get('cart','FrontendController@getApiCart');
    Route::get('category/{slug}','FrontendController@getApiCategory');
    Route::get('product/{slug}','FrontendController@getApiProduct');
    Route::get('best-selling-product','FrontendController@getApiBestSellingProduct');
    Route::get('home-article','FrontendController@getApiHomeArticle');
    Route::get('search/{category}/{search}','FrontendController@getApiSearchProduct');
    Route::get('search','FrontendController@getSearchProduct');
    Route::get('theme-option','FrontendController@getApiThemeOption');
    Route::get('blog/{slug}','FrontendController@getApiBlog');
    Route::get('blog/single/{slug}','FrontendController@getApiSingleBlog');
    Route::get('new-product','FrontendController@getApiProductNew');
    Route::get('blog/sort/recent-post','FrontendController@getApiRecentProduct');

});
Route::get('search','FrontendController@getSearchProduct');
Route::get('api/product','FrontendController@getProducts');
Route::group(array('prefix'=>'check'),function(){
    Route::post('check-category',function(){
        if(ProductDao::checkUniqueCategory(Input::get('name'))){
            return 'true';
        }
        else{
            return 'false';
        }
    });
});




