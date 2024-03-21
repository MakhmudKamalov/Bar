


<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Главная страница</title>
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
                <li><a class="nav-link" href="allAdmin.php">Все сотрудники</a></li>
                <li><a class="nav-link" href="addAdmin.php">Добавить сотрудника</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="book"></i><span>Меню</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="./menyu.php">Наш меню</a></li>
              <li><a class="nav-link" href="./add-dishes.php">Добавить блюдо</a></li>
              <li><a class="nav-link" href="./add-ingredient.php">Добавить ингредиент</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="edit"></i><span>Заказы</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Открытые заказы </a></li>
                <li><a class="nav-link" href="#">Закрытые заказы</a></li>
              </ul>
            </li>


            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Склад</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="stock.php">Все продукты</a></li>
                <li><a class="nav-link" href="addtostock.php">Добавить в склад</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>Отчёты</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Бар</a></li>
                <li><a class="nav-link" href="#">Кухня</a></li>
                <li><a class="nav-link" href="#">Услуги</a></li>
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