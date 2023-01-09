<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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

        $this->validate($request, [
           'title'            =>  'required',
           'category_id'      =>  'required',
           'tags_id'          =>  'required',
           'author_id'        =>  'required',
           'full_description' =>  'required',
           'featured_image'   =>  [
               'required',
               File::image()
                   ->dimensions(Rule::dimensions()->maxWidth(1280)->maxHeight(700)),
           ],
        ]);

        News::saveNewNews($request);

        return redirect('/news/add-news')->with('message', 'New news successfully added.');
    }

    public function manageNews() {
        //
    }

    public function allNews() {
        return view('admin.dashboard.news.all-news', [
            'news'  =>  News::all(),
        ]);
    }
}
