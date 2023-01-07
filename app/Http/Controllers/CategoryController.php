<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addCategory() {
        return view('admin.dashboard.category.add-category');
    }

    public function saveCategory(Request $request) {
        Category::saveNewCategory($request);

        return back()->with('message', 'New category added successfully.');
    }

    public function manageCategory() {
        //
    }

    public function allCategories() {
        return view('admin.dashboard.category.all-categories', [
            'categories'    =>  Category::all(),
        ]);
    }
}
