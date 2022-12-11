<?php
session_start();
include('server.php');
$id = $_GET['id'];
$single_result = mysqli_query($db, "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id WHERE p.post_id = '$id'");
$single = mysqli_fetch_assoc($single_result);

if (isset($_POST['edit_article'])) {
    $post_id = $single['post_id'];
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $picture = mysqli_real_escape_string($db, $_POST['picture']);
    $text = mysqli_real_escape_string($db, $_POST['text']);

    if (empty($title)) {
        $title = $single['title'];
    }
    if (empty($picture)) {
        $picture = $single['picture'];
    }
    if (empty($text)) {
        $text = $single['text'];
    }
    $query_3 = "UPDATE post SET title = '$title', category_id = '$category', picture = '$picture', text = '$text' WHERE post_id = '$post_id'";
    mysqli_query($db, $query_3);
    header("location: single.php?id=$id");
}
?>