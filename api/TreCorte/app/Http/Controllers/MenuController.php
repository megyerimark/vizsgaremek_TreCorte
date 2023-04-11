<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\Category;

use Validator;
class MenuController extends BaseController
{

    public function index()
    {
        $menus = Menu::all();
        return $menus;
    }

    public function create( Request $request){
        $input = $request->all();
        $input["category_id"] = Category::where('name', $input['category_id'])->first()->id;

        $validator = Validator::make($input, [
            "name"=>"required",
            "image"=>"required",
            "description"=>"required",
            "category_id"=>"required",
            "price"=>"required",
        ]);




       if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            return $this->sendResponse(  new MenuResource( $menu ), "Sikeres felvétel");
        }
            $name = $request->file("image")->getClientOriginalName();

            $path = $request->file('image')->storeAs('public/images');
            $input["image"] = $name;
            $input= Menu::create($input);


    }



    public function update(Request $request,  $id)
    {

        $input = $request->all();
        $validator = Validator::make( $input , [
         "name"=>"required",
         "description" =>"required",
         "price"=>'required',
        //  "image"=>'required'

        ]);


        if ($validator->fails() ){
         return $this->sendError( $validator->errors() );
      }


      //$image = $menus->image;

    //   if($request->hasFile('image')){
    //     Storage::delete($menus->image);
    //   $image = $request->file("image")->store('public/images', $name);
    //   }
    //   $menu->update([
    //       "name"=> $request->name,
    //       "description"=> $request->description,
    //       "price"=>$request->price,
        //    "image"=>$image
    //]);


    $menus = Menu::find($id);
    $menus->update($request->all());
    return $this->sendResponse(  new MenuResource( $menus ), "Frissítve");


    }









    public function destroy(Request $request ,$id){
        $menu = Menu::find($id);
        $menu->delete();

        return response()->json(['message' => 'Menü törölve.']);
    }




}
