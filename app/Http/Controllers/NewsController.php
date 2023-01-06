<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function addNews() {
        return view('admin.dashboard.news.add-news');
    }

    public function manageNews() {
        //
    }

    public function allNews() {
        //
    }
}
