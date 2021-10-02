<?php

namespace app\controllers\admin;

use core\base\Controller;
use app\models\User;
use app\models\AppModel;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function __construct($route) {
        parent::__construct($route);

        if (!User::isAdmin()) {
            redirect(ADMIN . '/auth/login-admin');
        }

        new AppModel();
    }
}

