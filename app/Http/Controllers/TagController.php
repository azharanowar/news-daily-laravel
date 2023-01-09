<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function addTag() {
        return view('admin.dashboard.tag.add-tag');
    }

    public function saveTag(Request $request) {
        $this->validate($request, [
           'name'   =>  'required',
        ]);

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
           'name'   =>  'required',
           'slug'   =>  [
               Rule::unique('tags')->ignore($id),
           ]
        ]);

        Tag::saveUpdatedTagInfo($request, $id);

        return redirect('/tags/manage-tags')->with('message', 'Tag info successfully updated.');
    }

    public function deleteTag(Request $request, $id) {
        Tag::deleteTag($id);

        return redirect('/tags/manage-tags')->with('message', 'Tag successfully deleted.');
    }
}
