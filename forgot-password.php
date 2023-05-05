<?php 
  include_once('database.php');
  session_start();

  if(isset($_SESSION['loggedin'])){
    header('Location: index.php');
    exit();
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
      <form action="forgot.php" method="post">
        <div class="form-group">
          <label for="email" autocomplete="off">Email</label>
          <input
            type="email"
            class="form-control"
            name="email"
            placeholder="Email"
            required
          />
        </div>
        <button type="submit">Reset Password</button>
      </form>
      <div class="already-have-account">
        <span>Remembered your password?</span>
        <a href="login.html">Login</a>
      </div>
    </div>
  </body>
</html>
