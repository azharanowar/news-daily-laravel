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
        self::$category->image = self::getSavedImageURL($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function getSavedImageURL($request) {
        self::$image = $request->file('image');

        self::$imageNewName = rand() . '.' . self::$image->getClientOriginalExtension();
        self::$directory = 'admin/images/category-images/';
        self::$imageURL = self::$directory . self::$imageNewName;
        self::$image->move(self::$directory, self::$imageNewName);

        return self::$imageURL;
    }

    public static function changeCategoryStatus($id) {

        self::$category = Category::find($id);;

        if (self::$category->status == 0) {
            self::$category->status = 1;
        } else {
            self::$category->status = 0;
        }

        self::$category->save();
    }
}
