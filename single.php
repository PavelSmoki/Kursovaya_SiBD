<?php
session_start();
include('server.php');
include('news.php');
include('single-server.php');
if (isset($_POST['add_comment'])) 
{
    $post_id = $id;
    $comment = mysqli_real_escape_string($db, $_POST['comment']);
    $author = $_SESSION['user']['id'];
    if (empty($comment)) {
        array_push($errors, "Вы не ввели комменатарий");
    }
    if (count($errors) == 0) {
        $comment_add = "INSERT INTO comment (post_id, text, comment_author) VALUES('$post_id', '$comment', '$author')";
        mysqli_query($db, $comment_add);

        header("Refresh:0");
    }
}
$comment_quary = "SELECT c.comment_id, c.text, c.date, u.login, u.avatar FROM comment c INNER JOIN user u ON c.comment_author = u.user_id WHERE c.post_id = '$id'";
$comment_result = mysqli_query($db, $comment_quary);
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                        <li style="padding-left: 220px ">
                            <form class="d-flex">
                                <?php
                                if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 'Author' || $_SESSION['user']['role'] == 'Admin')) { ?>
                                <a class="btn btn-outline-success" href="add_article.php">Добавить статью</a>
                                <?php } else {
                                } ?>
                            </form>
                        </li>
                        <li style="padding-left: 10px;">
                            <form class="d-flex">
                                <?php
                                if (isset($_SESSION['user']) && ($_SESSION['user']['login'] == $single['login'] || $_SESSION['user']['role'] == 'Admin')) { ?>
                                <a class="btn btn-outline-danger" href="edit_article.php?id=<?= $single['post_id'] ?>">Редактировать статью</a>
                                <?php } else { ?>
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Поиск статей"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                                </form>
                                <?php } ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-3" style="width: 1100px;">
        <div class="grid">
            <div class="news">
                <div class="mt-3 card" style="width: 800px; align-items: center;">
                    <img src="<?php echo $single['picture'] ?>" class="card-img-top"
                        style="margin-left: 8px; width: 90%; height: auto; border-radius: 15px; padding: 6px 0px;"
                        alt="">
                    <div class="card-body">
                        <p style="display: flex; justify-content: space-between;">
                            <a href="index.php?category=<?php echo $category; ?>"
                                style="text-align: left; color: red; ">
                                <?php echo $single['category_name']; ?>
                            </a>
                            <span style="text-align: end; ">
                                <?php echo $single['date']; ?>
                            </span>
                        </p>
                        <div style="border-bottom: 2px solid blue;"></div>
                        <h5 class="card-title" style="text-align: center; margin-top: 20px;">
                            <?php echo $single['title']; ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $single['text']; ?>
                        </p>
                        <p class="author" style="text-align: right;">
                            Автор:
                            <?php echo $single['login'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="search">
                <form class="d-flex" style="flex-direction: row;" role="search">
                    <input class="form-control me-2 input" type="search" placeholder="Поиск статей" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Поиск</button>
                </form>
            </div>
            <div class="category">
                <?php $last_news = mysqli_fetch_assoc($last_result) ?>
                <div class="card" style="width: 268px;">
                    <img src="<?php echo $last_news['picture'] ?>" class="card-img-top last-news" alt="">
                    <div class="card-body">
                        <p style="text-align: center; color: black;">
                            Последняя новость!
                        </p>
                        <a href="index.php?category=<?php echo $last_news['category_id'] ?>"
                            style="text-align: left; color: red; ">
                            <?php echo $last_news['category_name']; ?>
                        </a>
                        <p class="card-text">
                            <?php echo mb_strimwidth($last_news['text'], 0, 80, '...'); ?>
                        </p>
                        <p class="time">
                            <?php echo $last_news['date']; ?>
                        </p>
                        <a href="single.php?id=<?php echo $last_news['post_id'] ?>" class="btn btn-primary">Читать
                            далее</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="width: 1100px;">
        <div class="d-flex flex-row  mt-3 mb-3" style="width: 800px;">
            <form class="d-flex flex-row" method="post">
                <img class="img-fluid img-responsive" style="margin-right: 10px;"
                    src="<?= $_SESSION['user']['avatar']; ?>" width="38">
                <input type="text" class="form-control" placeholder="Добавьте комментарий" name="comment"
                    style="width: 640px;">
                <button class="btn btn-primary" type="sumbit" style="margin-left:20px;"
                    name="add_comment">Comment</button>
        </div>
        </form>
    </div>
    <div class="row" style="max-width: 825px; margin-left:190.4px;">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 pb-2">Комментарии</h4>
                    <div class="row">
                        <div class="col">
                            <?php while ($comment = mysqli_fetch_assoc($comment_result)) { ?>
                            <div class="d-flex flex-start comment">
                                <img class="shadow-1-strong ml-3" src="<?= $comment['avatar'] ?>" alt="avatar"
                                    width="65" height="65" style="margin-right: 10px;" />
                                <div class="flex-grow-1 flex-shrink-1">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-1">
                                                <?= $comment['login'] ?> <span class="small">- <?= $comment['date'] ?>
                                                    </span>
                                            </p>
                                        </div>
                                        <p class="small mb-0">
                                            <?= $comment['text']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
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