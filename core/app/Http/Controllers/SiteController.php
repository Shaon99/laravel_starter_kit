<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use App\Models\SectionData;
use App\Models\Comment;
use App\Models\Page;
use Illuminate\Http\Request;
use App;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        $pageTitle = 'Home';

        $sections = Page::where('name', 'home')->first();

        if (!$sections) {

            $sections = Page::create([
                'name' => 'home',
                'sections' => ['banner'],
                'slug' => 'home',
                'seo_description' => 'home',
                'page_order' => 1
            ]);
        }


        return view('frontend.home', compact('pageTitle', 'sections'));
    }

    public function page(Request $request)
    {

        $page = Page::where('slug', $request->pages)->first();

        if (!$page) {
            abort(404);
        }

        $pageTitle = "{$page->name}";

        return view('frontend.pages', compact('pageTitle', 'page'));
    }


    public function contactSend(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        sendGeneralMail($data);

        $notify[] = ['success', 'Email send successfully'];

        return back()->withNotify($notify);
    }

    public function service($id)
    {
        $pageTitle = "Our Service";
        $data = SectionData::where('key', 'service.element')->where('id', $id)->first();
        return view('frontend.pages.service', compact('pageTitle', 'data'));
    }


    public function changeLang(Request $request)
    {
        App::setLocale($request->lang);

        session()->put('locale', $request->lang);

        return redirect()->back()->with('success',__('Successfully Changed Language'));
    }


    public function allblog()
    {
        $pageTitle = 'Blogs';
        $blogs = SectionData::where('key', 'blog.element')->latest()->paginate(9);
        return view('frontend.pages.blogs', compact('pageTitle','blogs'));
    }

    public function blog($id)
    {        
        $pageTitle = "Blog Details";
        $blog = SectionData::where('key', 'blog.element')->where('id', $id)->first();
        $comments = Comment::with('user')->where('blog_id', $id)->latest()->paginate(8);
        $recentblog = SectionData::where('key', 'blog.element')->where('id','!=',$id)->latest()->limit(8)->paginate();
        return view('frontend.pages.blog_details', compact('pageTitle', 'blog','recentblog','comments'));
    }


    public function blogComment(Request $request, $id)
    {

        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'blog_id' => $id,
            'comment' => $request->comment
        ]);


        return back()->with('success', 'Comment Post Successfully');
    }


    public function memberships(){
        $pageTitle = "Memberships";
        $memberships = Membership::latest()->where('published',1)->paginate(9);
        return view('frontend.pages.memberships', compact('pageTitle', 'memberships'));

    }

    public function privacyPolicy()
    {
        $pageTitle = "Privacy Policy";
        return view('frontend.pages.policy', compact('pageTitle'));
    }



}
