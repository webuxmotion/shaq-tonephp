<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use core\Tone;
use app\libs\Pagination;
use app\widgets\filter\Filter;

class CategoryController extends AppController
{
    public function viewAction() {

        $alias = $this->route['alias'];

        $category = \R::findOne('category', 'alias = ?', [$alias]);
        if (!$category) {
            throw new \Exception('Category not found', 404);
        }

        // breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);

        $ids = !$ids ? $category->id : $ids . $category->id;

        // pagination
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = Tone::$app->getProperty('pagination');

        $sql_part = '';

        if (!empty($_GET['filter'])) {

            $filter = Filter::getFilter();

            if (FILTER == 'OR-OR') {

                $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter))";

            } else if (FILTER == 'AND-AND') {

                if ($filter) {
                    $cnt = Filter::getCountGroups($filter);
                    $sql_part = "
                        AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter)
                        GROUP BY product_id HAVING COUNT(product_id) = $cnt)
                    ";
                }

            }
        }

        $total = \R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = \R::find('product', "status = '1' AND category_id IN ($ids) $sql_part LIMIT $start, $perpage ");

        // $productsAll = \R::getAssoc("
        //   SELECT p.*, pt.title
        //   FROM `product` p
        //   INNER JOIN `product_translation` pt ON p.id = pt.product_id
        //   WHERE pt.language_code = '" . LANG . "'
        //   AND status='1' AND category_id IN ($ids)
        // ");

        if (isAjax()) {
            $this->loadView('filter', compact('products', 'pagination'));
        }

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination'));
    }
}
