<?php

use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register'=>false]);

Route::get('user/login','FrontendController@login')->name('login.form');
Route::post('user/login','FrontendController@loginSubmit')->name('login.submit');
Route::get('user/logout','FrontendController@logout')->name('user.logout');

Route::get('اتفاقية_الاستخدام','FrontendController@policy')->name('policy');
Route::get('سياسة_الخصوصية','FrontendController@terms')->name('terms');

// Socialite
Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');



Route::get('user/register','FrontendController@register')->name('register.form');
Route::post('user/register','FrontendController@registerSubmit')->name('register.submit');
// Reset password
Route::get('password-reset', 'FrontendController@showResetForm')->name('password.Reset');


Route::get('/','FrontendController@home')->name('home');

// Frontend Routes
Route::get('/home', 'FrontendController@index');
Route::get('/about-us','FrontendController@aboutUs')->name('about-us');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/contact/message','MessageController@store')->name('contact.store');

Route::get('product-detail/{slug}','FrontendController@productDetail')->name('product-detail');
Route::post('/product/search','FrontendController@productSearch')->name('product.search');
Route::get('/product-cat/{slug}','FrontendController@productCat')->name('product-cat');
Route::get('/product-sub-cat/{slug}/{sub_slug}','FrontendController@productSubCat')->name('product-sub-cat');
Route::get('/product-brand/{slug}','FrontendController@productBrand')->name('product-brand');




Route::get('lang/home', 'LangController@index')->name('h');
Route::get('lang/change', 'LangController@change')->name('changeLang');


// Cart section


Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart');
Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart');

Route::get('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

Route::get('/cart',function(){
    return view('frontend.pages.cart');
})->name('cart');

// Wishlist
Route::get('/wishlist',function(){
    return view('frontend.pages.wishlist');
})->name('wishlist');

Route::get('/wishlist','CartController@wishlist')->name('wishlist');
Route::get('/cart','CartController@cart')->name('cart');

Route::get('/checkout','CartController@checkout')->name('checkout');



Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');
Route::post('cart/order','OrderController@store')->name('cart.order');
Route::get('order/pdf/{id}','OrderController@pdf')->name('order.pdf');
Route::get('/income','OrderController@incomeChart')->name('product.order.income');
Route::get('/user/chart','AdminController@userPieChart')->name('user.piechart');
Route::get('/product-grids','FrontendController@productGrids')->name('product-grids');
Route::get('/product-lists','FrontendController@productLists')->name('product-lists');
Route::match(['get','post'],'/filter','FrontendController@productFilter')->name('shop.filter');
// Order Track
Route::get('/product/track','OrderController@orderTrack')->name('order.track');
Route::post('product/track/order','OrderController@productTrackOrder')->name('product.track.order');
// Blog
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/عبدالله_مصطفي','FrontendController@gm')->name('gm');
Route::get('/blog-detail/{slug}','FrontendController@blogDetail')->name('blog.detail');
Route::get('/blog/search','FrontendController@blogSearch')->name('blog.search');
Route::post('/blog/filter','FrontendController@blogFilter')->name('blog.filter');

Route::get('blog-cat/{slug}','FrontendController@blogByCategory')->name('blog.category');
Route::get('blog-tag/{slug}','FrontendController@blogByTag')->name('blog.tag');


// writers
Route::get('/كاتبي_محتوي','FrontendController@writers')->name('writers');
Route::get('/كاتبي_محتوي/{slug}','FrontendController@writer')->name('writer');

Route::get('/تهنئة_عيد_الاضحي','FrontendController@eid')->name('eid');
Route::get('/تهنئة_عيد_الاضحي','FrontendController@eid_name')->name('eid_name');

// video
Route::get('/فيديو','Front_vid_Controller@video')->name('video');
Route::get('/عرض_فيديو/{slug}','Front_vid_Controller@videoDetail')->name('video.detail');
Route::get('/فيديو/بحث','Front_vid_Controller@videoSearch')->name('video.search');
Route::post('/فيديو/فلتر','Front_vid_Controller@videoFilter')->name('video.filter');
Route::get('قناة/{slug}','Front_vid_Controller@videoByCategory')->name('video.category');

Route::get('اشخاص/{slug}','Front_vid_Controller@videoByMaincategory')->name('video.maincategory');
Route::get('فئات_فيديو/{slug}','Front_vid_Controller@videoByMaincategoryroot')->name('video.maincategoryroot');
Route::get('فيديو_تاج/{slug}','Front_vid_Controller@videoByTag')->name('video.tag');
//video






// NewsLetter
Route::post('/subscribe','FrontendController@subscribe')->name('subscribe');

// // Product Review
Route::resource('/review','ProductReviewController');
Route::post('product/{slug}/review','ProductReviewController@store')->name('review.Store');

// Post Comment
Route::post('post/{slug}/comment','PostCommentController@store')->name('post-comment.store');
Route::resource('/comment','PostCommentController');

// Post Comment  no auth
Route::post('post_no/{slug}/comment','PostComment_no_Controller@store')->name('post-comment_no.store');
Route::resource('/comment_no','PostComment_no_Controller');

// Post Comment
// Route::post('video/{slug}/comment','VideoCommentController@store')->name('video-comment.store');
// Route::resource('/comment','VideoCommentController');
// Coupon
Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');
// Payment
Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');



// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){
    Auth::user();

    Route::get('/','AdminController@index')->name('admin');
    Route::get('/file-manager','AdminController@filemanager')->name('file-manager');

    // user route
    Route::resource('users','UsersController');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    // // Product
    Route::resource('/product','ProductController');
    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');


    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.Password');

   // POST category
   Route::resource('/post-category','PostCategoryController');
   // Post tag
   Route::resource('/post-tag','PostTagController');
   // Post
   Route::resource('/post','PostController');




   // POST main category
   Route::resource('/video-maincategory','VideoMaincategoryController');
   Route::resource('/video-maincategoryroot','VideoMaincategoryrootController');
   // POST category
   Route::resource('/video-category','VideoCategoryController');
   // video tag
   Route::resource('/video-tag','VideoTagController');
   // video
   Route::resource('/video','VideoController');




   Route::get('/visito','AdminController@visito')->name('visito');
   Route::get('/visito_s/{country}','AdminController@visito_s')->name('visito_s');




   Route::get('/post_visitors/{id}','AdminController@postvisito')->name('post.visitors');




   // Message
   Route::resource('/message','MessageController');
   Route::get('/message/five','MessageController@messageFive')->name('messages.five');

Route::get('getmaincat/{id}', [VideoController::class, 'getmaincatsAjax'])->name('maincat.get');
Route::get('getcat/{id}', [VideoController::class, 'getcatsAjax'])->name('cat.get');


});







// Backend section start

Route::group(['prefix'=>'/moderator','middleware'=>['auth','moderator']],function(){

  Route::get('/','AdminController@index')->name('moderator');
   // Post
   Route::resource('/post_m','PostController');
   // Message
   Route::resource('/message_m','MessageController');
   Route::get('/message/five_m','MessageController@messageFive')->name('messages.five_m');

});


















// User section start
Route::group(['prefix'=>'/user','middleware'=>['user']],function(){
    Route::get('/','HomeController@index')->name('user');
     // Profile
     Route::get('/profile','HomeController@profile')->name('user-profile');
     Route::post('/profile/{id}','HomeController@profileUpdate')->name('user-profile-update');
    //  Order
    Route::get('/order',"HomeController@orderIndex")->name('user.order.index');
    Route::get('/order/show/{id}',"HomeController@orderShow")->name('user.order.show');
    Route::delete('/order/delete/{id}','HomeController@userOrderDelete')->name('user.order.delete');
    // Product Review
    Route::get('/user-review','HomeController@productReviewIndex')->name('user.productreview.index');
    Route::delete('/user-review/delete/{id}','HomeController@productReviewDelete')->name('user.productreview.delete');
    Route::get('/user-review/edit/{id}','HomeController@productReviewEdit')->name('user.productreview.edit');
    Route::patch('/user-review/update/{id}','HomeController@productReviewUpdate')->name('user.productreview.update');

    // Post comment
    Route::get('user-post/comment','HomeController@userComment')->name('user.post-comment.index');
    Route::delete('user-post/comment/delete/{id}','HomeController@userCommentDelete')->name('user.post-comment.delete');
    Route::get('user-post/comment/edit/{id}','HomeController@userCommentEdit')->name('user.post-comment.edit');
    Route::patch('user-post/comment/udpate/{id}','HomeController@userCommentUpdate')->name('user.post-comment.update');

    // Password Change
    Route::get('change-password', 'HomeController@changePassword')->name('user.change.password.form');
    Route::post('change-password', 'HomeController@changPasswordStore')->name('change.password');

});

















// Route::get('channels/{channel}', 'HomePageController@channel')->name('channel');
// Route::get('videos/{video}', 'HomePageController@video')->name('video');
//     Route::get('videos', 'HomePageController@index')->name('videos');

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {


//     // Channels
//     Route::delete('channels/destroy', 'ChannelsController@massDestroy')->name('channels.massDestroy');
//     Route::resource('channels', 'ChannelsController');

//     // Videos
//     Route::delete('videos/destroy', 'VideosController@massDestroy')->name('videos.massDestroy');
//     Route::resource('videos', 'VideosController');



// });





































Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});









Route::get('/contact-form', [App\Http\Controllers\ContactController::class, 'contactForm'])->name('contact-form');
Route::post('/contact-form', [App\Http\Controllers\ContactController::class, 'storeContactForm'])->name('contact-form.store');




// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });
