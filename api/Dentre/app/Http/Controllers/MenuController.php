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

        $memn = Menu::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            

        ]);
        return $memn;

    }
    public function update(Request $request, string $id)
    {
       
 
        $input = $request->all();
        $validator = Validator::make( $input , [
         "name"=>"required",
         "price"=>"required",
         "description" =>"required"
 
        ]);
        if ($validator->fails() ){
         return $this->sendError( $validator->errors() );
      }
      $menu = Menu::find($id);
      $menu->update($request->all());
      return $this->sendResponse(  new MenuResource( $menu ), "Frissítve");
 
    }

   public function destroy(string $id)
    {
        Menu::destroy($id);
        return $this->sendResponse( [], "Törölve");
    }
}
