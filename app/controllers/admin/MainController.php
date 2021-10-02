<?php

namespace app\controllers\admin;

class MainController extends AdminController
{
    public function indexAction() {
        $countNewOrders = \R::count('order', "status = '0'");
        $countUsers = \R::count('user');
        $countProducts = \R::count('product');
        $countCategories = \R::count('category');

        $this->set(compact('countNewOrders', 'countUsers', 'countProducts', 'countCategories'));
        $this->setMeta('Панель управления');
    }
}