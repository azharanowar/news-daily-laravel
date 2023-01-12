<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function makeComment() {
        $news = News::find(2);
//        $news->comment('This is a comment');
        $news->commentAsUser(Auth::user(), 'This is a comment from someone else');


    }
}
