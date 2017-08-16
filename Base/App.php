<?php 

class App {
	public function __construct(){
		$this->initSystemHandler();
	}

	public function initSystemHandler(){
		set_exception_handler([$this,'ExceptionHandler']);
		set_error_handler([$this,'errorHandler'] , E_ALL);
	}

	//错误
	public function errorHandler($errno ,$errstr, $errfile, $errline, $errcontext){
		throw new ErrorException($errstr, $errno , 1, $errfile, $errline);
	}

	//异常
	public function ExceptionHandler($err){
		$title = $err->getFile() . ' line ' .$err->getLine() . ' , reason:'.$err->getMessage();
		echo '<h2>',$title,'</h2>';
		echo '<pre>';
		$traces = $err->getTrace();
		if($err instanceof ErrorException) {
			array_shift($traces);
		}
		print_r($traces);
	}

	/** 
	 * 分析地址栏上的 pathinfo
	 * 实例化控制器
	 */
	public function run(){
		$this->resolve();
	}

	public function resolve(){
		$pathinfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '' ;
		$pathinfo = explode('/' , trim($pathinfo , '/') );
	print_r($pathinfo);
		$pathinfo = $pathinfo + ['Index' , 'index'];

		print_r($pathinfo);
	}
}



// $app = new App();
// $app->initSystemHandler();


// function t1(){
// 	t2();
// }

// function t2(){
// 	echo $aa;
// }

// // function t3(){
// // 	throw new Exception('test',34);
// // }

// t1();










 ?>