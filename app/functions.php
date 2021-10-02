<?php

define('ADMIN', siteUrl() . '/admin');

function currency($value) {
  return $_SESSION['cart.currency']['symbol_left'] . $value . $_SESSION['cart.currency']['symbol_right'];
}

function getRequestID($get = true, $id = 'id') {
  if ($get) {
      $data = $_GET;
  } else {
      $data = $_POST;
  }

  $id = !empty($data[$id]) ? (int)$data[$id] : null;

  if (!$id) {
      throw new \Exception('Page not found', 404);
  }

  return $id;
}

function connectToRedbean() {
    $db = require_once CONFIG . '/db.php';

    \R::setup($db['dsn'], $db['user'], $db['pass']);

    if (!\R::testConnection()) {
      throw new \Exception('Cannot connect to DB', 500);
    }

    \R::freeze(true);

    if ($_ENV['DEBUG']) {
      \R::debug(true, 1);
    }

    \R::ext('xdispense', function($type){
      return \R::getRedBean()->dispense( $type );
    });
}

connectToRedbean();