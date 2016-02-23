<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        "title", "content"
    ];

    /**
     * Link
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function link()
    {
        return url('pages/' . $this->id);
    }
}
