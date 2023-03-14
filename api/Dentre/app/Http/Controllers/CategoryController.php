<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController as BaseController;

class CategoryController extends BaseController
{
    public function index(){
        $categories = Category::all();

        return $categories;
    }

    public function create(Request $request)
    {
       
    
        $cat = Category::create([
            "name" => $request->name,
            "description" => $request->description,
            

        ]);
        return $cat;
    }
    public function update(Request $request, $id)
    {
       $input = $request->all();
       $validator = Validator::make( $input , [
        "name"=>"required",
        "description" =>"required"

       ]);
       if ($validator->fails() ){
        return $this->sendError( $validator->errors() );
     }
     $category = Category::find($id);
     $category->update($request->all());
     return $this->sendResponse(  new CategoryResource( $category ), "Frissítve");


    
}

public function destroy($id){
    Category::destroy($id);

    return $this->sendResponse( [], "Törölve");
}
}
