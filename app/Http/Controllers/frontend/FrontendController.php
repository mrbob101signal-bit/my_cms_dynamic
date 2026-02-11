<?php

namespace App\Http\Controllers\frontend;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Category;
use App\Models\PricePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('pages.frontend');
    }

    public function about()
    {
        return view('website.about');
    }

    public function blog(Request $request)
    {
        $search = $request->search_keyword;
        $categoryId = $request->get('category');
        $cat = Category::with('blogs')->get();
        $category = Category::all();

        $blog = Blog::query()
            ->with('category')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($innerQuery) use ($search) {
                    $innerQuery
                        ->where('title', 'like', "%{$search}%")
                        ->orWhere('tags', 'like', "%{$search}%");
                });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('cat_id', $categoryId);
            })
            ->simplePaginate(6);

        return view('website.blog.blog', compact('cat', 'category', 'blog'));
    }


    public function blogDetails(Blog $blog)
    {
        $blogList = Blog::inRandomOrder()->latest()->take(4)->get();
        $category = Category::all();
        return view('website.blog.blog-details', compact('category', 'blog', 'blogList'));
    }

    public function gallery()
    {
        $categoryList = Category::with('gallery')->get();
        $gallery = Gallery::with('category')->get();

        return view('website.gallery', compact('categoryList', 'gallery'));
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function service(Request $request)
    {
        $category = Category::with('services')->get();
        $search = $request->search_keyword;
        $serviceId = $request->get('service');

        $serviceList = Service::query()
            ->with('category')
            ->when(!$serviceId && $search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when($serviceId, function ($query) use ($serviceId) {
                $query->where('cat_id', $serviceId);
            })
            ->get();

        return view('website.service.service', compact('serviceList', 'category'));
    }

    public function serviceCategory(string $slug)
    {
        $category = Category::with('services')->get();

        $serviceList = Service::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug)->where('type', 'service');
        })->with('category')->get();

        return view('website.service.service', compact('serviceList', 'category'));
    }

    public function ServiceDetails(Service $service)
    {
        $pricePlan = PricePlan::all();
        $category = Category::all();
        $serviceList = Service::with('category')->get();

        return view('website.service.service-details', compact('service', 'pricePlan', 'category', 'serviceList'));
    }


    public function PrivacyPolicy()
    {
        return view('website.privacy-policy');
    }

    public function TermsCondition()
    {
        return view('website.terms-and-conditions');
    }

    public function MailSend(Request $request)
    {
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('website.contact-us');
    }
}
