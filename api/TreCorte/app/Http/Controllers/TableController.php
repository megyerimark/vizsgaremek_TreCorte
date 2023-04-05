<?php

namespace App\Http\Controllers;

use App\Http\Resources\TableResource;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController as BaseController;
use Validator;

class TableController extends BaseController
{
 
  
    public function index(){
        $tables = Table::all();
        return $tables;
    }


    public function create(Request $request){

        $input = $request->all();

        $validator = Validator::make($input,  [
           "table_name"=>"required",
            "guest_number"=>"required"
        ]);
        if($validator->fails() ){

            return $this->sendError($validator->errors());
    }
    $table= Table::create($input);
   return $this->sendResponse( new TableResource($table), "Sikeres");

    }

    public function update(Request $request ,$id){

        
        $input = $request->all();
        $validator = Validator::make( $input , [
            "table_name"=>"required",
            "guest_number"=>"required"
        ]);
        if ($validator->fails() ){
         return $this->sendError( $validator->errors() );
      }
      $table = Table::find($id);
      $table->update($request->all());
      return $this->sendResponse(  new TableResource( $table ), "Frissítve");
 
    }

    public function destroy($id){

        Table::destroy($id);
        return $this->sendResponse( [], "Törölve");
    }
}

