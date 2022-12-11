<?php
session_start();
include('server.php');
if (empty($_GET['id'])) 
{
    $id = 0;
} else 
{
    $id = $_GET['id'];
}
if (empty($_GET['category'])) 
{
    $category = 0;
} else 
{
    $category = $_GET['category'];
}
$single_result = mysqli_query($db, "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id WHERE p.post_id = '$id'");
$single = mysqli_fetch_assoc($single_result);
$post_query = "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id ORDER BY p.post_id DESC";
$post_result = mysqli_query($db, $post_query);

$last_post_query = "SELECT p.post_id, p.category_id, c.category_name, p.text, u.login, p.date, p.title, p.picture FROM post p INNER JOIN category c ON p.category_id = c.category_id INNER JOIN user u ON p.post_author = u.user_id WHERE p.post_id = (
    SELECT MAX(post_id)
    FROM post
)";
$last_result = mysqli_query($db, $last_post_query);
$comment_quary = "SELECT c.comment_id, c.text, c.date, u.login, u.avatar FROM comment c INNER JOIN user u ON c.comment_author = u.user_id WHERE c.post_id = '$id' ORDER BY c.comment_id";
$comment_result = mysqli_query($db, $comment_quary);

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

if (isset($_POST['remove_comment'])) 
{
    $comment_id = $_POST['remove_comment'];
    $remove_query = "DELETE FROM comment WHERE comment_id = '$comment_id'";
    mysqli_query($db, $remove_query);
    header("Refresh:0");
}

if (isset($_POST['edit_article'])) 
{
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

if (isset($_POST['remove_article'])) 
{
    $post_id = $_POST['remove_article'];
    $remove_query = "DELETE FROM post WHERE post_id = '$post_id'";
    mysqli_query($db, $remove_query);
    header("location: index.php");
}

?>