@extends('admin.dashboard.master')

@section('title')
    Manage Tags
@endsection

@section('main-content')

    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-center mt-5 mb-3 text-gray-800">Manage Tags</h1>
            @if(session('message'))
                <h5 class="text-center text-success pb-2">{{ session('message') }}</h5>
            @endif
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Tags</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.L No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.L No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($sum = 1)
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $sum++ }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ substr($tag->description, 0, 80,) }}...</td>
                                    <td>
                                        <p>{{ $tag->status == 1 ? 'Active' : 'Inactive' }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 0.30rem;">
                                            <a href="{{ route('tags.change-status', ['id' => $tag->id]) }}" class="btn btn-sm btn-secondary">{{ $tag->status == 0 ? 'Active' : 'Inactive' }}</a>
                                            <a href="{{ route('tags.update', ['id' => $tag->id]) }}" class="btn btn-sm btn-success">Update</a>
                                            <form action="{{ route('tags.delete', ['id' => $tag->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are your sure to delete this tag?')">Delete</button>
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
