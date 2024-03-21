<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Добавить ингредиент</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">

        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>

            <!-- <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Поиск" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li> -->

          </ul>
        </div>

        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown"><a href="#" data-toggle="dropdown"
               class="btn btn-outline-info">User</a>
            <!-- <a href="#" data-toggle="dropdown" -->
              <!-- class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <span class="d-sm-none d-lg-inline-block"></span></a> -->
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <!-- <div class="dropdown-title">Здраствуйте Админ</div> -->
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Профиль
              </a> 
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
              Выход
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="./index.php"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">West PUB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Main</li> -->
            <li class="dropdown">
              <a href="index.php" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="users"></i><span>Сотрудники</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="all_workers.php">Все сотрудники</a></li>
                <li><a class="nav-link" href="widget-data.html">Добавить сотрудника</a></li>
              </ul>
            </li>

            <li class="dropdown active">
              <a href="#" class="menu-toggle nav-link has-dropdown toggled"><i
                  data-feather="book"></i><span>Меню</span></a>
              <ul class="dropdown-menu active">
              <li><a class="nav-link" href="widget-chart.html">Наш меню</a></li>
              <li><a class="nav-link" href="./add-dishes.php">Добавить блюдо</a></li>
              <li><a class="nav-link" href="./add-ingredient.php"><b>Добавить ингредиент</b></a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="edit"></i><span>Заказы</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Склад</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="chat.html">Все продукты</a></li>
                <li><a class="nav-link" href="widget-data.html">Добавить в склад</a></li>
                <li><a class="nav-link" href="widget-data.html">Изменение склада </a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>Отчёты</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="email-inbox.html">Бар</a></li>
                <li><a class="nav-link" href="email-read.html">Кухня</a></li>
                <li><a class="nav-link" href="email-read.html">Услуги</a></li>
              </ul>
            </li>
            

          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
<?php
require("./MySQL.php");
$name = $_GET['name'];
$id = $_GET['id_add'];

session_start();
$_SESSION['id']=$id;
$_SESSION['name']=$name;
$_SESSION['id-up']=$_GET['id-edit'];


$obj=new mysql('root','root','west-pub');
if(isset($_GET['id_edit'])){
  $workers = $obj->table('dish_ingredients','ing_id','quantity','type')->where('dish_id', $_GET['id_edit'])->get();
  $item = $obj->table('stocks','item_name','id')->get();
  // rsort($workers);
  $ing=json_decode($workers[0]['ing_id'],true);
  $q=json_decode($workers[0]['quantity'],true);
  $type=json_decode($workers[0]['type'],true);





}else{
if($_SERVER['REQUEST_METHOD'] == "POST"){
  // $data=$_POST;
  $ing_id=[];
  $quantity=[];
  $type=[];
  
for($i=1;  $i<=10; $i++){
  $ing_name = 'ing-'.$i;
  $count_name = 'count-'.$i;
  $type_name = 'type-'.$i;
  if( $_POST[$ing_name] != '...'){
    array_push($ing_id, $_POST[$ing_name]);
    array_push($quantity, $_POST[$count_name]);
    array_push($type, $_POST[$type_name]);
  }

// echo $ing_name;
}
if(!empty($ing_id)){
$id_dish = $_SESSION['id'];

  $a = json_encode($ing_id);
  $b =json_encode($quantity);
  $c = json_encode($type);
  
  $db=mysqli_connect('localhost','root','root','west-pub');
  $sql="INSERT INTO `dish_ingredients`(`dish_id`,`ing_id`,`quantity`,`type`)  VALUES('$id', '$a', '$b', '$c') ";
  mysqli_query($db, $sql);
  
  $sql_update="UPDATE `dishes` SET `status`=1 WHERE id='$id' ";
  mysqli_query($db, $sql_update);



  header('Location: ./menyu.php');

}

}

}


$workers = $obj->table('stocks','id','item_name')->get();





?>
            <!-- add content here -->
            <div class="card">  
<form action="" method="POST">
      <div class="card-header">
        <?php 
if(isset($_GET['id_edit'])){  ?>
        <h4>Изменить ингредиентов  <?php  echo $name.$id;  ?></h4>


  <?php
}else{  ?>
        <h4>Добавить ингредиент  на   <?php  echo $name.$id;  ?></h4>

  <?php
}
        ?>
      </div>
      <div class="card-body">
<!--  -->
                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-1" class="form-control">
    <?php if(isset($ing[0]) ){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[0] AND $ing[0] != '...'){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[0]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c=1; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[0]))){ echo $q[0]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t=1; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[0])){
       if($type[0] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[0] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-2" class="form-control">
    <?php if(isset($ing[1]) AND $ing[1] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[1]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[1]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[1]))){ echo $q[1]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[1])){
       if($type[1] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[1] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-3" class="form-control">
    <?php if(isset($ing[2]) AND $ing[2] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[2]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[2]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[2]))){ echo $q[2]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[2])){
       if($type[2] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[2] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-4" class="form-control">
    <?php if(isset($ing[3]) AND $ing[3] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[3]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[3]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[3]))){ echo $q[3]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[3])){
       if($type[3] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[3] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-5" class="form-control">
    <?php if(isset($ing[4]) AND $ing[4] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[4]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[4]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[4]))){ echo $q[4]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[4])){
       if($type[4] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[4] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-6" class="form-control">
    <?php if(isset($ing[5]) AND $ing[5] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[5]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[5]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[5]))){ echo $q[5]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[5])){
       if($type[5] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[5] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-7" class="form-control">
    <?php if(isset($ing[6]) AND $ing[6] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[6]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[6]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[6]))){ echo $q[6]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[6])){
       if($type[6] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[6] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-8" class="form-control">
    <?php if(isset($ing[7]) AND $ing[7] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[7]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[7]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[7]))){ echo $q[7]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[7])){
       if($type[7] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[7] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-9" class="form-control">
    <?php if(isset($ing[8]) AND $ing[8] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[8]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[8]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[8]))){ echo $q[8]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[8])){
       if($type[8] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[8] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->

                  
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-10" class="form-control">
    <?php if(isset($ing[9]) AND $ing[9] != '...'){   
    foreach ($workers as $v) {  
      if($v['id'] == $ing[9]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] != $ing[9]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['item_name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($q[9]))){ echo $q[9]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($type[9])){
       if($type[9] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($type[9] == 'kg'){    ?>
            <option value="kg">кг</option>  
            <option value="g">гр</option>
            <option value="c">количество</option>

 <?php     }else{    ?>
          <option value="c">количество</option>
          <option value="g">гр</option>
          <option value="kg">кг</option>

 <?php     }   }else{   ?>
  <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>


<?php   } ?>
    </select>
  </div>
</div>

<!--  -->
<!--  -->
                  <div class="card-footer">
<?php
if(isset($_GET['id_edit'])){
?>
                    <button type="submit" class="btn btn-success">Сохранить</button>
 <?php 
}else{
?>
                    <button type="submit" class="btn btn-success">Добавить</button>
<?php
}
?>
                  </div>


      </div>
</form>
</div>

<!-- add content here -->

          </div>
        </section>



        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer> -->
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>