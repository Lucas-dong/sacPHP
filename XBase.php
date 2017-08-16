<?php

define('X_PATH' , __DIR__);

class XBase {
	protected static $app = null;
	// protected static $classMap = ['类名'=>类文件的位置];
	public static $classMap = [];

	public static function autoload($class){
		if(isset(self::$classMap[$class])) {
			require(self::$classMap[$class]);
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