<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        "title", "content"
    ];
    
    protected $perPage = 35;

    /**
     * Link
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function link()
    {
        return url('pages/' . $this->id);
    }

    /**
     * Scope its query to latest order
     * 
     * @param $query
     *
     * @return mixed
     */
    public static function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
