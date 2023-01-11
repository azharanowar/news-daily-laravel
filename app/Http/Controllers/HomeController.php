<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $category, $tag, $news;
    public function index() {
        return view('frontEnd.pages.index', [
            'slider_news'       =>  News::where('display_slider', 1)->where('status', 1)->take(5)->orderBy('id', 'desc')->get(),
            'home_categories'   =>  Category::where('featured_home', 1)->where('status', 1)->take(4)->orderBy('id', 'desc')->get(),
        ]);
    }

    public function allNews() {
        return view('frontEnd.pages.all-news', [
            'all_news'   =>  News::where('status', 1)->orderBy('id', 'desc')->get(),
        ]);
    }

    public function categoryArchive($slug) {
        $this->category = Category::where('slug', $slug)->first();

        return view('frontEnd.category.index', [
            'category'          =>  $this->category,
            'news'              =>  News::where('category_id', $this->category->id)->where('status', 1)->get(),
        ]);
    }

    public function tagArchive($slug) {
        $this->tag = Tag::where('slug', $slug)->first();

        return view('frontEnd.tag.index', [
            'tag'               =>  $this->tag,
            'news'              =>  News::where('tags_id', $this->tag->id)->where('status', 1)->get(),
        ]);
    }

    public function breakingNews() {
        return view('frontEnd.pages.breaking-news');
    }

    public function newsDetails($slug) {
        return view('frontEnd.pages.news-details', [
            'news_details'  =>  News::where('slug', $slug)->first(),
        ]);
    }
}
