<?php
class Controller {
	protected $data = [];
	public function assign($k,$v){
		$this->data[$k] = $v;
	}

	public function display($view){
		extract($this->data);
		include(APP_PATH . '/view/' .$view. '.html');
	}

}