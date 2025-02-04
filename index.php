<?php

include './includes/class-autoload.inc.php';
require_once './templates/header.php';

?>
<!-- modal button -->
<div class="text-center">
  <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
    <i class="bi bi-pencil mx-1"></i>Create Post
  </button>
</div>


<!-- post heading -->
<div class="text-center">
  <h3 class="text-decoration-underline">Recent Posts</h3>
</div>


<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">CREATE A NEW POST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form input -->
        <form action="post.process.php" method="POST">
          <!-- title -->
          <div class="form-group">
            <label for="">Title: </label>
            <input class="form-control" name="post-title" type="text" placeholder="Title of the post..." required>
          </div>
          <!-- Content -->
          <div class="form-group">
            <label for="post-content">Content:</label>
            <textarea class="form-control" name="post-content" id="post-content" rows="5"
              placeholder="Write your post here..." required></textarea>
          </div>
          <!-- author -->
          <div class="form-group">
            <label for="">Author: </label>
            <input class="form-control" name="post-author" type="text" placeholder="Name of Author" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <i class="bi bi-x-circle mx-1"></i>Close
            </button>
            <button type="submit" name="submit" class="btn btn-primary">
              <i class="bi bi-plus-circle mx-1"></i>Add Post
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- dynamically displaying posts -->
<div class="row">
  <?php $posts = new Posts(); ?>
  <?php if ($posts->getPost()): ?>
    <?php foreach ($posts->getPost() as $post): ?>
      <div class="col-md-6">
        <div class="card my-3 mx-2">
          <div class="card-body">
            <h5 class="card-title"> <?= $post['title']; ?> </h5>
            <p class="card-text">
              <?= $post['body']; ?>
            </p>
            <h6 class="card-subtitle text-muted text-right my-2">Author: <?= $post['author']; ?></h6>
            <button class="btn btn-warning"><i class="bi bi-pencil-square mx-1"></i>Edit</button>
            <buttton class="btn btn-danger"><i class="bi bi-trash mx-1"></i>Delete</buttton>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <h1>No data</h1>
  <?php endif; ?>

</div>

<?php
require_once './templates/footer.php';
?>