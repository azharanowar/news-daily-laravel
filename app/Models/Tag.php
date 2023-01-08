<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;
    private static $tag;

    public static function saveNewCategory($request) {
        self::$tag = new Tag();

        self::$tag->name = $request->name;
        self::$tag->slug = Str::slug($request->name);
        self::$tag->description = $request->description;
        self::$tag->status = $request->status;
        self::$tag->save();
    }

    public static function changeTagStatus($id) {

        self::$tag = Tag::find($id);;

        if (self::$tag->status == 0) {
            self::$tag->status = 1;
        } else {
            self::$tag->status = 0;
        }

        self::$tag->save();
    }

    public static function saveUpdatedTagInfo($request, $id) {
        self::$tag = Tag::find($id);

        self::$tag->name = $request->name;
        self::$tag->slug = Str::slug($request->name);
        self::$tag->description = $request->description;
        self::$tag->status = $request->status;
        self::$tag->save();
    }

    public static function deleteTag($id) {
        self::$tag = Tag::find($id);
        self::$tag->delete();
    }
}
