@extends('admin.dashboard.master')

@section('title')
    Manage News
@endsection

@section('main-content')

    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-center mt-5 mb-3 text-gray-800">Manage News</h1>
            @if(session('message'))
                <h5 class="text-center text-success pb-2">{{ session('message') }}</h5>
            @endif
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage News</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.L No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Featured Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.L No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Featured Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($sum = 1)
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $sum++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->tags->name }}</td>
                                    <td>{{ $item->author->name }}</td>
                                    <td>
                                        <img src="{{ asset($item->featured_image) }}" class="img-fluid" style="width: 80px; height: 50px;" alt="{{ $item->title }} News"/>
                                    </td>
                                    <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 0.30rem;">
                                            <a href="{{ route('news.change-status', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">{{ $item->status == 0 ? 'Active' : 'Inactive' }}</a>
                                            <a href="{{ route('news.update', ['id' => $item->id]) }}" class="btn btn-sm btn-success">Update</a>
                                            <form action="{{ route('category.delete', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are your sure to delete this news?')">Delete</button>
                                            </form>
                                        </div>
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
