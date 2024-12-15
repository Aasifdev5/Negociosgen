<?php

use App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\ForumCategoryController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;

use App\Http\Controllers\Admin\MediaController;

use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Admin\SettingController;


use App\Http\Controllers\Admin\SubcategoryController;

use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\EmailAppController;

use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MailTemplateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Pages;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\SalesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\SetLocale;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;




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

Route::get('/forget_password', [UserController::class, 'forget_password'])->name('forget_password');

Route::post('/forget_mail', [UserController::class, 'forget_mail'])->name('forget_mail');
Route::post('/sendResetPasswordLink', [UserController::class, 'sendResetPasswordLink'])->name('sendResetPasswordLink');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/ResetPasswordLoad', [UserController::class, 'ResetPasswordLoad'])->name('ResetPasswordLoad');
Route::post('/ResetPassword', [UserController::class, 'ResetPassword'])->name('ResetPassword');



Route::group(['middleware' => ['prevent-back-history', SetLocale::class]], function () {
    Route::get('/', [UserController::class, 'home'])->name('home');
    Route::get('/index', [UserController::class, 'home'])->name('home');
    Route::get('/local/{ln}', function ($ln) {
        return redirect()->back()->with('local', $ln);
    });


    Route::get('/geanologìa', [UserController::class, 'geanologìa']);
    Route::get('/sales-details/{id}', [SalesController::class, 'getSalesDetails'])->name('sales.details');
    Route::get('Userlogin', [UserController::class, 'Userlogin'])->name('Userlogin');
    Route::get('getProducts', [UserController::class, 'getProducts'])->name('getProducts');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('isLoggedIn');
    Route::get('/dashboard-data', [UserController::class, 'getDashboardData'])->name('getDashboardData');

    Route::get('/requestW', [UserController::class, 'requestW'])->name('requestW')->middleware('isLoggedIn');
    Route::post('/requestWithdrawal', [UserController::class, 'requestWithdrawal'])->name('requestWithdrawal');
    Route::get('shop', [UserController::class, 'shop'])->name('shop')->middleware('isLoggedIn');
    Route::get('search', [UserController::class, 'search'])->name('search')->middleware('isLoggedIn');
    Route::post('/post-insert', [UserController::class, 'Ad_insert'])->name('Ad_insert')->middleware('isLoggedIn');
    Route::get('blog', [UserController::class, 'blogs'])->name('blog');
    Route::get('course', [UserController::class, 'course'])->middleware('check.membership')->name('course');

    Route::get('nosotros', [UserController::class, 'nosotros'])->name('nosotros');
    Route::post('/save_address', [UserController::class, 'save_address'])->name('save_address');
    Route::get('/change_password', [UserController::class, 'change_password'])->name('change_password')->middleware('isLoggedIn');
    Route::post('/update_password', [UserController::class, 'update_password'])->name('update_password');
    Route::get('/edit_profile', [UserController::class, 'edit_profile'])->middleware('isLoggedIn');
    Route::post('update_profile', [UserController::class, 'update_profile']);
    Route::get('addToCart/{price}/{id}/{quantity}/{chooseSize}', [UserController::class, 'addToCart'])->name('addToCart');
    Route::get('BuyaddToCart/{price}/{id}/{quantity}', [UserController::class, 'BuyaddToCart'])->name('BuyaddToCart');
    Route::get('vBuyaddToCart/{price}/{id}/{quantity}/{chooseSize}', [UserController::class, 'vBuyaddToCart'])->name('vBuyaddToCart');
    Route::post('/update-quantity', [UserController::class, 'updateQuantity']);
    Route::get('RemoveCart/{id}', [UserController::class, 'removeCart'])->name('remove.cart');
    Route::get('cart', [UserController::class, 'cart'])->name('cart')->middleware('isLoggedIn');
    Route::get('/clear-cart', [UserController::class, 'clearCart'])->name('clear.cart');
    Route::get('/clear-wishlist', [UserController::class, 'clearWishlist'])->name('clear.wishlist');

    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/who', [UserController::class, 'who'])->name('who');
    Route::get('/workUs', [UserController::class, 'workUs'])->name('workUs');
    Route::get('/affiliate_company', [UserController::class, 'affiliate_company'])->name('affiliate_company');
    Route::get('/userNotifications', [UserController::class, 'userNotifications'])->name('userNotifications');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/messages', [ChatController::class, 'getChatMessages'])->name('chat.messages');
    Route::post('/chat/send', [ChatController::class, 'sendChatMessage'])->name('chat.send');
    Route::post('/like', [UserController::class, 'storeLikes'])->name('like');
    Route::post('checkLike', [UserController::class, 'checkLike'])->name('checkLike');
    Route::get('checkout', [UserController::class, 'checkout'])->name('checkout');
    Route::post('/billing', [UserController::class, 'Billingstore'])->name('billing.store');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('term', [UserController::class, 'term'])->name('term');
    Route::get('/invoice/{id}', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');

    Route::get('/news-category/{id}', [UserController::class, 'news_category'])->name('news_category');
    Route::get('/membership', [UserController::class, 'membership'])->name('membership');
    Route::get('/membership/renew', [UserController::class, 'membershipRenew'])->name('membershipRenew');
    Route::post('/renew', [UserController::class, 'renew'])->name('renew');

    Route::get('/gen_cards', [UserController::class, 'gen_cards'])->name('gen_cards')->middleware('isLoggedIn');
    Route::get('/gen_members_area', [UserController::class, 'gen_members_area'])->name('gen_members_area')->middleware('isLoggedIn');
    Route::get('/partners', [UserController::class, 'partners'])->name('partners')->middleware('isLoggedIn');
    Route::get('/events', [UserController::class, 'events'])->name('events')->middleware('isLoggedIn');
    Route::get('/verification', [UserController::class, 'verification'])->name('verification')->middleware('isLoggedIn');
    Route::get('/home', [UserController::class, 'home'])->name('home')->middleware('isLoggedIn');
    Route::get('addToWishlist/{price}/{id}', [UserController::class, 'addToWishlist'])->name('addToWishlist');
    Route::get('RemoveWish/{id}', [UserController::class, 'RemoveWish'])->name('remove.wish');
    Route::get('/tarjeta', [UserController::class, 'tarjeta'])->name('tarjeta')->middleware('isLoggedIn');
    Route::post('pay_credit/{id}', [UserController::class, 'pay_credit'])->name('pay_credit')->middleware('isLoggedIn');
    Route::get('page/{slug}', [Pages::class, 'get_page'])->middleware('isLoggedIn');
    Route::post('contact_send', [Pages::class, 'contact_send']);
    Route::get('/blog_detail/{slug}', [UserController::class, 'blog_detail'])->name('blog_detail');
    Route::get('/addpaymentmethod', [UserController::class, 'addpaymentmethod'])->name('addpaymentmethod')->middleware('isLoggedIn');
    Route::get('/ayuda', [UserController::class, 'ayuda'])->name('ayuda');
    Route::get('/welcome', [UserController::class, 'welcome'])->name('welcome')->middleware('isLoggedIn');
    Route::get('/Details', [UserController::class, 'Details'])->name('Details')->middleware('isLoggedIn');
    Route::get('/product-details/{slug}', [UserController::class, 'ProductDetail'])->name('ProductDetail')->middleware('isLoggedIn');

    Route::get('/transferencia', [UserController::class, 'transferencia'])->name('transferencia')->middleware('isLoggedIn');
    Route::get('/recursos', [UserController::class, 'recursos'])->middleware('check.membership')->name('recursos')->middleware('alreadyLoggedIn');

    Route::get('/signup', [UserController::class, 'signup'])->name('signup')->middleware('alreadyLoggedIn');
    Route::get('verify-otp', [OTPController::class, 'showOtpForm'])->name('verify.otp')->middleware('alreadyLoggedIn');
    Route::get('/Userlogin', [UserController::class, 'Userlogin'])->name('Userlogin')->middleware('alreadyLoggedIn');
    Route::get('show/{uuid}', [SupportTicketController::class, 'ticketUserShow'])->name('show')->middleware('isLoggedIn');
    Route::group(['prefix' => 'forum', 'as' => 'forum.'], function () {
        Route::get('/', [ForumController::class, 'index'])->name('index');
        Route::get('ask-a-question', [ForumController::class, 'askQuestion'])->name('askQuestion');
        Route::post('ask-a-question-store', [ForumController::class, 'questionStore'])->name('question.store');
        Route::get('forum-post-details/{uuid}', [ForumController::class, 'forumPostDetails'])->name('forumPostDetails');
        Route::post('forum-post-comment-store', [ForumController::class, 'forumPostCommentStore'])->name('forumPostComment.store');
        Route::post('forum-post-comment-reply-store', [ForumController::class, 'forumPostCommentReplyStore'])->name('forumPostCommentReply.store');
        Route::get('render-forum-category-posts', [ForumController::class, 'renderForumCategoryPosts'])->name('renderForumCategoryPosts');
        Route::get('forum-category-posts/{uuid}', [ForumController::class, 'forumCategoryPosts'])->name('forumCategoryPosts');
        Route::get('forum-leaderboard', [ForumController::class, 'forumLeaderboard'])->name('forumLeaderboard');
        Route::get('search-forum-list', [ForumController::class, 'searchForumList'])->name('search-forum.list');
    });
});
Route::post('/update-logout-time', [UserController::class, 'updateLogoutTime'])->name('update.logout.time');
Route::post('/reg', [UserController::class, 'registration']);
Route::get('/audiobooks', [AudiobookController::class, 'audiobook'])->name('audiobook');
Route::get('/audiobook/{id}', [AudiobookController::class, 'showAudiobookDetails'])->name('showAudiobookDetails');

Route::post('/log', [UserController::class, 'login'])->name('login');

Route::post('send-otp', [OTPController::class, 'sendOtp'])->name('send.otp');
Route::post('/otp/resend', [OTPController::class, 'resendOtp'])->name('otp.resend');

Route::post('verify-otp', [OTPController::class, 'verifyOtp'])->name('verify.otp.submit');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/blog_details/{id}', [UserController::class, 'blog_details'])->name('blog_details');

Route::get('/ganancias', [UserController::class, 'ganancias'])->name('ganancias');
Route::post('/blog/{id}/like', [BlogController::class, 'incrementLike'])->name('blog.like');
Route::post('blog-comment', [UserController::class, 'blogCommentStore'])->name('blog-comment.store');
Route::post('blog-comment-reply', [UserController::class, 'blogCommentReplyStore'])->name('blog-comment-reply.store');
Route::get('search-blog-list', [UserController::class, 'searchBlogList'])->name('search-blog.list');
Route::get('/fondo', [UserController::class, 'fondo'])->name('fondo');
Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->name('verification.verify');

Route::get('create', [SupportTicketController::class, 'create'])->name('tickets.create');
Route::post('store', [SupportTicketController::class, 'store'])->name('tickets.store');
Route::get('/SkugenerateInvoice/{id}', [InvoiceController::class, 'SkugenerateInvoice'])->name('SkugenerateInvoice');
Route::get('/get-states', [UserController::class, 'getStates'])->name('get-states');
Route::get('/get-cities', [UserController::class, 'getCities'])->name('get-cities');

Route::get('/payments/data', [Admin::class, 'getPaymentData'])->name('payments.data');
Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin-prevent-back-history', SetLocale::class], function () {
        Route::resource('banners', BannerController::class)->names('admin.banners');
        // Testimonial routes
        Route::prefix('testimonials')->group(function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('testimonials.index');
            Route::get('create', [TestimonialController::class, 'create'])->name('testimonials.create');
            Route::post('store', [TestimonialController::class, 'store'])->name('testimonials.store');
            Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
            Route::post('update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
            Route::delete('delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.delete');
            Route::post('bulk-delete', [TestimonialController::class, 'bulkDelete'])->name('testimonials.bulk.delete');
        });

        // Portfolio routes
        Route::prefix('portfolios')->group(function () {
            Route::get('/', [PortfolioController::class, 'index'])->name('portfolios.index');
            Route::get('create', [PortfolioController::class, 'create'])->name('portfolios.create');
            Route::post('store', [PortfolioController::class, 'store'])->name('portfolios.store');
            Route::get('edit/{id}', [PortfolioController::class, 'edit'])->name('portfolios.edit');
            Route::post('update/{id}', [PortfolioController::class, 'update'])->name('portfolios.update');
            Route::delete('delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolios.delete');
            Route::post('bulk-delete', [PortfolioController::class, 'bulkDelete'])->name('portfolios.bulk.delete');
        });


        Route::post('banners/bulk-destroy', [BannerController::class, 'bulkDestroy'])->name('admin.banners.bulkDestroy');

        Route::get('/local/{ln}', function ($ln) {
            $language = Language::where('iso_code', $ln)->first();
            if (!$language) {
                $language = Language::where('default_language', 'on')->first();
                if (!$language) {
                    $language = Language::find(1);
                }
                $ln = $language->iso_code;
            }

            session(['local' => $ln]);
            App::setLocale($ln);
            return redirect()->back();
        });
        // routes/web.php

        Route::get('/getOrderDetails/{orderId}', [Admin::class, 'getOrderDetails'])->name('getOrderDetails');

        Route::get('permissions/index', [Admin::class, 'Plist'])->name('permissions.index');
        Route::get('permissions/create', [Admin::class, 'Pcreate'])->name('permissions.create');
        Route::post('permissions', [Admin::class, 'Pstore'])->name('permissions.store');
        Route::get('permissions/{id}/edit', [Admin::class, 'Pedit'])->name('permissions.edit');
        Route::put('permissions/{id}', [Admin::class, 'Pupdate'])->name('permissions.update');
        Route::delete('/permission/{id}', [Admin::class, 'pdestroy'])->name('permissions.delete');
        Route::get('/earn', [Admin::class, 'earn'])->name('earn');

        Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qrcode.index')->middleware('AdminIsLoggedIn');
        Route::get('/destroy_qrcode/{id}', [QRCodeController::class, 'destroy'])->name('destroy');
        Route::post('/qrcode/generate', [QRCodeController::class, 'generateQrCode'])->name('qrcode.generate');
        Route::get('/qrcode/download/{data}', [QRCodeController::class, 'downloadQrCode'])->name('qrcode.download');
        Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.'], function () {
            Route::get('index', [SupportTicketController::class, 'ticketIndex'])->name('index');
            Route::get('open', [SupportTicketController::class, 'ticketOpen'])->name('open');
            Route::get('show/{uuid}', [SupportTicketController::class, 'ticketShow'])->name('show')->middleware('AdminIsLoggedIn');
            Route::get('delete/{uuid}', [SupportTicketController::class, 'ticketDelete'])->name('delete');
            Route::post('change-ticket-status', [SupportTicketController::class, 'changeTicketStatus'])->name('changeTicketStatus');
            Route::post('message-store', [SupportTicketController::class, 'messageStore'])->name('messageStore');
            Route::post('bulk-delete', [SupportTicketController::class, 'bulkDelete'])->name('bulkDelete');
        });


        Route::group(['prefix' => 'forum', 'as' => 'forum.'], function () {
            Route::get('category-index', [ForumCategoryController::class, 'index'])->name('category.index');
            Route::post('category-store', [ForumCategoryController::class, 'store'])->name('category.store');
            Route::patch('category-update/{uuid}', [ForumCategoryController::class, 'update'])->name('category.update');
            Route::get('category-delete/{uuid}', [ForumCategoryController::class, 'delete'])->name('category.delete');
        });
        Route::group(['prefix' => 'audiolibros', 'as' => 'audiolibros.'], function () {
            Route::get('', [AudiobookController::class, 'index'])->name('index');
            Route::get('crear', [AudiobookController::class, 'create'])->name('crear'); // This matches 'audiolibros.crear'
            Route::post('crear', [AudiobookController::class, 'store'])->name('store');
            Route::get('editar/{id}', [AudiobookController::class, 'edit'])->name('edit'); // This matches 'audiolibros.edit'
            Route::post('actualizar/{id}', [AudiobookController::class, 'update'])->name('update');
            Route::delete('/eliminar/{audiobook}', [AudiobookController::class, 'destroy'])->name('destroy');

            Route::post('/eliminar-multiple', [AudiobookController::class, 'bulkDelete'])->name('bulk-delete');
        });


        Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
            //Start:: General Settings
            Route::get('general-settings', [SettingController::class, 'GeneralSetting'])->name('general_setting');
            Route::post('general-settings-update', [SettingController::class, 'GeneralSettingUpdate'])->name('general_setting.cms.update');

            Route::get('metas', [SettingController::class, 'metaIndex'])->name('meta.index');
            Route::get('meta/edit/{uuid}', [SettingController::class, 'editMeta'])->name('meta.edit');
            Route::post('meta/update/{uuid}', [SettingController::class, 'updateMeta'])->name('meta.update');

            // Route::get('site-share-content', [SettingController::class, 'siteShareContent'])->name('site-share-content');
            Route::get('map-api-key', [SettingController::class, 'mapApiKey'])->name('map-api-key');



            //Start:: Device Control Mode
            Route::get('device-control-changes', [SettingController::class, 'deviceControl'])->name('device_control');
            Route::post('device-control-changes', [SettingController::class, 'deviceControlChange'])->name('device_control.change');
            //End:: Device Control Mode


            //Start:: Social Login Settings
            Route::get('social-login-settings', [SettingController::class, 'socialLoginSettings'])->name('social-login-settings');
            Route::post('social-settings-update', [SettingController::class, 'socialLoginSettingsUpdate'])->name('social-login-settings.update');



            //Start:: Currency Settings
            Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
                Route::get('', [CurrencyController::class, 'index'])->name('index');
                Route::post('currency', [CurrencyController::class, 'store'])->name('store');
                Route::get('edit/{id}/{slug?}', [CurrencyController::class, 'edit'])->name('edit');
                Route::patch('update/{id}', [CurrencyController::class, 'update'])->name('update');
                Route::get('delete/{id}', [CurrencyController::class, 'delete'])->name('delete');
            });


            //Start:: Home Settings
            Route::get('theme-settings', [HomeSettingController::class, 'themeSettings'])->name('theme-setting');
            Route::get('section-settings', [HomeSettingController::class, 'sectionSettings'])->name('section-settings');
            Route::post('sectionSettingsStatusChange', [HomeSettingController::class, 'sectionSettingsStatusChange'])->name('sectionSettingsStatusChange');
            Route::get('banner-section-settings', [HomeSettingController::class, 'bannerSection'])->name('banner-section');
            Route::post('banner-section-settings', [HomeSettingController::class, 'bannerSectionUpdate'])->name('banner-section.update');
            Route::get('special-feature-section-settings', [HomeSettingController::class, 'specialFeatureSection'])->name('special-feature-section');
            Route::get('course-section-settings', [HomeSettingController::class, 'courseSection'])->name('course-section');
            Route::get('category-course-section-settings', [HomeSettingController::class, 'categoryCourseSection'])->name('category-course-section');
            Route::get('upcoming-course-section-settings', [HomeSettingController::class, 'upcomingCourseSection'])->name('upcoming-course-section');
            Route::get('product-section-settings', [HomeSettingController::class, 'productSection'])->name('product-section');
            Route::get('bundle-course-section-settings', [HomeSettingController::class, 'bundleCourseSection'])->name('bundle-course-section');
            Route::get('top-category-section-settings', [HomeSettingController::class, 'topCategorySection'])->name('top-category-section');

            Route::get('customer-say-section-settings', [HomeSettingController::class, 'customerSaySection'])->name('customer-say-section');
            Route::get('achievement-section-settings', [HomeSettingController::class, 'achievementSection'])->name('achievement-section');
            //End:: Home Settings

            //Start:: Mail Config
            Route::get('mail-configuration', [SettingController::class, 'mailConfiguration'])->name('mail-configuration');
            Route::post('send-test-mail', [SettingController::class, 'sendTestMail'])->name('send.test.mail');
            Route::post('save-setting', [SettingController::class, 'saveSetting'])->name('save.setting');
            //End:: Mail Config



            //Start:: FAQ Question & Answer
            Route::get('faq-settings', [SettingController::class, 'faqCMS'])->name('faq.cms');
            Route::get('faq-tab', [SettingController::class, 'faqTab'])->name('faq.tab');
            Route::get('faq-question-settings', [SettingController::class, 'faqQuestion'])->name('faq.question');
            Route::post('faq-question-settings', [SettingController::class, 'faqQuestionUpdate'])->name('faq.question.update');
            //End:: FAQ Question & Answer



            //Start:: Support Ticket
            Route::group(['prefix' => 'support-ticket', 'as' => 'support-ticket.'], function () {
                Route::get('/', [SettingController::class, 'supportTicketCMS'])->name('cms');
                Route::get('question-answer', [SettingController::class, 'supportTicketQuesAns'])->name('question');
                Route::post('question-answer', [SettingController::class, 'supportTicketQuesAnsUpdate'])->name('question.update');
                Route::post('questionAnsDelete', [SettingController::class, 'questionAnsDelete'])->name('questionAnsDelete');

                Route::get('department', [SupportTicketController::class, 'Department'])->name('department');
                Route::post('department', [SupportTicketController::class, 'DepartmentStore'])->name('department.store');
                Route::delete('department-delete/{uuid}', [SupportTicketController::class, 'departmentDelete'])->name('department.delete');

                Route::get('priority', [SupportTicketController::class, 'Priority'])->name('priority');
                Route::post('priority', [SupportTicketController::class, 'PriorityStore'])->name('priority.store');
                Route::delete('priorities-delete/{uuid}', [SupportTicketController::class, 'priorityDelete'])->name('priority.delete');

                Route::get('services', [SupportTicketController::class, 'RelatedService'])->name('services');
                Route::post('services', [SupportTicketController::class, 'RelatedServiceStore'])->name('services.store');
                Route::delete('services-delete/{uuid}', [SupportTicketController::class, 'relatedServiceDelete'])->name('services.delete');
            });
            //End:: Support Ticket

            // Start:: Contact Us
            Route::get('contact-us-cms', [ContactUsController::class, 'contactUsCMS'])->name('contact.cms');
            // End:: Contact Us

            Route::get('payment-method', [SettingController::class, 'paymentMethod'])->name('payment_method_settings');

            //start:: Bank
            Route::group(['prefix' => 'bank'], function () {
                Route::get('/', [BankController::class, 'index'])->name('bank.index');
                Route::post('/store', [BankController::class, 'store'])->name('bank.store');
                Route::get('/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
                Route::patch('/update/{id}', [BankController::class, 'update'])->name('bank.update');
                Route::get('/status/{id}', [BankController::class, 'status'])->name('bank.status');
                Route::delete('delete/{id}', [BankController::class, 'delete'])->name('bank.delete');
            });


            // End:: About Us
            Route::group(['prefix' => 'locations', 'as' => 'location.'], function () {
                Route::get('country', [LocationController::class, 'countryIndex'])->name('country.index');
                Route::post('country', [LocationController::class, 'countryStore'])->name('country.store');
                Route::get('country/{id}/{slug?}', [LocationController::class, 'countryEdit'])->name('country.edit');
                Route::patch('country/{id}', [LocationController::class, 'countryUpdate'])->name('country.update');
                Route::delete('country/delete/{id}', [LocationController::class, 'countryDelete'])->name('country.delete');

                Route::get('state', [LocationController::class, 'stateIndex'])->name('state.index');
                Route::post('state', [LocationController::class, 'stateStore'])->name('state.store');
                Route::get('state/{id}/{slug?}', [LocationController::class, 'stateEdit'])->name('state.edit');
                Route::patch('state/{id}', [LocationController::class, 'stateUpdate'])->name('state.update');
                Route::delete('state/delete/{id}', [LocationController::class, 'stateDelete'])->name('state.delete');

                Route::get('city', [LocationController::class, 'cityIndex'])->name('city.index');
                Route::post('city', [LocationController::class, 'cityStore'])->name('city.store');
                Route::get('city/{id}/{slug?}', [LocationController::class, 'cityEdit'])->name('city.edit');
                Route::patch('city/{id}', [LocationController::class, 'cityUpdate'])->name('city.update');
                Route::delete('city/delete/{id}', [LocationController::class, 'cityDelete'])->name('city.delete');
            });
        });
        Route::get('notification-url/{uuid}', [Admin::class, 'notificationUrl'])->name('notification.url');
        Route::post('mark-all-as-read', [Admin::class, 'markAllAsReadNotification'])->name('notification.all-read');
        Route::prefix('language')->group(function () {
            Route::get('/', [LanguageController::class, 'index'])->name('language.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [LanguageController::class, 'create'])->name('language.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [LanguageController::class, 'store'])->name('language.store');
            Route::get('edit/{id}/{iso_code?}', [LanguageController::class, 'edit'])->name('language.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{id}', [LanguageController::class, 'update'])->name('language.update');
            Route::get('translate/{id}', [LanguageController::class, 'translateLanguage'])->name('language.translate')->middleware('AdminIsLoggedIn');
            Route::post('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('update.translate');
            Route::get('delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
            Route::post('import', [LanguageController::class, 'import'])->name('language.import');
            Route::post('update-language/{id}', [LanguageController::class, 'updateLanguage'])->name('update-language');
        });

        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
            Route::get('create', [RoleController::class, 'create'])->name('create')->middleware('AdminIsLoggedIn');
            Route::post('store', [RoleController::class, 'store'])->name('store');
            Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{id}', [RoleController::class, 'update'])->name('update');
            Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });
        Route::prefix('tag')->group(function () {
            Route::get('/', [TagController::class, 'index'])->name('tag.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [TagController::class, 'create'])->name('tag.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [TagController::class, 'store'])->name('tag.store');
            Route::get('edit/{uuid}', [TagController::class, 'edit'])->name('tag.edit')->middleware('AdminIsLoggedIn');
            Route::patch('update/{uuid}', [TagController::class, 'update'])->name('tag.update');
            Route::get('delete/{uuid}', [TagController::class, 'delete'])->name('tag.delete');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [CategoryController::class, 'create'])->name('category.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('delete/{uuid}', [CategoryController::class, 'delete'])->name('category.delete');
            Route::post('bulk-delete', [CategoryController::class, 'bulkDelete'])->name('category.bulk.delete');
        });
        Route::prefix('events')->group(function () {
            Route::get('/', [EventsController::class, 'index'])->name('events.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [EventsController::class, 'create'])->name('events.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [EventsController::class, 'store'])->name('events.store');
            Route::get('edit/{uuid}', [EventsController::class, 'edit'])->name('events.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{uuid}', [EventsController::class, 'update'])->name('events.update');
            Route::get('delete/{uuid}', [EventsController::class, 'delete'])->name('events.delete');
            Route::post('bulk-delete', [EventsController::class, 'bulkDelete'])->name('events.bulk.delete');
        });
        Route::prefix('curso')->group(function () {
            Route::get('/', [CursoController::class, 'index'])->name('curso.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [CursoController::class, 'create'])->name('curso.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [CursoController::class, 'store'])->name('curso.store');
            Route::get('edit/{uuid}', [CursoController::class, 'edit'])->name('curso.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{uuid}', [CursoController::class, 'update'])->name('curso.update');
            Route::get('delete/{uuid}', [CursoController::class, 'delete'])->name('curso.delete');
            Route::post('bulk-delete', [CursoController::class, 'bulkDelete'])->name('curso.bulk.delete');
        });
        Route::prefix('subcategory')->group(function () {
            Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.index');
            Route::get('create', [SubcategoryController::class, 'create'])->name('subcategory.create');
            Route::post('store', [SubcategoryController::class, 'store'])->name('subcategory.store');
            Route::get('edit/{uuid}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
            Route::post('update/{uuid}', [SubcategoryController::class, 'update'])->name('subcategory.update');
            Route::delete('delete/{uuid}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
            Route::post('bulk-delete', [SubcategoryController::class, 'bulkDelete'])->name('subcategory.bulk.delete');
        });


        Route::get('childcategory', [SubcategoryController::class, 'childcategory'])->name('childcategory')->middleware('AdminIsLoggedIn');
        Route::prefix('gallery')->group(function () {
            Route::get('/', [MediaController::class, 'index'])->name('gallery.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [MediaController::class, 'create'])->name('gallery.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [MediaController::class, 'store'])->name('gallery.store');
            Route::get('edit/{id}', [MediaController::class, 'edit'])->name('gallery.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{id}', [MediaController::class, 'update'])->name('gallery.update');
            Route::get('delete/{id}', [MediaController::class, 'delete'])->name('gallery.delete');
            Route::post('bulk-delete', [MediaController::class, 'bulkDelete'])->name('gallery.bulk.delete');
        });
        Route::prefix('brands')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brands.index')->middleware('AdminIsLoggedIn');
            Route::get('create', [BrandController::class, 'create'])->name('brands.create')->middleware('AdminIsLoggedIn');
            Route::post('store', [BrandController::class, 'store'])->name('brands.store');
            Route::get('edit/{uuid}', [BrandController::class, 'edit'])->name('brands.edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{uuid}', [BrandController::class, 'update'])->name('brands.update');
            Route::get('delete/{uuid}', [BrandController::class, 'delete'])->name('brands.delete');
        });
        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
            Route::get('create', [BlogController::class, 'create'])->name('create')->middleware('AdminIsLoggedIn');
            Route::post('store', [BlogController::class, 'store'])->name('store');
            Route::get('edit/{uuid}', [BlogController::class, 'edit'])->name('edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{uuid}', [BlogController::class, 'update'])->name('update');
            Route::get('delete/{uuid}', [BlogController::class, 'delete'])->name('delete');
            Route::get('blog-comment-list', [BlogController::class, 'blogCommentList'])->name('blog-comment-list')->middleware('AdminIsLoggedIn');
            Route::post('change-blog-comment-status', [BlogController::class, 'changeBlogCommentStatus'])->name('changeBlogCommentStatus');
            Route::get('blog-comment-delete/{id}', [BlogController::class, 'blogCommentDelete'])->name('blogComment.delete');
            Route::post('blog-comment-bulk-delete', [BlogController::class, 'bulkDeleteComments'])->name('blogComment.bulkDelete'); // Unique name for blog comment bulk delete
            Route::post('bulk-delete', [BlogController::class, 'bulkDelete'])->name('bulkDelete'); // Fixed bulk delete route

            Route::get('blog-category-index', [BlogCategoryController::class, 'index'])->name('blog-category.index')->middleware('AdminIsLoggedIn');
            Route::post('blog-category-store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
            Route::patch('blog-category-update/{uuid}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
            Route::get('blog-category-delete/{uuid}', [BlogCategoryController::class, 'delete'])->name('blog-category.delete');
            Route::post('blog-category-bulk-delete', [BlogCategoryController::class, 'bulkDeleteBlogCategory'])->name('bulkDeleteBlogCategory');
        });




        Route::get('login', [Admin::class, 'admin'])->name('admin')->middleware('AdminAlreadyLoggedIn');


        Route::get('dashboard', [Admin::class, 'dashboard'])->name('dashboard')->middleware('AdminIsLoggedIn');
        Route::get('/add_category', [Admin::class, 'add_category'])->name('add_category')->middleware('AdminIsLoggedIn');
        Route::post('/save_category', [Admin::class, 'save_category'])->name('save_category')->middleware('AdminIsLoggedIn');
        Route::get('/edit_profile', [Admin::class, 'edit_profile'])->name('edit_profile')->middleware('AdminIsLoggedIn');
        Route::post('update_profile', [Admin::class, 'update_profile'])->name('update_profile')->middleware('AdminIsLoggedIn');
        Route::get('/smtp_setting', [Admin::class, 'smtp_setting'])->name('smtp_setting')->middleware('AdminIsLoggedIn');
        Route::post('/update_smtp_setting', [Admin::class, 'update_smtp_setting'])->name('update_smtp_setting')->middleware('AdminIsLoggedIn');
        Route::get('/website_setting', [Admin::class, 'website_setting'])->name('website_setting')->middleware('AdminIsLoggedIn');
        Route::post('/update_general_settings', [Admin::class, 'update_general_settings'])->name('update_general_settings')->middleware('AdminIsLoggedIn');


        Route::post('/update_course', [Admin::class, 'update_course'])->name('update_course')->middleware('AdminIsLoggedIn');
        Route::get('/Course_list', [Admin::class, 'Course_list'])->name('Course_list')->middleware('AdminIsLoggedIn');
        Route::post('/save_course', [Admin::class, 'save_course'])->name('save_course')->middleware('AdminIsLoggedIn');
        Route::get('/Delete_course', [Admin::class, 'Delete_course'])->name('Delete_course')->middleware('AdminIsLoggedIn');
        Route::get('/edit_courses', [Admin::class, 'edit_courses'])->name('edit_courses')->middleware('AdminIsLoggedIn');
        Route::get('/change_password', [Admin::class, 'change_password'])->name('change_password')->middleware('AdminIsLoggedIn');
        Route::post('/update_password', [Admin::class, 'update_password'])->name('update_password')->middleware('AdminIsLoggedIn');
        Route::get('/social_lite_login', [Admin::class, 'social_lite_login'])->name('social_lite_login');
        Route::post('/update_social_login_settings', [Admin::class, 'update_social_login_settings'])->name('update_social_login_settings')->middleware('AdminIsLoggedIn');
        Route::get('payment_gateway', [Admin::class, 'list'])->middleware('AdminIsLoggedIn');
        Route::get('payment_gateway/edit/{id}', [Admin::class, 'edit'])->middleware('AdminIsLoggedIn');
        Route::post('paypal', [Admin::class, 'paypal'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/stripe', [Admin::class, 'stripe'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/razorpay', [Admin::class, 'razorpay'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/paystack', [Admin::class, 'paystack'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/instamojo', [Admin::class, 'instamojo'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/payu', [Admin::class, 'payu'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/mollie', [Admin::class, 'mollie'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/flutterwave', [Admin::class, 'flutterwave'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/paytm', [Admin::class, 'paytm'])->middleware('AdminIsLoggedIn');
        Route::post('payment_gateway/cashfree', [Admin::class, 'cashfree'])->middleware('AdminIsLoggedIn');
        Route::get('pages', [Pages::class, 'pages_list'])->middleware('AdminIsLoggedIn');
        Route::get('add', [Pages::class, 'add'])->middleware('AdminIsLoggedIn');
        Route::get('edit/{id}', [Pages::class, 'edit'])->middleware('AdminIsLoggedIn');
        Route::post('pages/add_edit', [Pages::class, 'addnew'])->middleware('AdminIsLoggedIn');
        Route::delete('pages/delete/{id}', [Pages::class, 'delete'])->middleware('AdminIsLoggedIn');
        Route::post('pages/bulk_delete', [Pages::class, 'bulkDelete'])->middleware('AdminIsLoggedIn');


        Route::get('users', [Admin::class, 'users'])->name('users')->middleware('AdminIsLoggedIn');

        Route::get('user/edit/{id}', [Admin::class, 'edit_user'])->name('edit_user')->middleware('AdminIsLoggedIn');
        Route::post('update_user', [Admin::class, 'update_user'])->name('update_user')->middleware('AdminIsLoggedIn');

        Route::get('add_user', [Admin::class, 'add_user'])->middleware('AdminIsLoggedIn');
        Route::post('save_user', [Admin::class, 'save_user'])->middleware('AdminIsLoggedIn');

        Route::get('user/delete_user/{id}', [Admin::class, 'delete_user'])->middleware('AdminIsLoggedIn');
        Route::post('user/bulk_delete', [Admin::class, 'bulkDelete'])->name('user.bulkDelete');
        Route::get('shopkeepers', [Admin::class, 'shopkeepers'])->name('shopkeepers')->middleware('AdminIsLoggedIn');
        Route::get('shopkeeper/edit/{id}', [Admin::class, 'edit_shopkeeper'])->name('edit_shopkeeper')->middleware('AdminIsLoggedIn');
        Route::post('update_shopkeeper', [Admin::class, 'update_shopkeeper'])->name('update_shopkeeper');

        Route::get('add_shopkeeper', [Admin::class, 'add_shopkeeper'])->middleware('AdminIsLoggedIn');
        Route::post('save_shopkeeper', [Admin::class, 'save_shopkeeper'])->middleware('AdminIsLoggedIn');

        Route::get('shopkeeper/delete_shopkeeper/{id}', [Admin::class, 'delete_shopkeeper'])->middleware('AdminIsLoggedIn');

        Route::name('mail-templates.')->prefix('mail-templates')->group(function () {
            Route::get('/', [MailTemplateController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
            Route::get('add', [MailTemplateController::class, 'add'])->name('add')->middleware('AdminIsLoggedIn');
            Route::post('save', [MailTemplateController::class, 'save'])->name('save');
            Route::get('edit/{id}', [MailTemplateController::class, 'edit'])->name('edit')->middleware('AdminIsLoggedIn');
            Route::post('update/{id}', [MailTemplateController::class, 'update'])->name('update');
            Route::post('bulk-delete', [MailTemplateController::class, 'bulkDelete'])->middleware('AdminIsLoggedIn');
        });
        Route::get('email-application', [EmailAppController::class, 'index'])->name('index')->middleware('AdminIsLoggedIn');
        Route::post('sendMessage', [EmailAppController::class, 'sendMessage'])->name('sendMessage');
        Route::post('sendMail/{id}', [EmailAppController::class, 'sendMail'])->name('sendMail');
        Route::get('email-compose', [EmailAppController::class, 'compose'])->name('compose')->middleware('AdminIsLoggedIn');
        Route::get('/balance', [FundController::class, 'balance'])->name('balance')->middleware('AdminIsLoggedIn');
        Route::get('/withdraws', [FundController::class, 'withdraws'])->name('withdraws')->middleware('AdminIsLoggedIn');
        Route::get('add_balance', [FundController::class, 'add_balance'])->middleware('AdminIsLoggedIn');
        Route::get('edit_balance/{id}', [FundController::class, 'edit_balance'])->middleware('AdminIsLoggedIn');
        Route::post('save_balance', [FundController::class, 'save_balance'])->middleware('AdminIsLoggedIn');
        Route::post('update_balance', [FundController::class, 'update_balance'])->middleware('AdminIsLoggedIn');
        Route::get('delete_balance/{id}', [FundController::class, 'delete_balance'])->middleware('AdminIsLoggedIn');
        Route::post('/deposit', [FundController::class, 'deposit']);
        Route::get('/withdraws', [Admin::class, 'withdraws'])->name('withdraws')->middleware('AdminIsLoggedIn');
        Route::patch('/withdrawals/{id}', [Admin::class, 'updateStatus'])->name('withdrawals.update');
        Route::post('/withdraw', [FundController::class, 'withdraw']);
        Route::get('/transactions_report', [Admin::class, 'transactions_report'])->name('transactions_report')->middleware('AdminIsLoggedIn');
        Route::get('accept/{id}', [Admin::class, 'accept'])->name('accept');
    });
    Route::get('/forget_password', [Admin::class, 'forget_password'])->name('forget_password');
    Route::post('/log', [Admin::class, 'login'])->name('login');
    Route::get('/signout', [Admin::class, 'logout'])->name('logout');
});
Route::get('facebook', [FacebookSocialiteController::class, 'facebookRedirect']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'loginWithFacebook']);
Route::get('google', [GoogleController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleController::class, 'handleGoogleCallback']);
