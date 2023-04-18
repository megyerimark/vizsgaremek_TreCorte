<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use DB;
use App\Models\Category;

use Validator;
class MenuController extends BaseController
{

    public function index()
    {

       // $menus = Menu::all();
        $menus = DB::select('SELECT menus.*, categories.name as "elnevez" FROM menus INNER JOIN categories ON categories.id = menus.category_id');
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
            $path = $request->file('image')->storeAs('public/images',$name );
            $input["image"] = $name;
            $input= Menu::create(
                // "name"=>$request->name,
                // "description"=>$request->description,
                // "category_id"=>$request->category_id,
                // "price"=>$request->price,
                // "image"=> $name
                $input
            );
            return $this->sendResponse(  [], "Sikeres felvétel");


    }



    public function update(Request $request, string  $id)
    {

        $input = $request->all();
        $validator = Validator::make( $input , [
         "name"=>"required",
         "description" =>"required",
         "price"=>'required',
         "category_id" =>"required",
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
