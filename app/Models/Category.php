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
     * Detect if the current category has any sub category
     *
     * @return bool
     */
    public function hasSubCategories()
    {
        $categories = Category::where('parent_id', '=', $this->id)->get();

        return count($categories) ? true : false;
    }

    /**
     * Get all sub categories
     *
     * @return mixed
     */
    public static function allSubCategories()
    {
        return static::where('parent_id', '!=', 0)->get();
    }

    /**
     * Scope a query with its sub categories
     *
     * @param $query
     * @return mixed
     */
    public function scopeSubCategories($query)
    {
        return $query->where('parent_id', '=', $this->id);
    }

    /**
     * Get the sub categories of current category
     *
     * @return mixed
     */
    public function getSubCategories()
    {
        return $this->subCategories()->get();
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
