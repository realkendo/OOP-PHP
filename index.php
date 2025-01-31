<?php
require_once('./templates/header.php');
?>

<div class="text-center">
  <!-- Button trigger modal -->
  <button type="button" class="my-5 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
    Create Post
  </button>
</div>


<!-- Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CREATE A NEW POST</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- form input -->
        <form action="#">
          <!-- title -->
          <div class="form-group">
            <label for="">Title: </label>
            <input class="form-control" name="post-title" type="text" required>
          </div>
          <!--content  -->
          <div class="form-group">
            <label for="">Content: </label>
            <input class="form-control" name="post-title" type="text" required>
          </div>

          <div class="form-group">
            <label for="">Title: </label>
            <input class="form-control" name="post-title" type="text" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<?php
require_once('./templates/footer.php');
?>