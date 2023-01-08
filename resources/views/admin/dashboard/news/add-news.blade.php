@extends('admin.dashboard.master')

@section('title')
    Add News
@endsection

@section('main-content')
    <section>
        <div class="row px-5 py-4">
            <div class="col-md-10 mx-auto">

                <h2 class="text-center">Add New News</h2>
                @if(session('message'))
                    <h5 class="text-center text-success py-2">{{ session('message') }}</h5>
                @endif

                <form action="{{ route('news.save-news') }}" method="POST" class="form" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title: </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title..." required>
                    </div>
                    <div class="mb-3">
                        <label for="shortDescription" class="form-label">Short Description: </label>
                        <textarea class="form-control" id="shortDescription" name="short_description" rows="3" placeholder="Enter news short description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fullDescription" class="form-label">Full Description: </label>
                        <textarea class="form-control" id="summernote" name="full_description" rows="10" placeholder="News full description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image: </label>
                        <input type="file" class="form-control" id="featuredImage" name="featured_image" style="height: auto;" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Publication Status: </label>
                        <div class="bg-white rounded border py-2 px-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="activeStatus" value="1" checked>
                                <label class="form-check-label" for="activeStatus">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inactiveStatus" value="0">
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
