<?php

require('./config/Connection.php');

$connection = new Connection();

$db = $connection->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  switch ($_GET['action']) {
    case 'edit':
      $stmt = $db->prepare('UPDATE tasks SET title = :title, description = :description WHERE id = :id');
      $stmt->bindParam(':title', $_POST['title']);
      $stmt->bindParam(':description', $_POST['description']);
      $stmt->bindParam(':id', $_POST['id']);
      $stmt->execute();
      break;
    case 'create':
      $stmt = $db->prepare('INSERT INTO tasks (title, description) VALUES(:title,:description)');
      $stmt->bindParam(':title', $_POST['title']);
      $stmt->bindParam(':description', $_POST['description']);
      $stmt->execute();
      break;
    default:
      return;
  }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
  $stmt = $db->prepare('DELETE FROM tasks WHERE id = :id');
  $stmt->bindParam(':id', $_GET['id']);
  $stmt->execute();
}

$stmt = $db->query('SELECT * FROM tasks');
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$connection->closeConnection();

?>


<!DOCTYPE html>
<html lang="en">

<?php require('./common/head.php') ?>

<body>
  <main class="container">
    <section class="cards">
      <?php foreach ($data as $key => $value) : ?>
        <div class="card">
          <div class="card-header">
            <h4 class="title"><?= $value['title'] ?></h4>
            <span class="task-number">ID: #<?= str_pad($value['id'], 3, "0", STR_PAD_LEFT) ?></span>
          </div>
          <div class="card-body">
            <p class="description"><?= $value['description'] ?></p>
          </div>
          <div class="card-footer">
            <a href="edit.php?id=<?= $value['id'] ?>" class="btn btn-edit">Edit</a>
            <a href="index.php?action=delete&id=<?= $value['id'] ?>" class="btn btn-delete">Delete</a>
          </div>
        </div>
      <?php endforeach; ?>
    </section>
    <a class="btn btn-send" href="create.php">
      Add Task
    </a>
  </main>
</body>

</html>