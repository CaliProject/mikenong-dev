<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        "category", "min_price", "max_price", "avg_price", "market", "measurement"
    ];

    protected $perPage = 50;

    protected $table = "pricing";
}
