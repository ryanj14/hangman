<?php
    require_once('mysqli_connect.php');
    require_once('functions.php');

    if(isset($_POST['Submit']) && !empty($_POST['Submit'])) {
        /* Establishing a connection to the database */
        $link = connect();
        $query = "INSERT INTO Hangman 
        (id, `user`, `pass`)
      VALUES 
        (NULL, ?, ?)";
        $user = $_POST["user"];
        $pass = $_POST["password"];
        userRegister($link, $query, $user, $pass);
    } else {
        echo "isset broken";
        die();
    }

    function userRegister($link, $query, $user, $pass) {
        /* Creating a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) {
    
            /* Bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    
            /* Execute query */
            mysqli_stmt_execute($stmt);

            /* Closing the prepared statement */
            mysqli_stmt_close($stmt);

            /* Closing connection to the database */
            mysqli_close($link);

            header("Location: index.php");
            die();
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        }
    }
    /* 
        session var for score
        update session var each game
        update dbs with new var if it's higher than previous score once user log out
    */
?>