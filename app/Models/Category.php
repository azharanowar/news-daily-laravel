<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category, $categories, $image, $imageNewName, $directory, $imageURL;

    public static function saveNewCategory($request) {
        self::$category = new Category();

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = $request->image;
        self::$category->status = $request->status;
        self::$category->save();
    }
}
