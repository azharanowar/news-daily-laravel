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
            'categories'    =>  Category::where('status', 1)->get(),
            'tags'          =>  Tag::where('status', 1)->get(),
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

        return redirect('/dashboard/news/add-news')->with('message', 'New news successfully added.');
    }

    public function allNews() {
        return view('admin.dashboard.news.all-news', [
            'news'  =>  News::all(),
        ]);
    }

    public function manageNews() {
        return view('admin.dashboard.news.manage-news', [
            'news'  =>  News::all(),
        ]);
    }

    public function changeNewsStatus($id) {
        News::changeNewsStatus($id);

        return back()->with('message', 'News status successfully changed.');
    }

    public function updateNews($id) {
        return view('admin.dashboard.news.update-news', [
            'single_news'   =>  News::find($id),
            'categories'    =>  Category::where('status', 1)->get(),
            'tags'          =>  Tag::where('status', 1)->get(),
            'users'         =>  User::all(),
        ]);
    }

    public function saveUpdatedNewsInfo(Request $request, $id) {

        $this->validate($request, [
           'title'      =>  'required',
           'slug'       =>  [
               Rule::unique('news')->ignore($id)
           ],
           'category_id'        =>  'required',
           'tags_id'            =>  'required',
           'author_id'          =>  'required',
           'full_description'   =>  'required',
           'featured_image'     =>  [
               $this->isUpdateFeaturedImageRequired($id),
               File::image()
                   ->dimensions(Rule::dimensions()->maxWidth(1280)->maxHeight(700)),
           ]
        ]);

        News::saveUpdatedCategoryInfo($request, $id);

        return redirect('/dashboard/news/manage-news')->with('message', 'News info successfully updated.');
    }

    public function isUpdateFeaturedImageRequired($id) {
        $news = News::find($id);
        if ( ! file_exists($news->featured_image )) {
            return 'required';
        } else {
            return '';
        }
    }
}
