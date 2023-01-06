@extends('admin.dashboard.master')

@section('title')
    Dashboard
@endsection

@section('main-content')
    <section>
        <div class="row px-5 py-4">
            <div class="col-md-10">
                <form action="{{ route('news.save-news') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter news title..." autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="shortDescription" class="form-label">Short Description</label>
                        <textarea class="form-control" id="shortDescription" name="short_description" placeholder="Enter news short description..."></textarea>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
