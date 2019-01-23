<?php
    session_start();
    require_once('./php/mysqli_connect.php');
    include './php/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Description" content="Hangman game with leaderboard">

    <title>Hangman</title>

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
  <body lang="en">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Hangman</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <?php 
          if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
            echo "<li id='wrapper'>User: " . $_SESSION['username'] . " Score: <div id='jjj'> {$_SESSION['score']}</div></li>";
            echo "<form class='navbar-form navbar-left' action='php/logout.php' method='POST'>";
              echo "<input type='hidden' name='score' id='myField' value='" . $_SESSION['score'] . "' />";
              echo "<li><button class='btn btn-default' name='logout' type='submit'><span class='glyphicon glyphicon-log-in'></span> Sign Out</button></li>";
            echo "</form>";
          } else {
            echo "<li id='wrapper'>Score: <div id='jjj'>0</div></li>";
            echo "<li><a href='register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
            echo "<form class='navbar-form navbar-left' action='php/login.php' method='POST'>";
              echo "<div class='form-group'>";
                echo "<input type='text' class='form-control' name='username' placeholder='User' required>";
                echo "<input type='password' class='form-control' name='password' placeholder='Password' required>";
                echo "<input type='hidden' name='score' id='myField' value='0'/>";
              echo "</div>";
              echo "<button type='submit' class='btn btn-default'>Login</button>";
            echo "</form>";
          }
        ?>
        </ul>
      </div>
    </nav>
    <h1>Hangman Game</h1>
    <div id="border">
      <div id="guess"></div>
      <div id="def"></div>
      <div id="wrap">
        <h2>Score:<div id="score">
          <?php 
            if(isset($_SESSION['score'])) {
              echo "<input type='hidden' id='scoreBoard' value=' " . $_SESSION['score'] . "'/>";
            } else {
              
              echo "<input type='hidden' id='scoreBoard' value='0' />";
            }
          ?>
        </div></h2>
        <h2>Lives:<div id="lives">7</div></h2>
      </div>
      <h2><div id="word"></div></h2>
      <div id="rowButtons"></div>
      <div class="move">
          <button id="reset" class="btn btn-primary" onclick="resetGame()">Reset</button>
      </div>
    </div>
    <h3 class="leader">Leaderboard</h3> 
    <table id="rankTable" class="table">
      <thead>
        <tr>
          <th scope="col">Rank</th>
          <th scope="col">User</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        $link = connect();
        $query = "SELECT * FROM Hangman ORDER BY score DESC LIMIT 10";
        $counter = 1;
    
        /* create a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) { 
            /* execute query */
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);          
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($list);
            die();
        } 
        while($row = mysqli_fetch_assoc($results)) {
          echo "<tr>";
            echo "<th scope='row'>". $counter++ . "</th>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td>" . $row['score'] . "</td>";
          echo "</tr>";
        }
        mysqli_close($link);
      ?>
      </tbody>
    </table>
    <!-- JS Scripts-->
    <script src="./js/controller.js"></script>
    <script src="./js/view.js"></script>
    <script src="./js/model.js"></script>
    <script src="./js/init.js"></script>
  </body>
</html>