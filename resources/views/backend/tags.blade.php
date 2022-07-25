@extends('backend.layout.master')
@section('title')
@endsection
@section('style')
@endsection
@section('content')
    <h1 class="h3 mb-4 text-grey-800">Tags</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row  justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            <a href="" class="btn btn-info float-right" data-toggle="modal" data-target="#addTagModal"> <span class="fa fa-plus-circle"></span> Add
                Tags</a>

        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="tags">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>



                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
    @include('backend.partials.tagModal')
@endsection
@section('scripts')
    <script src={{ asset('backend/partials/tag.js') }}></script>


@endsection
