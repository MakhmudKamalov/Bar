<?php
// namespace App\MySQL;

class mysql {
  private $db;
  private $sql;
  private $table;
  private $where;
  private $orwhere;
  private $andwhere;

  public function __construct($host, $a, $b){
    $this->db = mysqli_connect('localhost', $host, $a, $b);
  }

  public function table($table, ...$var){
    if(empty($var)){
      $values = '*';
  }else{
    $values = "`" . implode("`, `", array_values($var)) . "`";
  }
    $this->sql = "SELECT $values FROM `$table` ";
    $this->table = $table;
    return $this;
  }

  public function where($name, $value, $shart='='){
    $this->sql .= " WHERE `$name` $shart '$value' ";
    $this->where = " WHERE `$name` $shart '$value' ";
    
    return $this;
  }

  public function orwhere($name,$value,$shart='='){
    $this->sql .= " OR `$name` $shart '$value' ";
    $this->orwhere = " OR `$name` $shart '$value' ";
    return $this;
  }

  public function andwhere($name, $value, $shart='='){
    $this->sql .= " AND `$name` $shart '$value' ";
    $this->andwhere = " AND `$name` $shart '$value' ";
    return $this;
  }

  public function find( $id , $column='id' ){
    $this->sql .= " WHERE `$column` = '$id' ";
    return $this;
  }

  public function get(){
    $response = mysqli_query($this->db, $this->sql);
    for($data=[]; $i=$response->fetch_assoc(); $data[]=$i);
    return $data;
  }

  public function insert($array){
    $columns ="`".implode("`, `", array_keys($array))."`" ;
    $values = "'" . implode("', '", array_values($array)) . "'";

      $sql = "INSERT INTO `$this->table`($columns)  VALUES($values) ";
      mysqli_query($this->db, $sql);
      // echo "Inserted !!!";
  }

  public function update($array){
    foreach($array as $key=>$v){
      $sql = "UPDATE `$this->table` SET `$key`='$v' $this->where ";
      mysqli_query($this->db,  $sql);
      echo 'Updated';
    }
  }

  public function delete($id, $column='id'){
    $sql = "DELETE FROM `$this->table` WHERE $column = '$id' ";
    mysqli_query($this->db,  $sql);
    echo 'Deleted';
  }

  public function join($table2, $a, $b){
    $this->sql .= " INNER JOIN $table2 ON $a = $b ";
    return $this;
  }
}

// echo "h1";
?>