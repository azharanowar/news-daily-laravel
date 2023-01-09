@extends('admin.dashboard.master')

@section('title')
    Update Category
@endsection

@section('main-content')
    <section>
        <div class="row px-5 py-4">
            <div class="col-md-10 mx-auto">

                <h2 class="text-center">Update Category</h2>
                @if(session('message'))
                    <h5 class="text-center text-success py-2">{{ session('message') }}</h5>
                @endif

                <form action="{{ route('category.save-updated-info', ['id' => $category->id]) }}" method="POST" class="form" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" id="name" name="name" value="{{ $category->name }}" placeholder="Enter category name..." autofocus>
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Slug: </label>
                        <input type="text" class="form-control {{ $errors->has('slug') ? 'border-danger' : '' }}" id="slug" name="slug" value="{{ $category->slug }}" placeholder="">
                        <span class="text-danger">{{ $errors->has('slug') ? $errors->first('slug') : '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description...">{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image: </label>
                        <img src="{{ asset($category->image) }}" class="img-fluid" style="width: 120px;" title="Old category image."/>
                        <input type="file" class="form-control" id="image" style="height: auto;" name="image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Publication Status: </label>
                        <div class="bg-white rounded border py-2 px-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="activeStatus" value="1" @if($category->status == 1) checked @endif/>
                                <label class="form-check-label" for="activeStatus">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="0" @if($category->status == 0) checked @endif>
                                <label class="form-check-label" for="inactiveStatus">Inactive</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save Category</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
