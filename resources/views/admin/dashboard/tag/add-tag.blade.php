@extends('admin.dashboard.master')

@section('title')
    Add Tags
@endsection

@section('main-content')
    <section>
        <div class="row px-5 py-4">
            <div class="col-md-10 mx-auto">

                <h2 class="text-center">Add New Tag</h2>
                @if(session('message'))
                    <h5 class="text-center text-success py-2">{{ session('message') }}</h5>
                @endif

                <form action="{{ route('tags.save-tag') }}" method="POST" class="form">

                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name: </label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" id="name" name="name" placeholder="Enter category name..." autofocus>
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter category description..."></textarea>
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
