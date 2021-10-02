<?php

namespace app\controllers;

use core\Tone;
use core\Cache;
use app\models\Product;

class MainController extends AppController
{
  public function indexAction() {

    $p_model = new Product();
    
    $brands = \R::find('brand', 'LIMIT 3');
    $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 3");

    $canonical = siteUrl();

    // viewed products
    $viewedIds = $p_model->getRecentlyViewed();
    $viewed = null;
    if ($viewedIds) {
      $viewed = \R::find('product', 'id IN (' . \R::genSlots($viewedIds) . ') LIMIT 3', $viewedIds);
    }

    $this->setMeta(Tone::$app->getProperty('shop_name'), 'Description', 'Keywords, t1');
    $this->set(compact('brands', 'hits', 'viewed', 'canonical'));
    
  }
}
