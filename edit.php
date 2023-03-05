<?php

require('./config/Connection.php');

$connection = new Connection();

$db = $connection->getConnection();

$stmt = $db->prepare('SELECT * FROM tasks WHERE id = :id');
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$connection->closeConnection();

?>


<!DOCTYPE html>
<html lang="en">

<?php require('./common/head.php') ?>

<body>

  <main class="container">
    <?php if ($data) : ?>
      <form class="form" method="POST" action="index.php?action=edit">
        <input type="hidden" name="id" value="<?= $data['id'] ?>" required>
        <label class="label" for="Task">
          Title:
          <input class="input" type="text" name="title" id="Task" value="<?= $data['title'] ?>" required>
        </label>
        <label class="label" for="Description">
          Description:
          <textarea class="input text-area" name="description" id="Description" required><?= $data['description'] ?></textarea>
        </label>
        <button class="btn btn-send" type="submit">Send</button>
      </form>
    <?php else : ?>
      <div>Not Found 404</div>
    <?php endif;  ?>

    <a class="btn btn-delete" href="index.php">
      Back
    </a>
  </main>
</body>

</html>