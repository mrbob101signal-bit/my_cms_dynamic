<?php

namespace App\Providers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Category;
use App\Models\PricePlan;
use App\Models\TeamMember;
use App\Models\MailSetting;
use App\Models\Testimonial;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole() || app()->runningUnitTests()) {

            // Services with category
            $serviceCategory = Service::has('category')->with('category')->get();

            // All services
            $service = Service::all();

            // Other models
            $blog = Blog::latest()->take(6)->inRandomOrder()->get();
            $partner = Partner::all();
            $team = TeamMember::all();
            $pricePlan = PricePlan::all();
            $testimonial = Testimonial::all();
            $faq = Faq::all();
            $category = Category::all();
            $totalBlog = Blog::all();
            $categorylist = Category::all();
            $website = WebsiteSetting::first();
            $page = Page::first();
            $mailSetting = MailSetting::first();

            // Configure mail dynamically if exists
            if ($mailSetting) {
                Config::set('mail', [
                    'driver' => $mailSetting->mail_driver,
                    'host' => $mailSetting->mail_host,
                    'port' => $mailSetting->mail_port,
                    'encryption' => $mailSetting->mail_encryption,
                    'username' => $mailSetting->mail_username,
                    'password' => $mailSetting->mail_password,
                    'from' => [
                        'address' => $mailSetting->mail_form_address,
                        'name' => $mailSetting->mail_form_name,
                    ],
                ]);
            }

            // Share data with all views
            View::share([
                'serviceCategory' => $serviceCategory,
                'service' => $service,
                'blog' => $blog,
                'partner' => $partner,
                'team' => $team,
                'pricePlan' => $pricePlan,
                'testimonial' => $testimonial,
                'faq' => $faq,
                'category' => $category,
                'categorylist' => $categorylist,
                'TotalBlog' => $totalBlog,
                'website' => $website,
                'mailSetting' => $mailSetting,
                'page' => $page,
            ]);
        }
    }
}
