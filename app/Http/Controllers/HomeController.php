<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $category, $news;
    public function index() {
        return view('frontEnd.pages.index');
    }

    public function categoryArchive($slug) {
        $this->category = Category::where('slug', $slug)->first();

        return view('frontEnd.category.index', [
            'category'  =>  $this->category,
            'news'      =>  News::where('category_id', $this->category->id),
        ]);
    }
}
