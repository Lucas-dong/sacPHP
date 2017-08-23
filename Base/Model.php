<?php 

class Model {
	protected $table = '';
	protected $pk = '';
	protected $fields = [];
	protected $db = null;

	protected $data = [];

	public function __construct(){
		$this->db = new DB();
		$this->parseTable();
	}

	public function __set($k,$v){
		$this->data[$k] = $v;
	}

	public function __get($k){
		return $this->data[$k];
	}

	//分析表名
	public function parseTable() {
		$this->table = substr(static::class, 0, -5);
		$sql = 'desc ' . $this->table;

		$struct = $this->db->getAll($sql);
		// var_dump($struct);

		foreach($struct as $row) {
			$this->fields[] = $row['Field'];

			if($row['Key'] === 'PRI') {
				$this->pk = $row['Field'];
			}

		}
	}

	public function find($id) {
		return $this->data = $this->db->getRow('select * from '.$this->table.' where '.$this->pk.'=?',[$id]);
	}

	public function add(){
		$sql = 'insert into ' .$this->table. ' (' .implode(',',array_keys($this->data)). ') values ('.str_repeat('?,',count($this->data));
		$sql = substr($sql,0,-1) . ')';
		// echo $sql;exit;

		return $this->db->insert($sql,array_values($this->data));
	}
}