<?php

include('./includes/class-autoload.inc.php');
require_once('./templates/header.php');

$posts = new Posts();
print_r($posts);

?>

<div class="text-center">
  <!-- Button trigger modal -->
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
        <form action="#">
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
            <input class="form-control" name="post-title" type="text" placeholder="Name of Author" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <i class="bi bi-x-circle mx-1"></i>Close
            </button>
            <button type="button" class="btn btn-primary">
              <i class="bi bi-save mx-1"></i>Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- posts -->
<div class="row">
  <!-- post one -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">POST ONE</h5>
        <p class="card-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta excepturi, aliquid non explicabo ratione hic
          unde! Velit quisquam totam qui ad quaerat deleniti delectus! Optio molestias ipsam temporibus sed quis.
        </p>
        <h6 class="card-subtitle text-muted text-right my-2">Author: Kendo Matic</h6>
        <button class="btn btn-warning">Edit</button>
        <buttton class="btn btn-danger">Delete</buttton>
      </div>
    </div>
  </div>

  <!-- post one -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">POST Two</h5>
        <p class="card-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta excepturi, aliquid non explicabo ratione hic
          unde! Velit quisquam totam qui ad quaerat deleniti delectus! Optio molestias ipsam temporibus sed quis.
        </p>
        <h6 class="card-subtitle text-muted text-right my-2">Author: Jessi Kant</h6>
        <button class="btn btn-warning">Edit</button>
        <buttton class="btn btn-danger">Delete</buttton>
      </div>
    </div>
  </div>
</div>

<?php
require_once('./templates/footer.php');
?>