<?php

require '../vendor/autoload.php';

class_alias('\RedBeanPHP\R', '\R');
class_alias('\app\widgets\currency\Currency', '\Currency');
class_alias('\app\widgets\lang\Lang', '\Lang');
class_alias('\app\widgets\menu\Menu', '\Menu');
class_alias('\core\Cache', '\Cache');

new \core\Tone;