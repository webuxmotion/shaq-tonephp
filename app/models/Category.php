<?php

namespace app\models;

use core\Tone;

class Category extends AppModel
{
    public $attributes = [
        'title' => '',
        'parent_id' => '',
        'keywords' => '',
        'description' => '',
        'alias' => ''
    ];

    public $rules = [
        'required' => [
            ['title']
        ]
    ];

    public function getIds($id) {
        $cats = Tone::$app->getProperty('cats');
        $ids = null;

        foreach ($cats as $k => $v) {
            if ($id == $v['parent_id']) {
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }

        return $ids;
    }
}