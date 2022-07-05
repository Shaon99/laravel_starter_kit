<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        $general = GeneralSetting::first();

        View::composer('backend.layout.sidebar', function ($view) {
            $deactiveUser = User::where('status',0)->count();
            $view->with('deactiveUser',  $deactiveUser);
        });


        View::composer('backend.layout.navbar', function ($view) {
            $notifications = auth()->guard('admin')->user()->unreadNotifications;
            $view->with('notifications',  $notifications);
        });

        

        view()->share('general', $general);

        $urlSections = [];

        $jsonUrl = resource_path('views/').'sections.json';

        $urlSections = array_filter(json_decode(file_get_contents($jsonUrl),true));

        $pages = Page::where('name','!=','home')->where('status',1)->get();

        view()->share('pages',$pages);
        view()->share('urlSections',$urlSections);
        view()->share('language_top', Language::latest()->get());

    }

    function removeSpecialChar($str) {

        $res = trim(str_replace( array( '[', ']',
        '\''), '', $str));
        return $res;
        }
}
