<?php

namespace app\models;

use core\Tone;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel
{
    public static function saveOrder($data) {
        $order = \R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order_id = \R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
    }

    public static function saveOrderProduct($order_id) {
        $sql_part = '';
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("
            INSERT INTO order_product (order_id, product_id, qty, title, price)
            VALUES $sql_part
        ");
    }

    public static function mailOrder($order_id, $user_email) {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(Tone::$app->getProperty('smtp_host'), Tone::$app->getProperty('smtp_port'), Tone::$app->getProperty('smtp_protocol')))
            ->setUsername(Tone::$app->getProperty('smtp_login'))
            ->setPassword(Tone::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Вы совершили заказ №{$order_id} на сайте " . Tone::$app->getProperty('shop_name')))
            ->setFrom([Tone::$app->getProperty('smtp_login') => Tone::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        $message_admin = (new Swift_Message("Сделан заказ №{$order_id}"))
            ->setFrom([Tone::$app->getProperty('smtp_login') => Tone::$app->getProperty('shop_name')])
            ->setTo(Tone::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);
    }
}
