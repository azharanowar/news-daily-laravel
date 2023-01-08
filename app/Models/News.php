<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;

class News extends Model
{
    use HasFactory;
    private static $news, $image, $imageNewName, $directory, $imageURL;

    public static function saveNewNews($request) {
        self::$news = new News();

        self::$news->title = $request->title;
        self::$news->slug = Str::slug($request->title);
        self::$news->category_id = $request->category_id;
        self::$news->tags_id = $request->tags_id;
        self::$news->author_id = $request->author_id;
        self::$news->short_description = $request->short_description;
        self::$news->full_description = $request->full_description;
        self::$news->featured_image = Category::getSavedImageURL($request, 'featured_image');
        self::$news->status = $request->status;
        self::$news->save();
    }
}
