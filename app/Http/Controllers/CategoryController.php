<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function addCategory() {
        return view('admin.dashboard.category.add-category');
    }

    public function saveCategory(Request $request) {
        $this->validate($request, [
            'name'   =>  'required',
        ]);

        Category::saveNewCategory($request);

        return back()->with('message', 'New category successfully added.');
    }

    public function manageCategories() {
        return view('admin.dashboard.category.manage-category', [
            'categories'    =>  Category::all(),
        ]);
    }

    public function allCategories() {
        return view('admin.dashboard.category.all-categories', [
            'categories'    =>  Category::all(),
        ]);
    }

    public function changeCategoryStatus($id) {
        Category::changeCategoryStatus($id);

        return back()->with('message', 'Category status successfully updated.');
    }

    public function updateCategory($id) {
        return view('admin.dashboard.category.update-category', [
            'category'    =>  Category::find($id),
        ]);
    }

    public function saveUpdatedCategoryInfo(Request $request, $id) {
        $this->validate($request, [
            'name'   =>  'required',
            'slug'   =>  [
                Rule::unique('categories')->ignore($id)
            ],
        ]);

        Category::saveUpdatedCategoryInfo($request, $id);

        return redirect('/dashboard/category/manage-categories')->with('message', 'Category info successfully updated.');
    }

    public function deleteCategory(Request $request, $id) {
        Category::deleteCategory($id);

        return redirect('/dashboard/category/manage-categories')->with('message', 'Category successfully deleted.');
    }
}
