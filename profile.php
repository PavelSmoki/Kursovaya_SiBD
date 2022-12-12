<?php include('server.php');
if (empty($_GET['category'])) {
    $category = 0;
} else {
    $category = $_GET['category'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://yt3.ggpht.com/a/AATXAJwv8osjGBjExEIKfCsDxUbK-xZ5gyOrfB8X0uGRbw=s900-c-k-c0xffffffff-no-rj-mo" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Профиль</title>
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
                            <?php 
                            if(isset($_SESSION['user']))
                            { ?>
                                <li><a class="dropdown-item" href="profile.php">Мой профиль</a></li>
                                <li><a href="logout.php" class="dropdown-item" >Выйти</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" href="login.php">Войти</a></li>
                                <li><a class="dropdown-item" href="register.php">Регистрация</a></li>
                            <?php } ?>
                            </ul>
                        </li>
                        <li style="padding-left: 135px">
                            <form class="d-flex" role="search">
                                <?php 
                                if(isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'Author' || $_SESSION['user']['role'] == 'Admin')) { ?>
                                <a class="btn btn-outline-success" href="add_article.php">Добавить статью</a>
                                <?php } else {
                                }?>
                            </form>
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

<section class="vh-100" style="background-image: url('https://funart.pro/uploads/posts/2022-08/1659731562_4-funart-pro-p-novostnoi-fon-krasivo-4.png');">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-md-9 col-lg-7 col-xl-5">
                <div class="card" style="border-radius: 15px; width:600px;">
                    <div class="card-body p-4">
                        <div class="d-flex text-black">
                            <div class="flex-shrink-0">
                                <img src="<?=$_SESSION['user']['avatar']?>"
                                alt="Generic placeholder image" class="img-fluid"
                                style="width: 200px; height: auto; border-radius: 10px;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h2 class="mb-1">Ваш Логин: <i><?= $_SESSION['user']['login'] ?></i></h2>
                                <p style="padding-top: 8px; border-bottom: 2px solid #000000;"></p>
                                <h5 style="text-aling: center; color: #2b2a2a; margin:0; ">Ваша роль: <i><?= $_SESSION['user']['role'] ?></i></h5>
                                <h5 style="color: #2b2a2a;">Ваша почта: <?= $_SESSION['user']['email'] ?></h5>
                                <div style="padding-top: auto; ">
                                    <div class="d-flex pt-1 " style="position: absolute; bottom: 30px; right: 60px">
                                        <a href="edit_profile.php" class="btn btn-primary me-1" >Редактировать профиль</a>
                                        <a href="logout.php" class="btn btn-outline-primary flex-grow-1" >Выйти</a>
                                    </div>
                                </div>
                            </div>
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