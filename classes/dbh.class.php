<?php

class Dbh
{
  private $host = "localhost";
  private $user = "root";
  private $pwd = "admin";
  private $dbName = "oopBlog";

  public function connect()
  {
    $dsn = 'my-sql:host=' . $this->host . ';dbName=' . $this->dbName;
    $pdo = new PDO($dsn, $this - user, $this - pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}