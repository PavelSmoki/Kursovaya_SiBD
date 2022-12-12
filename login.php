<?php include('server.php');
if (empty($_GET['category'])) {
    $category = 0;
} else {
    $category = $_GET['category'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://yt3.ggpht.com/a/AATXAJwv8osjGBjExEIKfCsDxUbK-xZ5gyOrfB8X0uGRbw=s900-c-k-c0xffffffff-no-rj-mo" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <title>Вход</title>
    </head>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Новостной Портал</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                            <a class="nav-link" href="index.php?category=1">РАЗВЛЕЧЕНИЯ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?category=2">НАУКА И ТЕХНОЛОГИИ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?category=3">СПОРТ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?category=4">КИБЕРСПОРТ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?category=5">КУЛЬТУРА</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            АККАУНТ
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login.php">Войти</a></li>
                                <li><a class="dropdown-item" href="register.php">Регистрация</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" type="search" placeholder="Поиск статей" name="text">
                        <button class="btn btn-outline-success" type="submit" name="search">Поиск</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<section class="vh-100 bg-image"
  style="background-image: url('https://funart.pro/uploads/posts/2022-08/1659731562_4-funart-pro-p-novostnoi-fon-krasivo-4.png');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Вход в Аккаунт</h2>

              <form method="post">
                <?php include('error.php'); ?>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Ваш Логин</label>
                    <input type="text" class="form-control form-control-lg" name="login"/>     
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Пароль</label>
                    <input type="password" class="form-control form-control-lg" name="password"/>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login_user">Войти</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Еще нет аккаунта? <a href="register.php"
                    class="fw-bold text-body"><u>Зарегистрируйтесь</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>