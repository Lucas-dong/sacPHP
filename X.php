<?php
require(__DIR__ . '/XBase.php');

class X extends XBase {

}

X::$classMap = [
	'App' => X_PATH . '/Base/App.php'
];

// spl_autoload_register(['X','autoload']);

$app = X::init();
$app->run();

// var_dump($app);

// echo $aa;