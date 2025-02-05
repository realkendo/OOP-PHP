<?php
require_once './templates/header.php';
include "./includes/class-autoload.inc.php";

$posts = new Posts();
$post = $posts->editPost($_GET['id']);
$id = $post['id'];
$title = $post['title'];
$body = $post['body'];
$author = $post['author'];

?>

<div class="text-center my-4">
  <h3>Edit Post</h3>
</div>
<div class="row">
  <div class="col-md-7 mx-auto">
    <!-- form input -->
    <form action="post.process.php?id=<?= $id ?>" method="POST">
      <!-- title -->
      <div class="form-group">
        <label for="">Title: </label>
        <input class="form-control" name="post-title" type="text" value="<?= $title ?>" placeholder="Title of the post..." required>
      </div>
      <!-- Content -->
      <div class="form-group">
        <label for="post-content">Content:</label>
        <textarea class="form-control" name="post-content" id="post-content" rows="5"
          placeholder="Write your post here..." required>
              <?= $body ?>
            </textarea>
      </div>
      <!-- author -->
      <div class="form-group">
        <label for="">Author: </label>
        <input class="form-control" name="post-author" type="text" value="<?= $author ?>" placeholder="Name of Author" required>
      </div>
      <a href="index.php" type="button" class="btn btn-danger m-2">
        <i class="bi bi-x-circle mx-2"></i>Close
      </a>
      <button type="submit" name="update" class="btn btn-success m-2">
        <i class="bi bi-save2 mx-2"></i>Update Post
      </button>
    </form>
  </div>
</div>


<?php
require_once './templates/footer.php';
?>