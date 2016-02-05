<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title', 'enterprise_id','contact_name','phone','cellphone','email',
        'release_date','address','category_id','pricing','description','status',
        'is_sticky', 'is_essential'
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

    public static function scopeLatest($query)
    {
        return $query->orderBy('is_sticky', 'desc')->paginate(35);
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

    /**
     * Relationship to the belonged category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Format the status into a readable string
     *
     * @return string
     */
    public function readableStatus()
    {
        switch ($this->status) {
            case "provide":
                $status = "供";
                break;
            default:
                $status = "求";
                break;
        }
        return $status;
    }
}
