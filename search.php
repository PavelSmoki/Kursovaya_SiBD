<?php
session_start();
include('server.php');
include('news.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
        href="https://yt3.ggpht.com/a/AATXAJwv8osjGBjExEIKfCsDxUbK-xZ5gyOrfB8X0uGRbw=s900-c-k-c0xffffffff-no-rj-mo"
        type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Новостной Портал –– Самые актуальные новости</title>
</head>

<body style="background-color: #e5e5e5;">
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Новостной Портал</a>
                <div class="collapse navbar-collapse">
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                АККАУНТ
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if (isset($_SESSION['user'])) { ?>
                                <li><a class="dropdown-item" href="profile.php">Мой профиль</a></li>
                                <li><a href="logout.php" class="dropdown-item">Выйти</a></li>
                                <?php } else { ?>
                                <li><a class="dropdown-item" href="login.php">Войти</a></li>
                                <li><a class="dropdown-item" href="register.php">Регистрация</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li style="padding-left: 135px">
                            <form class="d-flex" role="search">
                                <?php
                                if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'Author' || $_SESSION['user']['role'] == 'Admin')) { ?>
                                <a class="btn btn-outline-success" href="add_article.php">Добавить статью</a>
                                <?php } else {
                                } ?>
                            </form>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Поиск статей" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-3" style="width: 1100px;">
        <div class="jumbotron p-3 p-md-5 text-white rounded"
            style="background: url('../img/background1.jpg') no-repeat; background-size: cover;">
            <div class="col-md-auto px-0">
                <h1 class="display-5 font-italic">НОВОСТНОЙ ИНТЕРНЕТ-ПОРТАЛ</h1>
                <p class="lead my-3">САМЫЕ АКТУАЛЬНЫЕ НОВОСТИ</p>
            </div>
        </div>
    </div>

    <div class="container" style="width: 1100px;">
        <div class="grid" ;>
            <div class="news">
                <?php
                while ($post = mysqli_fetch_assoc($search_result)) { ?>
                <div class="mt-3 card" style="width: 800px; flex-direction: row;">
                    <img src="<?= $post['picture'] ?>" class="card-img-top"
                        style="margin-left: 8px; width: 290px; height: auto; border-radius: 15px; padding: 6px 0px;"
                        alt="">
                    <div class="card-body">
                        <p style="display: flex; justify-content: space-between;">
                            <a href="index.php?category=<?= $post['category_id'] ?>"
                                style="text-align: left; color: red; ">
                                <?= $post['category_name']; ?>
                            </a>
                            <span style="text-align: end;">
                                <?= $post['date']; ?>
                            </span>
                        </p>
                        <h5 class="card-title">
                            <a href="single.php?id=<?= $post['post_id'] ?>" style="color: black;">
                                <?= $post['title']; ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?= mb_strimwidth($post['text'], 0, 150, '...'); ?>
                        </p>
                        <p class="author" style="text-align: left;">
                            Автор:
                            <?= $post['login'] ?>
                        </p>
                        <p><a href="single.php?id=<?= $post['post_id']; ?>" class="btn btn-primary">Читать
                                далее</a></p>
                    </div>
                </div>
                <?php }
                    ?>
                <div class="search">
                    <form class="d-flex" style="flex-direction: row;" role="search">
                        <input class="form-control me-2 input" type="search" placeholder="Поиск статей"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
                <div class="category">
                    <?php $last_news = mysqli_fetch_assoc($last_result) ?>
                    <div class="card" style="width: 268px;">
                        <img src="<?= $last_news['picture'] ?>" class="card-img-top last-news" alt="">
                        <div class="card-body">
                            <p style="text-align: center; color: black;">
                                Последняя новость!
                            </p>
                            <a href="index.php?category=<?= $last_news['category_id'] ?>"
                                style="text-align: left; color: red; ">
                                <?= $last_news['category_name']; ?>
                            </a>
                            <p class="card-text">
                                <?= mb_strimwidth($last_news['text'], 0, 80, '...'); ?>
                            </p>
                            <p class="time">
                                <?= $last_news['date']; ?>
                            </p>
                            <a href="single.php?id=<?= $last_news['post_id']; ?>" class="btn btn-primary">Читать
                                далее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
</body> 

</html>