<?php


namespace app\controllers\admin;


use core\Cache;

class CacheController extends AdminController
{
    public function indexAction() {
        $this->setMeta('Clear cache');
    }

    public function deleteAction() {
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key) {
            case 'category':
                $cache->delete('cats');
                $cache->delete('ishop_menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                $cache->delete('admin_select');
                break;
        }
        $_SESSION['success'] = "Кеш удален";
        redirect();
    }
}