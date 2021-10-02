<?php

namespace app\models;

use core\Tone;

class Breadcrumbs 
{
    public static function getBreadcrumbs($category_id, $name = '') {
        $cats = Tone::$app->getProperty('cats');
        $breadcumbs_array = self::getParts($cats, $category_id);
        $path = siteUrl();
        $breadcrumbs = "<a href='" . $path . "'>Home</a>";
        foreach ($breadcumbs_array as $alias => $title) {
            $breadcrumbs .= "<span class='mx-2 mb-0'>/</span>
            <a href='" . $path . "/category/{$alias}'>{$title}</a>";
        }
        if ($name) {
            $breadcrumbs .= "<span class='mx-2 mb-0'>/</span> 
            <strong class='text-black'>{$name}</strong>";
        }
        return $breadcrumbs;
    }

    public static function getParts($cats, $id) {
        if (!$id) return false;
        $breadcrumbs = [];
        foreach($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else break;
        }
        return array_reverse($breadcrumbs, true);
    }
}