<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function addTag() {
        return view('admin.dashboard.tag.add-tag');
    }

    public function saveTag(Request $request) {
        $request->slug = Str::slug($request->name);
        $this->validate($request, [
           'name'   =>  'required|unique:tags,name',
        ]);

        Tag::saveNewCategory($request);

        return redirect('/dashboard/tags/add-tag')->with('message', 'New tag successfully added.');
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

    public function changeTagStatus($id) {
        Tag::changeTagStatus($id);

        return back()->with('message', 'Tag status successfully updated.');
    }

    public function updateTag($id) {
        return view('admin.dashboard.tag.update-tag', [
            'tag'    =>  Tag::find($id),
        ]);
    }

    public function saveUpdatedTagInfo(Request $request, $id) {
        $this->validate($request, [
           'name'   =>  [
               'required',
               Rule::unique('tags')->ignore($id),
           ],
           'slug'   =>  [
               Rule::unique('tags')->ignore($id),
           ]
        ]);

        Tag::saveUpdatedTagInfo($request, $id);

        return redirect('/dashboard/tags/manage-tags')->with('message', 'Tag info successfully updated.');
    }

    public function deleteTag(Request $request, $id) {
        Tag::deleteTag($id);

        return redirect('/dashboard/tags/manage-tags')->with('message', 'Tag successfully deleted.');
    }
}
