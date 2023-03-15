<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Reservation;
use App\Http\Resources\ReservationResource;

class ReservationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return $reservations;
    }

    
   

  
    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,  [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "tel_number" =>"required",
            "res_date" => "required",
            "guest_number"=>"required"
        ]);
        if($validator->fails() ){

            return $this->sendError($validator->errors());
    }
    $reservation= Reservation::create($input);
   return $this->sendResponse( new ReservationResource($reservation), "Siker báttya");

    
    }

   
 


    public function update(Request $request, string $id)
    {
        
        $input = $request->all();
        $validator = Validator::make( $input , [
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "tel_number" =>"required",
            "res_date" => "required",
            "guest_number"=>"required"
        ]);
        if ($validator->fails() ){
         return $this->sendError( $validator->errors() );
      }
      $res = Reservation::find($id);
      $res->update($request->all());
      return $this->sendResponse(  new ReservationResource( $res ), "Frissítve");
 
    }

   
    public function destroy(string $id)
    {
        //
    }
}
