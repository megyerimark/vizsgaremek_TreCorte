<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\MenuResource;
use App\Models\Menu;

use Validator;
class MenuController extends BaseController
{
   
    public function index()
    {
        $menus = Menu::all();
        return $menus;
    }

    public function create( Request $request){

        $menus = Menu::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "image"=>$request->image,
            

        ]);
        if(!$request->hasFile('image') && !$request->file('image')->isValid()){
            return response()->json('{"error":Kérlek tölts fel képet is !"}');
        }
            $name = $request->file("image")->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $name);
        return $menus;

    }
    public function update(Request $request, string $id)
    {
       
        $input = $request->all();
        $validator = Validator::make( $input , [
         "name"=>"required",
         "description" =>"required",
         "price"=>'required'
 
        ]);
        if ($validator->fails() ){
         return $this->sendError( $validator->errors() );
      }
      $menus = Menu::find($id);
      $menus->update($request->all());
      return $this->sendResponse(  new MenuResource( $menus ), "Frissítve");
 
    }

   public function destroy(string $id)
    {
        Menu::destroy($id);
        return $this->sendResponse( [], "Törölve");
    }
}
