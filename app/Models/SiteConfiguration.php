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

        $url = mb_substr($value, mb_strpos($value, "|") + 1);

        $url = str_contains($url, 'http://') ? $url : "http://" . $url;

        return $value == "" ? '' : '<a target="_blank" href="'. $url . '"> ' .
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
        static::where('key', 'qrcodes.1')->update(['value' => $request->input('qrcode')]);
        for ($i = 1; $i <= 8; $i++)
            static::where('key', "nav.link.{$i}")->update(['value' => $request->input("link{$i}")]);
        for ($i = 1; $i <= 3; $i++)
            static::where('key', "sidebar.images.{$i}")->update(['value' => $request->input("sidebar{$i}")]);
        for ($i = 1; $i <= 20; $i++)
            static::where('key', "footer.link.{$i}")->update(['value' => $request->input("footer-link{$i}")]);
        for ($i = 1; $i <= 4; $i++)
            static::where('key', "banner.image.{$i}")->update(['value' => $request->input("banner{$i}")]);
    }

    /**
     * @param $i
     * @return mixed
     */
    public static function getFriendLink($i)
    {
        $value = static::getValueByKey("footer.link.{$i}");

        $url = mb_substr($value, mb_strpos($value, "|") + 1);

        $url = str_contains($url, 'http://') ? $url : "http://" . $url;

        return $value == "" ? '' : '<a target="_blank" href="'. $url . '"> ' .
            mb_substr($value, 0, mb_strpos($value, "|")) . '</a>';
    }

    /**
     * @param $i
     * @return mixed
     */
    public static function getSidebarImage($i)
    {
        $value = static::getValueByKey("sidebar.images.{$i}");

        $url = mb_substr($value, mb_strpos($value, "|") + 1);

        $url = str_contains($url, 'http://') ? $url : "http://" . $url;

        return $value == "" ? '' : '<a target="_blank" href="' . $url . '"><img src="'.
            mb_substr($value, 0, mb_strpos($value, "|")) . '" /></a>';
    }

    /**
     * @param $i
     * @return string
     */
    public static function getBannerImage($i)
    {
        $value = static::getValueByKey("banner.image.{$i}");

        $url = mb_substr($value, mb_strpos($value, "|") + 1);

        $url = str_contains($url, 'http://') ? $url : "http://" . $url;

        return $value == "" ? '' : '<a target="_blank" href="' . $url . '"><img src="'.
            mb_substr($value, 0, mb_strpos($value, "|")) . '" /></a>';
    }

    /**
     * @param $i
     * @return mixed
     */
    public static function getQRImage($i)
    {
        return '<img src="' . static::getValueByKey("qrcodes.{$i}") . '" />';
    }
}
