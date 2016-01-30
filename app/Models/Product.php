<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title', 'enterprise_id','contact_name','phone','cellphone','email',
        'release_date','address','category_id','pricing','description','status'
    ];
}
