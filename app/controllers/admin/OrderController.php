<?php

namespace app\controllers\admin;

use app\libs\Pagination;

class OrderController extends AdminController
{
    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 4;
        $count = \R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = \R::getAll("
            SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `order`.`currency`,
            `user`.`name`,
            ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum`
            FROM `order`
            JOIN `user` ON `order`.`user_id` = `user`.`id`
            JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
            GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage
        ");


        $this->set(compact('orders', 'pagination', 'count'));
        $this->setMeta('Список заказов');
    }

    public function viewAction() {
      $order_id = getRequestID(); 
      $order = \R::getRow("
        SELECT `order`.*,
        `user`.`name`,
        ROUND(SUM(`order_product`.`price` * `order_product`.`qty`), 2) AS `sum`
        FROM `order`
        JOIN `user` ON `order`.`user_id` = `user`.`id`
        JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
        WHERE `order`.`id` = ?
        GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1
      ", [$order_id]);

      if (!$order) {
        throw new \Exception('Page not found', 404);
      }

      $order_products = \R::findAll('order_product', "WHERE order_id = ?", [$order_id]);
      
      $this->set(compact('order', 'order_products'));
      $this->setMeta("Заказ номер {$order_id}");
    }

    public function changeAction() {
        $order_id = getRequestID();
        $status = !empty($_GET['status']) ? "1" : '0';

        $order = \R::load('order', $order_id);
        if (!$order) {
            throw new \Exception('Page not found', 404);
        }
        $update_at = date("Y-m-d H:i:s");

        \R::exec( "UPDATE `order` 
            SET status='$status', update_at='$update_at'
            WHERE id=$order_id");

        $_SESSION['success'] = 'Changes saved';

        redirect();
    }

    public function deleteAction() {
        $order_id = getRequestID();
        $order = \R::load('order', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Order deleted';

        redirect(ADMIN . '/order');
    }
}
