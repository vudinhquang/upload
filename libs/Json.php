<?php
class Json{

    private $table = '';  
    private $columns = [];

    public function __construct($table, $columns){
        $this->table = $table;
        $this->columns = $columns;
    }

    public function write($data){
        file_put_contents($this->table, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function list(){
        return json_decode(file_get_contents($this->table), true);
    }

    public function get($id){
        $result = null;
        $items = $this->list();
        $index = array_search($id, array_column($items, 'id'));
        if ($index !== false) $result = $items[$index];
        return $result;
    }

    public function delete($id){
        $result = false;
        $items = $this->list();
        $index = array_search($id, array_column($items, 'id'));
        if ($index !== false) {
            $result = $items[$index];
            unset($items[$index]);  
            $items = array_values($items);
            $this->write($items);
        }
        return $result;
    }
}
