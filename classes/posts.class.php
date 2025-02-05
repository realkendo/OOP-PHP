<?php

class Posts extends Dbh
{
  public function getPost()
  {
    $sql = "SELECT * FROM posts";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while ($result = $stmt->fetchAll()) {
      return $result;
    }
  }

  public function addPost($title, $body, $author)
  {
    $sql = "INSERT INTO posts(title, body, author) VALUES (?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$title, $body, $author]);

    header("location: {$_SERVER['HTTP_REFERER']}");
  }

  public function editPost($id)
  {
    $sql = "SELECT * FROM posts WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }
}
