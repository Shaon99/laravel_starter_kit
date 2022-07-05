<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ManageSectionController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


/* ADMIN_ROUTE_START*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetCodeEmail']);
    Route::post('password/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify.code');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');

    Route::middleware('admin')->group(function () {

        Route::get('pendingList', [AdminTicketController::class, 'pendingList'])->name('ticket.pendingList');
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('home');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');
        Route::post('change/password', [AdminController::class, 'changePassword'])->name('change.password');
        Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
        Route::post('general/setting', [GeneralSettingController::class, 'generalSettingUpdate']);
        Route::get('general/analytics', [GeneralSettingController::class, 'analytics'])->name('general.analytics');
        Route::post('general/analytics', [GeneralSettingController::class, 'analyticsUpdate']);
        Route::get('users', [ManageUserController::class, 'index'])->name('user');
        Route::get('users/history/{id}', [ManageUserController::class, 'history'])->name('user.history');
        Route::get('users/details/{user}', [ManageUserController::class, 'userDetails'])->name('user.details');
        Route::post('users/update/{user}', [ManageUserController::class, 'userUpdate'])->name('user.update');
        Route::post('users/mail/{user}', [ManageUserController::class, 'sendUserMail'])->name('user.mail');
        Route::get('users/search', [ManageUserController::class, 'index'])->name('user.search');
        Route::get('users/disabled', [ManageUserController::class, 'disabled'])->name('user.disabled');
        Route::get('user/{status}', [ManageUserController::class, 'userStatusWiseFilter'])->name('user.filter');
        Route::get('user/interest/log', [ManageUserController::class, 'interestLog'])->name('user.interestlog');
        Route::get('general/cookie/consent', [GeneralSettingController::class, 'cookieConsent'])->name('general.cookie');
        Route::post('general/cookie/consent', [GeneralSettingController::class, 'cookieConsentUpdate']);
        Route::get('general/google/recaptcha', [GeneralSettingController::class, 'recaptcha'])->name('general.recaptcha');
        Route::post('general/google/recaptcha', [GeneralSettingController::class, 'recaptchaUpdate']);
        Route::get('general/live/chat', [GeneralSettingController::class, 'liveChat'])->name('general.live.chat');
        Route::post('general/live/chat', [GeneralSettingController::class, 'liveChatUpdate']);
        Route::get('database', [GeneralSettingController::class, 'databaseBackup'])->name('general.database');
        Route::get('cacheclear', [GeneralSettingController::class, 'cacheClear'])->name('general.cacheclear');

        Route::get('email/config', [EmailTemplateController::class, 'emailConfig'])->name('email.config');
        Route::post('email/config', [EmailTemplateController::class, 'emailConfigUpdate']);
        Route::get('email/templates', [EmailTemplateController::class, 'emailTemplates'])->name('email.templates');
        Route::get('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesEdit'])->name('email.templates.edit');
        Route::post('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesUpdate']);
        Route::get('/subscriptions', [PlanController::class, 'subscriptions'])->name('subscription');
        Route::get('language', [LanguageController::class, 'index'])->name('language.index');
        Route::post('language', [LanguageController::class, 'store']);
        Route::post('language/edit/{id}', [LanguageController::class, 'update'])->name('language.edit');
        Route::post('language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
        Route::get('language/translator/{lang}', [LanguageController::class, 'transalate'])->name('language.translator');
        Route::post('language/translator/{lang}', [LanguageController::class, 'transalateUpate']);
        Route::get('language/import', [LanguageController::class, 'import'])->name('language.import');
        Route::get('changeLang', [LanguageController::class, 'changeLang'])->name('changeLang');
        Route::get('subscribers', [HomeController::class, 'subscribers'])->name('subscribers');
        Route::get('pages', [PagesController::class, 'index'])->name('frontend.pages');
        Route::get('pages/create', [PagesController::class, 'pageCreate'])->name('frontend.pages.create');
        Route::post('pages/create', [PagesController::class, 'pageInsert']);
        Route::get('pages/edit/{page}', [PagesController::class, 'pageEdit'])->name('frontend.pages.edit');
        Route::post('pages/edit/{page}', [PagesController::class, 'pageUpdate']);
        Route::get('pages/search', [PagesController::class, 'index'])->name('frontend.search');
        Route::post('pages/delete/{page}', [PagesController::class, 'pageDelete'])->name('frontend.pages.delete');
        Route::get('manage/section', [ManageSectionController::class, 'index'])->name('frontend.section');
        Route::get('manage/section/{name}', [ManageSectionController::class, 'section'])->name('frontend.section.manage');
        Route::post('manage/section/{name}', [ManageSectionController::class, 'sectionContentUpdate']);
        Route::get('manage/element/{name}', [ManageSectionController::class, 'sectionElement'])->name('frontend.element');
        Route::get('manage/element/{name}/search', [ManageSectionController::class, 'section'])->name('frontend.element.search');
        Route::post('manage/element/{name}', [ManageSectionController::class, 'sectionElementCreate']);
        Route::get('edit/{name}/element/{element}', [ManageSectionController::class, 'editElement'])->name('frontend.element.edit');
        Route::post('edit/{name}/element/{element}', [ManageSectionController::class, 'updateElement']);
        Route::post('delete/{name}/element/{element}', [ManageSectionController::class, 'deleteElement'])->name('frontend.element.delete');
        Route::get('/mark-as-read', [HomeController::class, 'markNotification'])->name('markNotification');
        Route::get('send-email', [HomeController::class, 'sendEmail'])->name('sendEmail');
        Route::post('send-email', [HomeController::class, 'sendgroupEmail'])->name('sendgroupEmail');
    });
});

/* ADMIN_ROUTE_END*/


/* USER_ROUTE_START*/

Route::name('user.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('reg_off');
        Route::post('register', [RegisterController::class, 'register'])->middleware('reg_off');
        Route::get('login', [AuthLoginController::class, 'index'])->name('login');
        Route::post('login', [AuthLoginController::class, 'login']);
        Route::get('forgot/password', [AuthForgotPasswordController::class, 'index'])->name('forgot.password');
        Route::post('forgot/password', [AuthForgotPasswordController::class, 'sendVerification']);
        Route::get('verify/code', [AuthForgotPasswordController::class, 'verify'])->name('auth.verify');
        Route::post('verify/code', [AuthForgotPasswordController::class, 'verifyCode']);
        Route::get('reset/password', [AuthForgotPasswordController::class, 'reset'])->name('reset.password');
        Route::post('reset/password', [AuthForgotPasswordController::class, 'resetPassword']);
        Route::get('verify/email', [AuthLoginController::class, 'emailVerify'])->name('email.verify');
        Route::post('verify/email', [AuthLoginController::class, 'emailVerifyConfirm'])->name('email.verify');
    });

    Route::middleware(['auth', 'inactive'])->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [RegisterController::class, 'signOut'])->name('logout');
        Route::get('profile/setting', [UserController::class, 'profile'])->name('profile');
        Route::post('profile/setting', [UserController::class, 'profileUpdate'])->name('profileupdate');
        Route::get('profile/change/password', [UserController::class, 'changePassword'])->name('change.password');
        Route::post('profile/change/password', [UserController::class, 'updatePassword'])->name('update.password');
    });
});

/* USER_ROUTE_END*/




/* FRONTEND_HOME_BASIC_ROUTE_START*/

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('changeLang', [SiteController::class, 'changeLang'])->name('user.changeLang');
Route::post('subscribe', [DashboardController::class, 'subscribe'])->name('subscribe');
Route::post('contact', [SiteController::class, 'contactSend'])->name('contact');
Route::get('{pages}', [SiteController::class, 'page'])->name('pages');
Route::get('service/{id}/{slug}', [SiteController::class, 'service'])->name('service');
Route::get('privacy/policy', [SiteController::class, 'privacyPolicy'])->name('privacy');

/* FRONTEND_HOME-BASIC_ROUTE_END*/
