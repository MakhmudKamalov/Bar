<?php
require("./MySQL.php");
$obj=new mysql('root','root','west-pub');
if($_GET['id']){
  $obj->table('dishes')->delete($_GET['id']);
  $obj->table('dish_ingredients')->delete($_GET['id'], 'dish_id');
  header('Location: ./menyu.php'); 
}else{
  $obj->table('dishes')->delete($_GET['id_del']);
  $obj->table('dish_ingredients')->delete($_GET['id_del'], 'dish_id');

  header('Location: ./add-ingredient.php');
  
}





?>