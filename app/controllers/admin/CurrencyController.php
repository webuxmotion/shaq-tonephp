<?php

namespace app\controllers\admin;

use app\models\admin\Currency;

class CurrencyController extends AdminController
{
    public function indexAction(){
        $currencies = \R::findAll('currency');
        $this->setMeta('Валюты магазина');
        $this->set(compact('currencies'));
    }

    public function addAction() {
        if(!empty($_POST)) {
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? 1 : 0;
            if(!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }
            if($currency->save('currency', true, 'default', ['base'])){
                $_SESSION['success'] = 'Валюта добавлена';
                redirect();
            }
        }
        $this->setMeta('Новая валюта');
    }

    public function deleteAction(){
        $id = getRequestID();
        $currency = \R::load('currency', $id);
        \R::trash($currency);
        $_SESSION['success'] = "Изменения сохранены";
        redirect();
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = getRequestID(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';
            if(!$currency->validate($data)){
                $currency->getErrors();
                redirect();
            }
            if($currency->update('currency', $id, 'default', ['base'])){
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }

        $id = getRequestID();
        $currency = \R::load('currency', $id);
        $this->setMeta("Редактирование валюты {$currency->title}");
        $this->set(compact('currency'));
    }
}