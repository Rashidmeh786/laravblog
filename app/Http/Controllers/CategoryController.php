<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    public function index()
    {


        return view('backend.categories');
    }

    public function getAllCategories()
    {
            $categories=Category::all();
            return Datatables::of($categories)->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success editCategory btn-sm" id="" data-id="'.$data->id.'"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#" class="btn btn-danger deleteCategory btn-sm" id="getDeleteId"><i class="far fa-trash-alt"></i></button>';
                ;
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }

    public function create(Request $req)
    {


        $validator = Validator::make($req ->all(), [
            "category_name" => "required"
        ]);

        $slug = Str::slug($req->category_name);

        if ($validator->passes()) {

            $category = Category::create([

                'name' => $req->category_name,
                'slug' => $slug
            ]);

            return response()->json(['status' => 200]);
        }
        else
        {
            return response()->json(['errors' =>$validator->errors()]);
        }


    }
             public function getCategory($id)
             {
                  $data=Category::find($id);
                  return response()->json(['data'=>$data]);
        }

        function UpdateCategory( Request $request ,$id)
        {
            $validator = Validator::make($request ->all(), [
                "edit_category_name" => "required"
            ]);

            if($validator->fails())
        {
            return response()->json([

                'errors'=>$validator->errors(),
            ]);
        }
        else
        {
            $category=Category::find($id);
            $category->name = $request->input('edit_category_name');
            $category->slug = Str::slug($request->edit_category_name);

            $category->update();
            return response()->json(['status' => 200]);

        }
        }
                function deleteCategory($id){
                    Category::find($id)->delete();

                    return response()->json(['message'=>'record deleted']);
                }
}
