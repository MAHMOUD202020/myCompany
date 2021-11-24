<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        $lang = Cookie::get('lang-website') ?? 'ar';

        app()->setLocale($lang);

        define('IS_TRASH' , \request()->segment(2) === 'trash');

        $sections = Category::with(['subCategories' => function($q){
            return $q->customSelect()->sort();
        }])
            ->parentCategories()
            ->sort()
            ->customSelect()
            ->get();

        $contacts = Contact::customSelect()->get();

        $services = Service::customSelect()->get();

        View::share([
            'sections'  => $sections ,
            'contacts'  => $contacts ,
            'services'  => $services ,
        ]);

    }
}
