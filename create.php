<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Task</title>
</head>

<body>
  <form method="POST" action="index.php">
    <label for="Task">
      Title:
      <input type="text" name="title" id="Task" required>
    </label>
    <label for="Description">
      Description:
      <input type="text" name="description" id="Description" required>
    </label>
    <button type="submit">Send</button>
  </form>

  <a href="index.php">
    Back
  </a>
</body>

</html>