<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- CSS Files -->
    <link rel="stylesheet" href="css/style.css" type="text/css" title="Default">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- JS Scripts-->
    <script src="js/model.js"></script>
    <script src="js/view.js"></script>
    <script src="js/controller.js"></script>
  </head>
  <body lang="en" onload="createButton();">
    <nav class="navbar navbar-dark bg-primary">
      <?php 
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            echo "User: " . $_SESSION['username'] . " Score: " . $_SESSION['score'];
            echo " <a href='logout.php' class='btn btn-secondary btn-lg active' role='button' aria-pressed='true'>Logout</a>";
          } else {
            echo "<form class='form-inline' action='login.php' method='POST'>";
            echo "<input class='form-control mr-sm-2' name='username' placeholder='User' aria-label='Search'>";
            echo "<input class='form-control mr-sm-2' name='password' placeholder='Password' aria-label='Search'>";
            echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Login</button>"; 
          echo "</form>";
          echo "<button id='register' onclick='registerUser()'>Sign Up</button>";
          }
      ?>
    </nav>
    <h1>Hangman Game</h1>
    <div id="border">
      <div id="guess"></div>
      <div id="def"></div>
      <div id="wrap">
        <h2>Score:<div id="score">0</div></h2>
        <h2>Lives:<div id="lives">7</div></h2>
      </div>
      <h2><div id="word"></div></h2>
      <div id="rowButtons"></div>
      <div class="move">
          <button id="reset" class="btn btn-primary" onclick="resetGame()">Reset</button>
      </div>
    </div>
    <h3 class="leader">Leaderboard</h3> 
    <table id="dicks" class="table">
      <thead>
        <tr>
          <th scope="col">Rank</th>
          <th scope="col">User</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>10</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>5</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>3</td>
        </tr>
      </tbody>
    </table>
    <!-- JS Scripts-->
    <script src="js/init.js"></script>
  </body>
</html>