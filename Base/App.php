<?php 

class App {
	public function initSystemHandler(){
		set_exception_handler([$this,'ExceptionHandler']);
		set_error_handler([$this,'errorHandler']);
	}

	//错误
	public function errorHandler($errno ,$errstr, $errfile, $errline, $errcontext){
		throw new ErrorException($errstr, $errno , 1, $errfile, $errline);
	}

	//异常
	public function ExceptionHandler($err){
		$title = $err->getFile() . ' line ' .$err->getLine() . ',reason:'.$err->getMessage();
		echo '<h2>',$title,'</h2>';
		echo '<pre>';
		print_r($err->getTrace());
	}
}



$app = new App();
$app->initSystemHandler();


function t1(){
	t2();
}

function t2(){
	t3();
}

function t3(){
	throw new Exception('test',34);
}

t1();










 ?>