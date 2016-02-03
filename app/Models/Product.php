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

    /**
     * Sort products in an alphabetic order
     *
     * @return mixed
     */
    public static function alphabetically()
    {
        return Product::orderBy('title')->paginate(50);
    }

    /**
     * Relationship to the belonged user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
