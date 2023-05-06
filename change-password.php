<?php 
  include_once('database.php');
  session_start();

  if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AdminLTE 3 | Recover Password</title>
    <link rel="stylesheet" href="src/style.css" />
  </head>
  <body>
    <div class="aform">
      <h2>Reset Password</h2>
      <form action="change-pass.php" method="post">
        <div class="form-group">
          <label for="old_password">Old Password</label>
          <input
            type="password"
            class="form-control"
            name="old_password"
            placeholder="Password"
            required
          />
        </div>
        <div class="form-group">
          <label for="new_password">New Password</label>
          <input
            type="password"
            class="form-control"
            name="new_password"
            placeholder="Confirm Password"
            required
          />
        </div>
        <button type="submit">Update Password</button>
        <a href="index.php"><button class="red">Home - Back</button></a>
        <a href="logout.php"><button class="red">Logout</button></a>
      </form>

    </div>
  </body>
</html>