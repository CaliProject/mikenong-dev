<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SiteConfiguration extends Model
{
    /**
     * Override for the associated table
     *
     * @var string
     */
    protected $table = "site_conf";

    /**
     * Get site name
     *
     * @return mixed
     */
    public static function getSiteName()
    {
        return static::getValueByKey("site.name");
    }

    /**
     * Get description for SEO
     *
     * @return mixed
     */
    public static function getSiteDescription()
    {
        return static::getValueByKey("site.description");
    }

    /**
     * Get keywords for SEO
     *
     * @return mixed
     */
    public static function getSiteKeywords()
    {
        return static::getValueByKey("site.keywords");
    }

    /**
     * Get Beian
     *
     * @return mixed
     */
    public static function getSiteBeian()
    {
        return static::getValueByKey("beian");
    }

    /**
     * Service QQ
     *
     * @return mixed
     */
    public static function getSiteServiceQQ()
    {
        return static::getValueByKey("qq");
    }

    /**
     * Get value by its key
     *
     * @param $key
     * @return mixed
     */
    public static function getValueByKey($key)
    {
        return static::where('key', $key)->lists('value')[0];
    }

    /**
     * Get a navbar link by the given id
     *
     * @param int $i
     * @return mixed
     */
    public static function getSiteNavLink($i)
    {
        $value = static::getValueByKey("nav.link.{$i}");

        return $value == "" ? '' : '<a target="_blank" href="'. mb_substr($value, mb_strpos($value, "|") + 1). '"> ' .
            mb_substr($value, 0, mb_strpos($value, "|")) . '</a>';
    }

    /**
     * Save values by keys
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function saveValues(Request $request)
    {
        static::where('key', 'site.name')->update(['value' => $request->input('name')]);
        static::where('key', 'site.description')->update(['value' => $request->input('description')]);
        static::where('key', 'site.keywords')->update(['value' => $request->input('keywords')]);
        static::where('key', 'beian')->update(['value' => $request->input('beian')]);
        static::where('key', 'qq')->update(['value' => $request->input('qq')]);
        for ($i = 0; $i < 5; $i++) {
            static::where('key', "nav.link.{$i}")->update(['value' => $request->input("link{$i}")]);
        }
    }
}
