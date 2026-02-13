<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashBoardController;
use App\Http\Controllers\admin\PricePlanController;
use App\Http\Controllers\admin\TeamMemberController;
use App\Http\Controllers\CustomModelController;
use App\Http\Controllers\frontend\WebsiteController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\WebsiteSettingController;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', fn() => redirect()->route('admin.dashboard'))->name('admin.home');
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('admin.dashboard');

    Route::resource('page', PageController::class);

    Route::controller(CategoryController::class)->prefix('category')->group(function () {
        Route::get('/', 'index')->name('admin.category');
        Route::get('/create', 'create')->name('admin.category.create');
        Route::post('/store', 'store')->name('admin.category.store');
        Route::get('/edit/{id}', 'edit')->name('admin.category.edit');
        Route::put('/update/{id}', 'update')->name('admin.category.update');
        Route::get('/destroy/{id}', 'destroy')->name('admin.category.destroy');
        Route::get('/show/{id}', 'show')->name('admin.category.show');
    });

    Route::controller(BlogController::class)->prefix('blog')->name('admin.blog.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{blog:slug}', 'edit')->name('edit');
        Route::put('/update/{blog}', 'update')->name('update');
        Route::delete('/Destroy/{blog}', 'destroy')->name('destroy');
        Route::get('/show/{blog:slug}', 'show')->name('show');
    });

    Route::resource('tag', TagController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('price-plan', PricePlanController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('team-member', TeamMemberController::class);
    Route::resource('contact', ContactController::class);

    Route::controller(WebsiteSettingController::class)->group(function () {
        Route::get('setting/', 'Setting')->name('setting');
        Route::get('setting/website/', 'website')->name('setting.website');
        Route::post('site/setting/update/{website}', 'SiteSetting')->name('site.update');
        Route::post('color/setting/update/{website}', 'ColorUpdate')->name('color.update');
        Route::post('image/setting/update/{website}', 'ImageSetting')->name('image.update');
        Route::post('seo/setting/update/{website}', 'SeoSetting')->name('seo.update');
        Route::get('setting/mail-setting', 'mailsetting')->name('setting.mail-setting');
        Route::post('setting/mail/update/{MailSetting}', 'mailUpdate')->name('setting.mail.update');
        Route::get('setting/basic-mail', 'BasiMail')->name('setting.basic-mail');
        Route::post('setting/basic-mail/update/{MailSetting}', 'BasiMailUpdate')->name('setting.basic-mail.update');
    });

    Route::controller(WebsiteController::class)->group(function () {
        Route::get('model-create', 'ModelCreate')->name('model-create');
        Route::post('model-store', 'ModelStore')->name('model-store');
    });

    Route::controller(CustomModelController::class)->prefix('create-model')->name('model.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });

    Route::get('clear', function () {
        Artisan::call('optimize:clear');

        return back()->with([
            'message' => 'Application cache cleared successfully.',
            'alert-type' => 'success',
            'data' => 'System',
        ]);
    })->name('admin.clear');
});
