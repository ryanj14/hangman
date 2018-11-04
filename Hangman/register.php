<?php 
  session_start();
  if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Register</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/style.css" type="text/css" title="Default">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1 class="banner">Sign Up</h1>
    <form class="yyy" action="php/registerUser.php" method="POST">
      <div class="form-group row">
        <label for="user-input" class="col-2 col-form-label">User</label>
        <div class="col-10">
          <input class="form-control" type="text" name="user" placeholder="User" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="password-input" class="col-2 col-form-label">Password</label>
        <div class="col-10">
          <input class="form-control" name="password" type="password" required>
        </div>
      </div>
      <button type="Submit" name="Submit" value="Submit" class="btn btn-primary">Submit</button>
    </form>
  </body>
</html>