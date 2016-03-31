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

    /**
     * Scope a query to its latest order
     *
     * @param $query
     *
     * @return mixed
     */
    public static function scopeLatest($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Format price to a specific pattern
     *
     * @param $price
     *
     * @return string
     */
    public function formatPrice($price)
    {
        return sprintf("%.2f￥", $this->{$price});
    }
}
