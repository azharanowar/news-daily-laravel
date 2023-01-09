@extends('admin.dashboard.master')

@section('title')
    All News
@endsection

@section('main-content')

    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-center mt-5 text-gray-800">All News</h1>
            <p class="text-muted text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolor doloribus, facilis illum ipsam itaque natus nemo porro quae qui, quisquam rem vel veniam.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All News</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>S.L No</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Featured Image</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>S.L No</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Featured Image</th>
                                <th>Status</th>
                                <th>Last Update</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($sum = 1)
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $sum++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ substr($item->short_description, 0, 80) }}...</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->tags->name }}</td>
                                    <td>{{ $item->author->name }}</td>
                                    <td>
                                        <img src="{{ asset($item->featured_image) }}" class="img-fluid" style="width: 80px; height: 50px;" alt="{{ $item->title }} News"/>
                                    </td>
                                    <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $item->updated_at }}</td>
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
