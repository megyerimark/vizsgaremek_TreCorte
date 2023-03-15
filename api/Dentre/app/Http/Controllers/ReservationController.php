<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Reservation;
use App\Models\Table;
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
            "name" =>"required",
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

   
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}
