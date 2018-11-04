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
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
        userRegister($link, $query, $user, $pass);
    } else {
        echo "isset broken";
        echo $_POST["user"];
        echo $_POST["password"];
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

            header("Location: ../index.php");
            die();
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        }
    }
?>