<?php
require("./MySQL.php");
$obj=new mysql('root','root','west-pub');
if($_SERVER['REQUEST_METHOD'] == "POST"){
$name = $_POST['name']; 

$obj->table('ingredients')->insert($_POST);

}
$workers = $obj->table('ingredients')->get();
rsort($workers);




?>
            <!-- add content here -->

    <div class="card">  
<form action="" method="POST">

      <div class="card-header">
        <h4>Добавить ингредиент</h4>
      </div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Введите название</label>
            <input type="text" name="name" class="form-control" id="inputEmail4" placeholder="Название ингредиент" required>
          </div>
          <div class="form-group col-md-6">
            <div class="card-footer">
              <button type="submit" value="Отправить" class="btn btn-primary">Добавить</button>
            </div>
          </div>
        </div>
      </div>
</form>
  <hr style="background-color:gray; height:5px">





  <!--  -->
  <!--  -->
  <!-- -->
  <div class="card-header">
                    <h4>Все ингредиенты</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                          <th>№</th>
                          <th>Название</th>
                          <th>Изменить / Удалить</th>
                        </tr>
                        <?php  
                        $i = 1;
                        foreach ($workers  as $v) {
                        ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><?= $v['name']; ?></td>
                          <td>
        <a href="#" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-pencil-alt"></i></a>
        <a  href="#" class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" data-original-title="Delete"><i class="fas fa-trash"></i></a>
      
      </td> 
                        <?php
                        }
                        ?>
                      </tbody></table>
                    </div>
                  </div>

                </div>   



    </div>
<!--  -->
                    
<div class="form-row">
  <div class="form-group col-md-4">
    <label for="inputState">Ингредиент</label>
    <select id="inputState" name="ing-<?= $i=1; $x='ing-'.$i;     $i++;     ?>" class="form-control">
    <?php if(isset($_POST[$x])){   
    foreach ($workers as $v) {  
      if($v['id'] == $_POST[$x]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] !== $_POST[$x]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c=1; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($_POST[$y]))){ echo $_POST[$y]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t=1; $z='type-'.$t;  $t++; ?>" class="form-control">
    <!-- <option selected="">...</option> -->
    <?php   if(isset($_POST[$z])){
       if($_POST[$z] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($_POST[$z] == 'kg'){    ?>
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
    <select id="inputState" name="ing-<?= $i; $x='ing-'.$i;     $i++;     ?>" class="form-control">
    <?php if(isset($_POST[$x])){   
    foreach ($workers as $v) {  
      if($v['id'] == $_POST[$x]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] !== $_POST[$x]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($_POST[$y]))){ echo $_POST[$y]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
      <!-- <option selected="">...</option> -->
      <?php   if(isset($_POST[$z])){
       if($_POST[$z] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($_POST[$z] == 'kg'){    ?>
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
    <select id="inputState" name="ing-<?= $i; $x='ing-'.$i;     $i++;     ?>" class="form-control">
    <?php if(isset($_POST[$x])){   
    foreach ($workers as $v) {  
      if($v['id'] == $_POST[$x]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] !== $_POST[$x]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($_POST[$y]))){ echo $_POST[$y]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
      <!-- <option selected="">...</option> -->
      <?php   if(isset($_POST[$z])){
       if($_POST[$z] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($_POST[$z] == 'kg'){    ?>
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
    <select id="inputState" name="ing-<?= $i; $x='ing-'.$i;     $i++;     ?>" class="form-control">
    <?php if(isset($_POST[$x])){   
    foreach ($workers as $v) {  
      if($v['id'] == $_POST[$x]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] !== $_POST[$x]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($_POST[$y]))){ echo $_POST[$y]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
      <!-- <option selected="">...</option> -->
      <?php   if(isset($_POST[$z])){
       if($_POST[$z] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($_POST[$z] == 'kg'){    ?>
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
    <select id="inputState" name="ing-<?= $i; $x='ing-'.$i;     $i++;     ?>" class="form-control">
    <?php if(isset($_POST[$x])){   
    foreach ($workers as $v) {  
      if($v['id'] == $_POST[$x]){  ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php     }  }  
foreach ($workers as $v) {  
  if($v['id'] !== $_POST[$x]){  ?>
    <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
<?php     } }  
    }else{    ?>  
    <option selected="">...</option>
    <?php
    foreach ($workers as $v) {  
      ?>
        <option value="<?= $v['id'];  ?>"><?= $v['name'];  ?></option>
 <?php      }  }  ?>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="inputZip">Количество</label>
    <input type="number" name="count-<?= $c; $y='count-'.$c;  $c++; ?>"   value="<?php if((isset($_POST[$y]))){ echo $_POST[$y]; }  ?>" class="form-control" id="inputZip" >
  </div>
  <div class="form-group col-md-4">
    <label for="inputState">гр / кг / количество</label>
    <select id="inputState" name="type-<?= $t; $z='type-'.$t;  $t++; ?>" class="form-control">
      <!-- <option selected="">...</option> -->
      <?php   if(isset($_POST[$z])){
       if($_POST[$z] == 'g'){    ?>
            <option value="g">гр</option>
            <option value="kg">кг</option>
            <option value="c">количество</option>

  <?php    }elseif($_POST[$z] == 'kg'){    ?>
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

<h6 style="color:black; font-size:20px">Ингредиенты</h6>
                    <hr style="background-color:gray; height:5px">

                    <br>


<!--  -->
<!--  -->             
   <a href="add-dishes.php?abc=19" >
   <button  class="btn btn-primary">Добавить поле</button>

   </a>                 

