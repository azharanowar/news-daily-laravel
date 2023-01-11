<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    private static $category, $categories, $image, $imageNewName, $directory, $imageURL;

    public static function saveNewCategory($request) {
        self::$category = new Category();

        self::$category->name = $request->name;
        self::$category->slug = Str::slug($request->name);
        self::$category->description = $request->description;
        self::$category->image = self::getSavedImageURL($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public function news() {
        return $this->hasMany(News::class);
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

    public static function saveUpdatedCategoryInfo($request, $id) {
        self::$category = Category::find($id);

        if ($request->file('image')) {
            self::deleteExistingImage(self::$category->image);
            self::$image = self::getSavedImageURL($request);
            self::$category->image = self::$image;
        }

        self::$category->name = $request->name;
        self::$category->slug = isset($request->slug) ? Str::slug($request->slug) : Str::slug($request->name);
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function deleteCategory($id) {
        self::$category = Category::find($id);
        self::deleteExistingImage(self::$category->image);
        self::$category->delete();
    }

    public static function getSavedImageURL($request) {
        self::$image = $request->file('image');
        if (self::$image) {
            self::$imageNewName = rand() . '.' . self::$image->getClientOriginalExtension();
            self::$directory = 'admin/images/category-images/';
            self::$imageURL = self::$directory . self::$imageNewName;
            self::$image->move(self::$directory, self::$imageNewName);

            return self::$imageURL;
        }
    }

    public static function deleteExistingImage($image) {
        if (file_exists($image)) {
            unlink($image);
        }
    }
}
