<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\User;
use app\libs\Pagination;

class UserController extends AdminController
{
    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);

        new AppModel();
    }

    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perpage");

        $this->setMeta('Users list');
        $this->set(compact('users', 'pagination', 'count'));
    }

    public function addAction() {
        $this->setMeta('New user');
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = getRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);
            if (!$user->attributes['password']) {
                unset($user->attributes['password']);
            } else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                redirect();
            }

            if ($user->update('user', $id)) {
                $_SESSION['success'] = 'Changes saved!';
            }

            redirect();
        }

        $user_id = getRequestID();
        $user = \R::load('user', $user_id);

        $orders = \R::getAll("
            SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `order`.`currency`,
            ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum`
            FROM `order`
            JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
            WHERE `user_id` = {$user_id}
            GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id`
        ");

        $this->setMeta('Edit user');
        $this->set(compact('user', 'orders'));
    }
}
