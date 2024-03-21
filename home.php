<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>West PUB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<?php  
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $db=mysqli_connect('localhost', 'root', 'root', 'west-pub');
    $login=$_POST['login'];
    $password=$_POST['password'];
    // echo $login;
    // echo $password;
  $sql="SELECT `login`,`password` FROM `workers` WHERE `login`='$login' AND `password`='$password'";
  $res=mysqli_query($db, $sql);
  $data=$res->fetch_assoc();
  
  if($login==$data['login'] AND $_POST['password']==$data['password']){
     session_start();
    $_SESSION['auth']=true;
    header("Location: view/index.php");
    echo "parol duris";
  }else{
        echo "Неверно";
      }
}



?>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+998 99 777 77 77</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span><?php echo date('Y-m-d').' '.date('H:i');   ?></span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>RU</li>
          <li><a href="#">QQ</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">West PUB</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <!-- <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hro">Главная</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>.navbar -->
      <a href="index.php" class="book-a-table-btn scrollto d-none d-lg-flex">Главная</a>

    </div>
  </header><!-- End Header -->

<br><br>
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2></h2>
          <p>Введите логин и пароль</p>
        </div>
<!-- 
        <form action="home.php" method="POST"  class="php-email-form"  >
          <div class="row" style="text-align: center;">
            
             <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="text" class="form-control" name="name"  placeholder="Введите логин" required  > -->
              <!-- <div class="validate"></div> -->
            <!-- </div> -->
            <!-- col-lg-4 col-md-6 form-group mt-3 -->
           
             <!-- <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
              <input type="password" class="form-control" minlength="5" name="password"  placeholder="Введите пароль"   required> -->
              <!-- <div class="validate"></div> -->
             <!-- </div> -->
          
          <!-- </div>
         <input type="submit" value="Send">
          <div class="text-center">
            <button type="submit">Вход
          </button></div> -->
        <!-- </form> --> 

        <form action="" method="POST">
        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
          <input type="text"  class="form-control"  name="login" placeholder="Введите логин"><br><br>

        </div>
        <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">

          <input type="password" minlength="5" class="form-control" name="password" placeholder="Введите пароль" ><br><br>
        </div>

          <input type="submit" Value='Вход'>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>