<?php
session_start();
$login = "";
$email = "";
$errors = array(); 
$avatar = "";

$db = mysqli_connect('127.0.0.1', 'root', '', 'portal');

if ($db == false)
{
    echo "Ошибка подключения";
}

if (isset($_POST['reg_user'])) 
{
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($login)) { array_push($errors, "Вы не ввели логин"); }
    if (empty($email)) { array_push($errors, "Вы не ввели почту"); }
    if (empty($password_1)) { array_push($errors, "Вы не ввели пароль"); }
    if ($password_1 != $password_2) 
    {
	    array_push($errors, "Пароли не совпадают");
    }

    $user_check_query = "SELECT * FROM user WHERE login='$login' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) 
    {
        if ($user['login'] === $login) 
        {
            array_push($errors, "Пользователь уже существует");
        }

        if ($user['email'] === $email) 
        {
            array_push($errors, "Почта уже зарегистрирована");
        }
    }

    if (count($errors) == 0) {
  	    $password = md5($password_1);
  	    $query = "INSERT INTO user (login, email, password) VALUES('$login', '$email', '$password')";
  	    mysqli_query($db, $query);
  	    header('location: index.php');
    }
}


if (isset($_POST['login_user'])) 
{
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($login)) 
    {
        array_push($errors, "Вы не ввели логин");
    }
    if (empty($password)) 
    {
        array_push($errors, "Вы не ввели пароль");
    }
  
    if (count($errors) == 0) 
    {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE login='$login' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) 
        {
            $user = mysqli_fetch_assoc($results);
            $role_id = $user['role_id'];
            $res = mysqli_query($db, "SELECT role_name FROM role WHERE role_id='$role_id'");
            $role = mysqli_fetch_assoc($res); 
            $_SESSION['user'] = [
                "id" => $user['user_id'],
                "login" => $user['login'],
                "email" => $user['email'],
                "avatar" => $user['avatar'],
                "role" => $role['role_name']
            ];
            header('location: profile.php');
        } else {
            array_push($errors, "Не верный логин или пароль");
        }
    }
}

if(isset($_POST['edit_user']))
{
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $avatar = mysqli_real_escape_string($db, $_POST['avatar']);
    $id = $_SESSION['user']['id'];

    if (empty($login)) 
    {
        $login = $_SESSION['user']['login'];
    }
    if (empty($email)) 
    {
        $email = $_SESSION['user']['email'];
    }
    if(empty($avatar))
    {
        $avatar = $_SESSION['user']['avatar'];
    }
    $query_2 = "UPDATE user SET login = '$login', email = '$email', avatar = '$avatar' WHERE user_id = '$id'";
    mysqli_query($db, $query_2);
    $_SESSION['user']['login'] = $login;
    $_SESSION['user']['email'] = $email;
    $_SESSION['user']['avatar'] = $avatar;
    header('location: profile.php');
}

if(isset($_POST['add_article']))
{
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $picture = mysqli_real_escape_string($db, $_POST['picture']);
    $text = mysqli_real_escape_string($db, $_POST['text']);
    $author = $_SESSION['user']['id'];

    if (empty($title)) 
    {
        array_push($errors, "Вы не ввели название");
    }
    if (empty($picture)) 
    {
        array_push($errors, "Вы не ссылку на изображение");
    }
    if (empty($text)) 
    {
        array_push($errors, "Вы не ввели основной текст статьи");
    }

    if (count($errors) == 0) 
    {
        $query_3 = "INSERT INTO post (category_id, text, post_author, title, picture) VALUES('$category', '$text', '$author', '$title', '$picture')";
        mysqli_query($db, $query_3);
        header('location: index.php');
    }
}
?>