@extends('backend.layout.master')
@section('title')

@endsection
<style>
    .ck-editor__editable_inline
    {
        height: 200px;
    }
</style>
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
<h1 class="h3 mb-4 text-grey-800">Create Blog



    <a href="{{ url('/Blogs') }}" class="btn btn-dark btn-sm float-right"> Return Blog</a> </h1>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row  justify-content-between">


    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-8">

            <div class="card-body">
                {{--  @if(session()->has('message'))
                <div class="alert alert-success text-center ">{{ session()->get('message') }}</div>
            @endif  --}}
            @if($errors->any())

            <p class="alert alert-warning" data-dismiss="alert" aria-label="close"><strong>Warning ! </strong> lease fill {{ count($errors) }} the mandatory fields</p>

            @endif

            {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $err )

                    <li class="alert alert-danger">{{ $err }}</li>

                @endforeach
            </ul>
            @endif  --}}





                <form action="{{ url('/BlogCreate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="">Title:</label>
                            @error('Title')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <input type="text" name="Title" id="title"  value="{{ old('Title') }}" class="form-control"
                                placeholder="Enter Title">


                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <label for="">URL:</label>
                            @error('Url')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <input type="text" name="Url" id="Url"  value="{{ old('Url') }}"class="form-control"
                                placeholder="URL..">

                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-1">
                            <label for="">Select Category:</label>
                            @error('Category')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <select name="Category" class="form-control" id="Category">
                                <option value="">-Select Category-</option>
                                    @foreach ( $categories as $category)

                                <option value="{{ $category->id }}" {{ old('Category')==$category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                                   {{--  <option  value="{{ $category->id }}" {{ (collect(old('Category'))->contains($category->id)) ? 'selected':''  }}>{{ $category->name }}</option>  --}}
                                @endforeach
                            </select>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-1">
                            <label for="">Select Tags:</label>
                            @error('Tags')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <select  class="Tagsselection form-control" name="Tags[]" id="tags"multiple value="">
                                @foreach ( $tags as $tag)
                         {{--  <option  value="{{ $tag->id }}" @if(old('Tags')) {{ in_array($tag->id,old('Tags')) ? 'selected' : '' }} @endif >{{ $tag->name }}</option>  --}}

                                <option value="{{$tag->id}}" {{in_array($tag->id, old("Tags") ?: []) ? "selected" : ""}}>{{$tag->name}}</option>
                                @endforeach

                              </select>

                        </div>


                    </div>
                    <div class="form-row">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-1">
                            <label for="">Select Image:</label>
                            @error('Image')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <input type="file" name="Image" id="Image" class="form-control-file"  value="">

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mt-1">
                            <label for="">img alternate:</label>
                            @error('Image_alt')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <input type="text" name="Image_alt" id="Image_alt" value="{{ old('Image_alt') }}" placeholder="alternate Image.."
                                value="" class="form-control">

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1">
                            <label for="">Meta:</label>
                            @error('Meta')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                            <input type="text" name="Meta" id="Meta" placeholder=" Meta.."   value="{{ old('Meta') }}" class="form-control">

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1">
                            <label for="">Short Description:</label>
                            @error('Short_description')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                      <textarea name="Short_description" id="Short_description" value=""class="form-control" rows="2" placeholder="Short description here..">{{ old('Short_description') }}</textarea>

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-1">
                            <label for=""> Description:</label>
                            @error('description')
                            <span class="text text-danger">{{ $message }}</span>
                             @enderror
                      <textarea name="description" id="description" class="form-control" value="" placeholder=" Enter Your description here..">{{ old('description') }}</textarea>

                        </div>

                    </div>
                    <div class="form-check mb-2 mt-2">

                         <input type="checkbox" class="form-check-input" checked name="Active" id="">
                         <label for="" name="active" class="form-check-label">Publish Blog</label>
                    </>
                    <button class="btn btn-Success float-right" type="submit" name=""> Create Blog</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- <script src={{ asset('backend/partials/blog.js') }}></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<script>
    $(".Tagsselection").select2({
        placeholder: "Select a Tag..",
        allowClear: true
    });
    ClassicEditor
                .create( document.querySelector( '#description' ) )
                .catch( error => {
                    console.error( error );
                } );



</script>
<script>
     //swal alert
     var success = "{{ session('message') ?? '' }}";
     if(success !== '')
     {
         swal.fire({

             icon: 'success',
             title: 'Success',
             'text':'Blog Created Successfully'
         });
     }
</script>

@endsection
