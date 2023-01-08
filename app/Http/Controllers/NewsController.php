<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews() {
        return view('admin.dashboard.news.add-news', [
            'categories'    =>  Category::all(),
            'tags'          =>  Tag::all(),
            'users'         =>  User::all(),
        ]);
    }

    public function saveNews(Request $request) {
        News::saveNewNews($request);

        return redirect('/news/add-news')->with('message', 'New news successfully added.');
    }

    public function manageNews() {
        //
    }

    public function allNews() {
        //
    }
}
