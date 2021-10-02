<?php

namespace app\controllers;


use core\base\Controller;
use app\models\AppModel;
use core\Tone;


class AppController extends Controller
{
  public function __construct($route) {
    parent::__construct($route);

    new AppModel();

    Tone::$app->setProperty('currencies', \Currency::getCurrencies());
    Tone::$app->setProperty('currency', \Currency::getCurrency(Tone::$app->getProperty('currencies')));

    Tone::$app->setProperty('langs', \Lang::getLangs());
    Tone::$app->setProperty('lang', \Lang::getLang(Tone::$app->getProperty('langs')));

    //define("LANG", Tone::$app->getProperty('lang')['code']);

    Tone::$app->setProperty('cats', self::cacheCategory());

    $this->layout = 'shopmax';
  }

  public static function cacheCategory() {
    $cache = \Cache::instance();
    $cats = $cache->get('cats');
    if (!$cats) {
      $cats = \R::getAssoc("SELECT * FROM category");
      $cache->set('cats', $cats);
    }
    return $cats;
  }
}
