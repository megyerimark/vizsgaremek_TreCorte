<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = Admin::all();

        return $users;
    }
}
