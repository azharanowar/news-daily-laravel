<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;
use PharIo\Manifest\Author;

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
        self::$news->featured_image = self::getSavedImageURL($request);
        self::$news->status = $request->status;
        self::$news->save();
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsTo(Tag::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public static function getSavedImageURL($request) {
        self::$image = $request->file('featured_image');
        if (self::$image) {
            self::$imageNewName = rand() . '.' . self::$image->getClientOriginalExtension();
            self::$directory = 'admin/images/news-images/';
            self::$imageURL = self::$directory . self::$imageNewName;
            self::$image->move(self::$directory, self::$imageNewName);

            return self::$imageURL;
        }
    }
}
