<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Exception;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // show/read categories data
    public function category_index(Request $request){
        $data = categories::all();

        $response = [
            'seccess' => true,
            'message' => 'categories data',
            'data'=> $data
        ];

        if($data){
            return response($response, 200);
        } else {
            return response($response, 404);
        }
    }


    // function for create/posts categories data
    public function create_category(Request $request){
        try{
            // categories data validaton
            // $data = categories::make($request->all(),[
            //     'category'=> 'required | string', // must required, can't be null
            // ]);
            $request -> validate([
                'category'=> 'required',
            ]);
            $data = categories::create([
                'category'=> $request->category,
            ]);

            $response = [
                'success' => true,
                'message'=> 'category has been created',
                'data'=> $data
            ];

            if($data){
                return response($response,200);
            } else{
                return response($response, 404);
            }   
        }catch(Exception $e){
            return response()-> json($e->getMessage())->setStatusCode(500);
        }
    }

    public function category_update(Request $request, $id){
        $categories = categories::find($id);

        $categories -> update([
            'category' => $request->category
        ]);

        $response = [
            'success'=> true,
            'message'=> 'category in categories has been updated',
            'data'=> $categories
        ] ;

        if($categories){
            return response($response,200);
        } else{
            return response($response, 404);
        }   
    }

    public function category_delete($id){
        // $categories = categories::find($id);
        $categories = categories::where('id', '=', $id)->get();
        dd($categories);
        $categories -> delete();

        $response = [
            'success'=> true,
            'message'=> 'category in categories has been deleted',
            'data'=> $categories
        ] ;

        if($categories){
            return response($response,200);
        } else{
            return response($response, 404);
        }  
    }

    public function show_category($id){
        // $data = categories::find($request->name);
        $data = categories::where('id', '=', $id)->get();

        $response = [
            'success'=> true,
            'message'=> "category by id, if the category doesn't exist it means null",
            'data'=> $data
        ] ;

        if($data){
            return response($response,200);
        } else{
            return response($response, 404);
        }  

    }
}
