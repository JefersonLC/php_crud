<!DOCTYPE html>
<html lang="en">

<?php require('./common/head.php') ?>

<body>
  <main class="container">
    <form class="form" method="POST" action="index.php?action=create">
      <label class="label" for="Task">
        Title:
        <input class="input" type="text" name="title" id="Task" required>
      </label>
      <label class="label" for="Description">
        Description:
        <textarea class="input" name="description" id="Description" required></textarea>
      </label>
      <button class="btn btn-send" type="submit">Send</button>
    </form>
    <a class="btn btn-send" href="index.php">
      Back
    </a>
  </main>
</body>

</html>