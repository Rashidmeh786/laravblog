<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use yajra\Datatables\Datatables;



class TagController extends Controller
{
    public function index()
    {


        return view('backend.tags');
    }

    public function getAllTags()
    {
            $Tags=Tag::all();
            return Datatables::of($Tags)->addColumn('Actions', function($data) {
                return '<button type="button" class="btn btn-success editblog btn-sm" id="" data-id="'.$data->id.'"><i class="fas fa-pencil-alt"></i></button>
                <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#" class="btn btn-danger deleteblog btn-sm" id="getDeleteId"><i class="far fa-trash-alt"></i></button>';
                ;
            })
            ->rawColumns(['Actions'])
            ->make(true);
    }
        //create Tag
    public function create(Request $req)
    {


        $validator = Validator::make($req ->all(), [
            "Tag_name" => "required"
        ]);

        $slug = Str::slug($req->Tag_name);

        if ($validator->passes()) {

            $Tag_name = Tag::create([

                'name' => $req->Tag_name,
                'slug' => $slug
            ]);

            return response()->json(['status' => 200]);
        }
        else
        {
            return response()->json(['errors' =>$validator->errors()]);
        }


    }
             public function getTag($id)
             {
                  $data=Tag::find($id);
                  return response()->json(['data'=>$data]);
        }

        function UpdateTag( Request $request ,$id)
        {
            $validator = Validator::make($request ->all(), [
                "edit_Tag_name" => "required"
            ]);

            if($validator->fails())
        {
            return response()->json([

                'errors'=>$validator->errors(),
            ]);
        }
        else
        {
            $tag=Tag::find($id);
            $tag->name = $request->input('edit_Tag_name');
            $tag->slug = Str::slug($request->edit_Tag_name);

            $tag->update();
            return response()->json(['status' => 200]);

        }
        }
                function deleteTag($id){
                    Tag::find($id)->delete();

                    return response()->json(['message'=>'record deleted']);
                }
}
