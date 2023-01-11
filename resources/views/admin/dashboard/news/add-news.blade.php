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
                        <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" id="title" name="title" placeholder="Enter news title...">
                        <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                    </div>
                    <div class="mb-3 py-2">
                        <label for="categoryId" class="form-label">Category: </label>
                        <select class="form-select {{ $errors->has('category_id') ? 'border-danger' : '' }}" id="categoryId" name="category_id" aria-label="Default select example">
                            <option selected disabled>-- Select news category --</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">{!! $errors->has('category_id') ? $errors->first('category_id') . '<br>' : '' !!}</span>

                        <label for="categoryId" class="form-label">Tags: </label>
                        <select class="form-select {{ $errors->has('tags_id') ? 'border-danger' : '' }}" id="categoryId" name="tags_id" aria-label="Default select example">
                            <option selected disabled>-- Select news tags --</option>

                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">{!! $errors->has('tags_id') ? $errors->first('tags_id') . '<br>' : '' !!}</span>

                        <label for="authorId" class="form-label">Author: </label>
                        <select class="form-select {{ $errors->has('author_id') ? 'border-danger' : '' }}" id="authorId" name="author_id" aria-label="Default select example">
                            <option selected disabled>-- Select news author --</option>

                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger">{!! $errors->has('author_id') ? $errors->first('author_id') . '<br>' : '' !!}</span>

                    </div>
                    <div class="mb-3">
                        <label for="shortDescription" class="form-label">Short Description: </label>
                        <textarea class="form-control" id="shortDescription" name="short_description" rows="3" placeholder="Enter news short description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fullDescription" class="form-label">Full Description: </label>
                        <textarea class="form-control {{ $errors->has('full_description') ? 'border-danger' : '' }}" id="summernote" name="full_description" rows="10" placeholder="News full description..."></textarea>
                        <span class="text-danger">{{ $errors->has('full_description') ? $errors->first('full_description') : '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image: </label>
                        <input type="file" class="form-control {{ $errors->has('featured_image') ? 'border-danger' : '' }}" id="featuredImage" name="featured_image" style="height: auto;" accept="image/*">
                        <span class="text-danger">{{ $errors->has('featured_image') ? $errors->first('featured_image') : '' }}</span>
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
                        <label for="" class="form-label">Display: </label>
                        <div class="bg-white rounded border py-2 px-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display_popular" id="displayPopular" value="1">
                                <label class="form-check-label" for="displayPopular">Popular</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display_trending" id="displayTrending" value="1">
                                <label class="form-check-label" for="displayTrending">Trending</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display_breaking" id="displayBreaking" value="1">
                                <label class="form-check-label" for="displayBreaking">Breaking News</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="display_slider" id="displaySlider" value="1">
                                <label class="form-check-label" for="displaySlider">Add to Slider</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Comment Box: </label>
                        <div class="bg-white rounded border py-2 px-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="comment" id="commentEnable" value="1" checked>
                                <label class="form-check-label" for="commentEnable">Enable</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="comment" id="commentDisable" value="0">
                                <label class="form-check-label" for="commentDisable">Disable</label>
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
