<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {

        return view('backend.blogs');
    }

    function CreateBlogView()
    {
        $categories=Category::all();
        $tags=Tag::all();
        return view('backend.CreateBlog',compact('categories','tags'));
    }

    public function getAllBlogs()
    {
        $Blogs=Blog::all();

        //$Blogs=Blog::where('active','1')->get();


        // return Datatables::of($Blogs)->addColumn('Actions', function($data) {
        //     return '<button type="button" class="btn btn-success editTag btn-sm" id="" data-id="'.$data->id.'"><i class="fas fa-pencil-alt"></i></button>
        //     <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#" class="btn btn-danger deleteTag btn-sm" id="getDeleteId"><i class="far fa-trash-alt"></i></button>';

        // })
        // ->rawColumns(['Actions'])
        // ->make(true);

        return Datatables::of($Blogs)

        ->editColumn('image', function ($img) {
            $url=asset("images/blogImages/$img->image");
            return '<img src="'.$url.'" border="0" width="70" class="img-thumbnail rounded" align="center" />';
        })
        ->editColumn('user_id', function($blog) {
            return '<span class="badge badge-primary">'.$blog->user->name.'</span>'; //one to many

        })
        ->editColumn('category_id', function($category) {

            return '<span class="badge  badge-success">'.$category->category->name.'</span>';
         })
         ->editColumn('short_description', function($blog){

            return Str::words($blog->short_description, 10, '...');
         })

    // ->addColumn('id', function (Blog $blog) {
    //     return $blog->tags->map(function($tag) {
    //         return '<span class="badge  badge-success">'.$tag->name.'</span>';   //for many to many
    //     })->implode('&nbsp;');
    // })     OR


    // ->addColumn('id', function ($blog) {
    //     return implode('&nbsp ', $blog->tags->pluck('name')->toArray());   //  for tags   many to many

    // })
    ->editColumn('active', function($blog) {
        if($blog->active=='1')
        {
        return '<span class="badge badge-success badge-pills">Approved</span>';

        }
        else
        {
        return '<span class="badge badge-dark badge-pills">Pending</span>';

        }
     })

    ->addColumn('Actions', function($data) {
        return '<button type="button" class="btn btn-success editblog btn-sm" id="" data-id="'.$data->id.'"><i class="fas fa-pencil-alt"></i></button>
        <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#" class="btn btn-danger deleteblog btn-sm" id=""><i class="far fa-trash-alt"></i></button>';

    })
        ->rawColumns(['user_id','category_id','Actions','id','image','active'])
        ->make(true);
    }

    function Create(Request $request)
    {
        $user=Auth::User();
     //  dd($request->all());
     $active= $request->Active == 'on' ? '1' : '0';


       $validate= $request->validate([
                "Title"=>"required",
                "Url"=>"required :unique:blogs",
                "Category"=>"required",
                "Tags"=>"required",
                'Image'=>"required|image|max:7048",
                "Image_alt"=>"required",
                "Meta"=>"required",
                "Short_description"=>"required",
                "description"=>"required",
                "Active"=>"required",
            ]);


            $uploadedImage=$request->file('Image');
            $my_image=rand().".". $uploadedImage->getClientOriginalExtension();
            $uploadedImage->move(public_path('/images/blogImages'),$my_image);

           $blog= Blog::create([
                "user_id"=>$user->id,
                "category_id"=>$request->Category,
                "title"=>$request->Title,
                "url"=>$request->Url,
                "image"=>$my_image,
                "image_alt"=>$request->Image_alt,
                "meta"=>$request->Meta,
                "short_description"=>$request->Short_description,
                "description"=>$request->description,
                "active"=>$active,
            ]);
            $blog->tags()->attach($request->Tags);
          return redirect()->back()->with('message','Blog Created successfully');

    }
}
