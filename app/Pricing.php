<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = [
        "category", "min_price", "max_price", "avg_price", "market", "measurement"
    ];

    protected $perPage = 5;

    protected $table = "pricing";

//    /**
//     * Attribute accessor
//     *
//     * @return string
//     */
//    public function getMinPriceAttribute()
//    {
//        return $this->formatPrice($this->attributes['min_price']);
//    }
//
//    /**
//     * Attribute accessor
//     *
//     * @return string
//     */
//    public function getMaxPriceAttribute()
//    {
//        return $this->formatPrice($this->attributes['max_price']);
//    }
//
//    /**
//     * Attribute accessor
//     *
//     * @return string
//     */
//    public function getAvgPriceAttribute()
//    {
//        return $this->formatPrice($this->attributes['avg_price']);
//    }

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
