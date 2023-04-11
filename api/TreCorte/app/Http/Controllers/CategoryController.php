<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $input = $request->all();

        $validator = Validator::make($input, [
            "name"=>"required",
            "image"=>"required",
            "description"=>"required",
        ]);


        if(!$request->hasFile('image') && !$request->file('image')->isValid()){
            return $this->sendResponse(  new CategoryResource( $category ), "Sikeres felvétel");
        }
            $name = $request->file("image")->getClientOriginalName();
          $path = $request->file('image')->storeAs('public/images', $name);

          $input = Category::create([
            "name" => $request->name,
            "description" => $request->description,
            "image"=>$name


        ]);

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
public function destroy(Request $request, $id)
{
    $category = Category::find($id);

    // Tárolt kép törlése, ha van
    if(Storage::exists('public/images/'.$category->image)){
        Storage::delete('public/images/'.$category->image);
    }

    $category->delete();

    return response()->json(['message' => 'Kategória törölve.']);
}

}
