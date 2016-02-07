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
     * Parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

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
     * See if this category has a parent category
     *
     * @return bool
     */
    public function hasParent()
    {
        return $this->parent_id != 0;
    }

    /**
     * Get the current category parent's name
     *
     * @return Category
     */
    public function parentName()
    {
        return $this->parent ? $this->parent->name : "无";
    }

    /**
     * The href link for a category
     *
     * @return string
     */
    public function link()
    {
        return action('HomeController@showCategory', ["id" => $this->id]);
    }

    /**
     * The href link for sorting in provide status
     * @return string
     */
    public function provideLink()
    {
        return $this->link() . '/provide';
    }

    /**
     * The href link for sorting in demand status
     * @return string
     */
    public function demandLink()
    {
        return $this->link() . '/demand';
    }

    /**
     * Relationship to its multiple products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * @return mixed
     */
    public function pagedProducts()
    {
        return $this->products()->paginate(35);
    }
}
