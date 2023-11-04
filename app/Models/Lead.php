<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "mobile",
        "location",
        "message",
        "manufacturer_id",
        "product_id",
        "status"
    ];
}
