<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'title', 'enterprise_id','contact_name','phone','cellphone','email',
        'release_date','address','category_id','pricing','description','status',
        'is_sticky', 'is_essential', 'taobao'
    ];

    /**
     * Sort products in an alphabetic order
     *
     * @return mixed
     */
    public static function alphabetically()
    {
        return static::orderBy('title')->paginate(50);
    }

    /**
     * Sticky first query scope
     *
     * @param $query
     * @return mixed
     */
    public static function scopeStickyFirst($query)
    {
        return $query->orderBy('is_sticky', 'desc');
    }

    /**
     * Scope a query to the top 5 recently updated products
     *
     * @param $query
     * @return mixed
     */
    public static function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to the newest order
     *
     * @param $query
     * @return mixed
     */
    public function scopeNewest($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }

    /**
     * Scope a query to the top 10 hottest products
     *
     * @param $query
     * @return mixed
     */
    public static function scopeHottest($query)
    {
        return $query->leftJoin('product_views', 'products.id', '=', 'product_views.product_id')
                    ->orderBy('views', 'desc')
                    ->take(10)
                    ->get();
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
     * Sorted categorized products with status
     *
     * @param Category $category
     * @param $status
     * @return mixed
     */
    public static function sortedCategoryAndStatus(Category $category, $status)
    {
        return static::where('category_id', $category->id)
                        ->where('status', $status)
                        ->stickyFirst()
                        ->paginate(35);
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

    /**
     * Post clicked, increment views
     */
    public function clicked()
    {
        if ($this->views) {
            $view = $this->views;
            $view->views = ++$view->views;
            $view->save();
        } else {
            $view = new ProductView;
            $view->views = 1;
            $view->product_id = $this->id;
            $view->save();
        }
    }

    /**
     * Relationship to its views
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function views()
    {
        return $this->hasOne('App\ProductView');
    }

    /**
     * The href link for a product
     *
     * @return string
     */
    public function link()
    {
        return action('ProductsController@productDetails', ["id" => $this->id]);
    }

    /**
     * Search products by the given keyword
     *
     * @param $keyword
     * @return mixed
     */
    public static function search($keyword)
    {
        return static::where('title', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%")
                        ->orWhere('pricing', 'like', "%{$keyword}%")
                        ->stickyFirst();
    }
}
