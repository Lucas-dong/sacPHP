<?php 

class DB extends PDO {
	public function __construct() {
		$cfg = require(APP_PATH . '/config.php');
		$dsn = "mysql::host={$cfg['host']};dbname={$cfg['dbname']}";
		parent::__construct($dsn, $cfg['user'], $cfg['passwd']);
	}

	public function insert($sql,$params=[]) {
		//预处理
		$st = $this->prepare($sql);
		$st->execute($params);

		return $this->lastInsertId();
	}

	public function getRow($sql,$params=[]) {
		$st = $this->prepare($sql);
		$st->execute($params);

		return $st->fetch(PDO::FETCH_ASSOC);
	}

	public function getAll($sql,$params=[]) {
		$st = $this->prepare($sql);
		$st->execute($params);

		return $st->fetchAll(PDO::FETCH_ASSOC);
	}
}