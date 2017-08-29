<?php
require __DIR__ . '/XBase.php';

class X extends XBase
{

}

X::$classMap = [
    'App'        => X_PATH . '/Base/App.php',
    'Controller' => X_PATH . '/Base/Controller.php',
    'Model'      => X_PATH . '/Base/Model.php',
    'DB'         => X_PATH . '/Base/DB.php',
];

// spl_autoload_register(['X','autoload']);

$app = X::init();
$app->run();

// var_dump($app);

// echo $aa;
