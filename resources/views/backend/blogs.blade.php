@extends('backend.layout.master')
@section('title')
@endsection
@section('style')
@endsection
@section('content')
    <h1 class="h3 mb-4 text-grey-800">Blogs</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Blogs</h6>
            <a href="{{ url('/CreateBlog') }}" class="btn btn-info float-right" > <span class="fa fa-plus-circle"></span> Add
                Blog</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="blogs">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>User</th>
                        <th>Category</th>
                        {{--  <th>Tags</th>  --}}
                        <th>SHort Description</th>
                        <th> Status</th>

                        {{--  <th>Created At</th>  --}}
                        {{--  <th>Updated At</th>  --}}
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
@endsection
                {{--  Scripts section  --}}
@section('scripts')
    <script src={{ asset('backend/partials/blogs.js') }}></script>


@endsection
