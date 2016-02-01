<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'parent_id', 'name'
    ];

    /**
     * Scope a query with only super categories (That belong to no category)
     *
     * @param $query
     * @return mixed
     */
    public static function scopeSuperCategories($query)
    {
        return $query->where('parent_id', '=', 0);
    }

    /**
     * Get the current category parent's name
     *
     * @return Category
     */
    public function parentName()
    {
        return $this->parent_id ? Category::findOrFail($this->parent_id)->name : "无";
    }
}
