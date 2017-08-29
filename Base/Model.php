<?php

class Model
{
    protected $table  = '';
    protected $pk     = '';
    protected $fields = [];
    protected $db     = null;

    protected $data;
    protected $column = '*';

    public function __construct()
    {
        $this->db = new DB();
        $this->parseTable();
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function table($ta)
    {
        return $ta;
    }
    //分析表名
    public function parseTable()
    {
        $this->table = substr(static::class, 0, -5);
        $this->table = self::table();
        $sql         = 'desc ' . $this->table;

        $struct = $this->db->getAll($sql);

        foreach ($struct as $row) {
            $this->fields[] = $row['Field'];

            if ($row['Key'] === 'PRI') {
                $this->pk = $row['Field'];
            }

        }
    }

    public function table($tb)
    {
        $this->table = $tb;
        return $this;
    }

    public function fields($cols = '*')
    {
        $this->column = $cols;
        return $this;
    }

    public function select()
    {
        return $this->data = $this->db->getAll('select ' . $this->column . ' from ' . $this->table);
    }

    public function find($id)
    {
        return $this->data = $this->db->getRow('select ' . $this->column . ' from ' . $this->table . ' where ' . $this->pk . '=?', [$id]);
    }

    public function add()
    {
        $sql = 'insert into ' . $this->table . ' (' . implode(',', array_keys($this->data)) . ') values (' . str_repeat('?,', count($this->data));
        $sql = substr($sql, 0, -1) . ')';
        // echo $sql;exit;

        return $this->db->insert($sql, array_values($this->data));
    }
}
