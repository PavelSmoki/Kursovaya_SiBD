<?php
session_start();

$db = mysqli_connect('127.0.0.1', 'root', '', 'portal');

if ($db == false)
{
    echo "Ошибка подключения";
}
$post_query = "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id";
$post_result = mysqli_query($db,$post_query);

$last_post_query = "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id WHERE p.post_id = (
    SELECT MAX(post_id)
    FROM post
)";
$last_result = mysqli_query($db, $last_post_query);

?>