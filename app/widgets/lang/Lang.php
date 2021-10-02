<?php

namespace app\widgets\lang;

use core\Tone;

class Lang
{
  protected $tpl;
  protected $currencies;
  protected $currency;
  protected $langs;
  protected $lang;

  public function __construct() {
    $this->tpl = __DIR__ . '/lang_tpl/lang.php';
    $this->run();
  }

  protected function run() {
    $this->currencies = Tone::$app->getProperty('currencies');
    $this->currency = Tone::$app->getProperty('currency');
    $this->langs = Tone::$app->getProperty('langs');
    $this->lang = Tone::$app->getProperty('lang');
    echo $this->getHtml();
  }

  public static function getLangs() {
    return \R::getAssoc("SELECT code, id, name FROM app_language ORDER BY code DESC");
  }

  public static function getLang($langs) {
    if (
      isset($_COOKIE['lang']) &&
      array_key_exists($_COOKIE['lang'], $langs)
    )
    {
      $key = $_COOKIE['lang'];
    } else {

      if ($_ENV['DEFAULT_LANG']) {
        $key = $_ENV['DEFAULT_LANG'];
      } else {
        $key = key($langs);
      }

    }

    $lang = $langs[$key];
    $lang['code'] = $key;

    return $lang;
  }

  protected function getHtml() {
    ob_start();
    require_once $this->tpl;
    return ob_get_clean();
  }
}
