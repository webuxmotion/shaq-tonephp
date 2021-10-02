<?php

namespace app\controllers;

use app\models\Product;
use app\models\Breadcrumbs;

class ProductController extends AppController
{
  public function viewAction() {

      $p_model = new Product();
    
      $alias = $this->route['alias'];
      $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
      if (!$product) {
          throw new \Exception("Product $alias not found", 404);
      }

      $p_model->setRecentlyViewed($product->id);

      // related products
      $related = \R::getAll("
        SELECT * FROM related_product 
        JOIN product ON
        product.id = related_product.related_id 
        WHERE related_product.product_id = ?
      ", [$product->id]);

      // gallery
      $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);
      
      // viewed products
      $viewedIds = $p_model->getRecentlyViewed();
      $viewed = null;
      if ($viewedIds) {
        $viewed = \R::find('product', 'id IN (' . \R::genSlots($viewedIds) . ') LIMIT 3', $viewedIds);
      }

      // breadcrumbs
      $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

      // modifications
      $mods = \R::findAll('modification', 'product_id = ?', [$product->id]);

      $this->setMeta($product->title, $product->description, $product->keywords);
      $this->set(compact('product', 'related', 'gallery', 'viewed', 'breadcrumbs', 'mods'));
  }
}
