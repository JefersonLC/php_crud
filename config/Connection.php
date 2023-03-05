<?php

class Connection
{
  private string $host = "localhost";
  private string $user = "root";
  private string $password = "";
  private string $db = "db_tasks";
  private PDO|null $connection;

  public function __construct()
  {
    try {
      $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
    }
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public function closeConnection()
  {
    $this->connection = null;
  }
}
