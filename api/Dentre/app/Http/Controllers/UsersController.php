<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Validator;

class UsersController extends Basecontroller
{
    public function userreg(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "confirm_password" => "required|same:password"
        ]);

        if($validator->fails())
        {
            return $this->sendError("Error validation", $validator->errors() );
        }

        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        $success ["name"] = $user->name;
        return $this->sendResponse($success, "Sikeres regisztráció.");

    }
}
