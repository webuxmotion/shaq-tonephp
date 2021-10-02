<?php

namespace app\controllers\admin;

class LangsController extends AdminController
{
  public function indexAction() {
    $langs = \R::findAll('app_language');
    $this->setMeta('Languages');
    $this->set(compact('langs'));
  }
}
