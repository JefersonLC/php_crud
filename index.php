<?php

require('./config/Connection.php');

$connection = new Connection();

$db = $connection->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $db->prepare('INSERT INTO tasks (title, description) VALUES(:title,:description)');
  $stmt->bindParam(':title', $_POST['title']);
  $stmt->bindParam(':description', $_POST['description']);
  $stmt->execute();
}

$stmt = $db->query('SELECT * FROM tasks');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$connection->closeConnection();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tareas</title>
</head>

<body>
  <?php foreach ($data as $key => $value) : ?>
    <div>
      <h5><?= $value['title'] ?></h5>
      <div><?= $value['description'] ?></div>
    </div>
  <?php endforeach; ?>

  <a href="create.php">
    Add Task
  </a>
</body>

</html>