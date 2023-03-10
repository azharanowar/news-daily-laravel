@extends('admin.dashboard.master')

@section('title')
    All Tags
@endsection

@section('main-content')

    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-center mt-5 text-gray-800">All Tags</h1>
            <p class="text-muted text-center mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque dolor doloribus, facilis illum ipsam itaque natus nemo porro quae qui, quisquam rem vel veniam.</p>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Tags</h6>
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
                                    <th>Last Update</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>S.L No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Last Update</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @php($sum = 1)
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $sum++ }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ substr($tag->description, 0, 80,) }}</td>
                                    <td>{{ $tag->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $tag->updated_at }}</td>
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
