<?php

define('X_PATH' , __DIR__);

class XBase {
	protected static $app = null;
	// protected static $classMap = ['类名'=>类文件的位置];
	public static $classMap = [];

	public static function autoload($class){
		if(isset(self::$classMap[$class])) {
			require(self::$classMap[$class]);
		} else if(substr($class,-10) === 'Controller') {
			require(APP_PATH . '/Controller/' . $class . '.php');
		} else if(substr($class,-5) === 'Model') {
			require(APP_PATH . '/Model/' . $class . '.php');
		}
	}

	public static function init(){
		if(self::$app === null) {
			self::$app = new App();
		}

		return self::$app;
	}
}

spl_autoload_register(['XBase','autoload']);