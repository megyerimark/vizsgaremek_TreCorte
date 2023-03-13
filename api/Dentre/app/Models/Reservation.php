<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [

        "first_name",
        "last_name",
        "email",
        "res_date",
        "tel_number",
        "guest_number",
         "table_id"
    ];

    protected $dates = [
        "res_date"

    ];
}
