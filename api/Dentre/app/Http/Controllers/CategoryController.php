<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return $categories;
    }

    public function __invoke(CategoryStoreRequest $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            "name"=>"required",
          "description"=>"required",
          "image"=>"required"
        ]);
    
        if($validator->fails()){
            return $this->sendError($validator, "hiba");
        }
    
        $image = $request->file("image")->store('public/categories');
        $in = Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "image" => $image

        ]);
        return $in;
    }


    
}
