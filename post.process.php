<?php
include 'includes/class-autoload.inc.php';

$posts = new Posts();

if (isset($_POST['submit'])) {
    $title = $_POST['post-title'];
    $body = $_POST['post-content'];
    $author = $_POST['post-author'];

    $posts->addPost($title, $body, $author);
}