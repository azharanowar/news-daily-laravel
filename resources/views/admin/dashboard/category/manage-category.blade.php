@extends('admin.dashboard.master')

@section('title')
    Manage Category
@endsection

@section('main-content')

    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-center mt-5 mb-3 text-gray-800">Manage Categories</h1>
            @if(session('message'))
                <h5 class="text-center text-success pb-2">{{ session('message') }}</h5>
            @endif
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.L No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.L No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($sum = 1)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $sum++ }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ substr($category->description, 0, 80,) }}...</td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" class="img-fluid" style="width: 50px; height: 50px;" alt="{{ $category->name }} Category"/>
                                    </td>
                                    <td>
                                        <p>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.change-status', ['id' => $category->id]) }}" class="btn btn-sm btn-secondary mb-1">{{ $category->status == 0 ? 'Active' : 'Inactive' }}</a>
                                        <a href="{{ route('category.update', ['id' => $category->id]) }}" class="btn btn-sm btn-info mb-1">Update</a>
                                        <a href="{{ route('category.change-status', ['id' => $category->id]) }}" class="btn btn-sm btn-secondary mb-1">{{ $category->status == 0 ? 'Active' : 'Inactive' }}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
