@extends('admin.dashboard.master')

@section('title')
    Add Category
@endsection

@section('main-content')
    <section>
        <div class="row px-5 py-4">
            <div class="col-md-10 mx-auto">

                <h2 class="text-center">Add New Category</h2>

                <form action="{{ route('category.save-category') }}" method="POST" class="form" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name..." autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="image" style="height: auto;" name="image" required accept="image/*">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Save Category</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
