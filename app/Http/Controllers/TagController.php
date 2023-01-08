<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function addTag() {
        return view('admin.dashboard.tag.add-tag');
    }

    public function saveTag(Request $request) {
        Tag::saveNewCategory($request);

        return back()->with('message', 'New tag successfully added.');
    }

    public function manageTags() {
        return view('admin.dashboard.tag.manage-tags', [
            'tags'    =>  Tag::all(),
        ]);
    }
    public function allTags() {
        return view('admin.dashboard.tag.all-tags', [
            'tags'    =>  Tag::all(),
        ]);
    }

//    public function changeTagStatus($id) {
//        Category::changeCategoryStatus($id);
//
//        return back()->with('message', 'Tag status successfully updated.');
//    }
//
//    public function updateTag($id) {
//        return view('admin.dashboard.category.update-category', [
//            'category'    =>  Tags::find($id),
//        ]);
//    }
//
//    public function saveUpdatedTagInfo(Request $request, $id) {
//        Tags::saveUpdatedCategoryInfo($request, $id);
//
//        return redirect('/category/manage-categories')->with('message', 'Category status successfully updated.');
//    }
//
//    public function deleteCategory(Request $request, $id) {
//        Tags::deleteCategory($id);
//
//        return redirect('/category/manage-categories')->with('message', 'Category successfully deleted.');
//    }
}
