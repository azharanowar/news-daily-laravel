<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private $category, $categories, $image, $imageNewName, $directory, $imageURL;

    public static function saveNewCategory($request) {
        //
    }
}
