<?php

class Posts extends Dbh
{
  // get method
  public function getPost()
  {
    $sql = "SELECT * FROM posts";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    }
  }

  // add method
  public function addPost($title, $body, $author)
  {
    $sql = "INSERT INTO posts(title, body, author) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $body, $author]);
  }

  // edit method
  public function editPost($id)
  {
    $sql = "SELECT * FROM posts WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }

  // update method
  public function updatePost($title, $body, $author, $id)
  {
    $sql = "UPDATE posts SET title = ?, body = ?, author = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $body, $author, $id]);
  }

  // delete method
  public function deletePost($id)
  {
    $sql = "DELETE FROM posts WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}
