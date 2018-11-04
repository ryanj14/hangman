<?php
    session_start();
    require_once('mysqli_connect.php');
    require_once('functions.php');

    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM Hangman WHERE user = ?";
        
        connectionTest($username, $password, $query);
    }

    function connectionTest($username, $password, $query) {
        $link = connect();
        /* create a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $username);

            /* execute query */
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            countRows($results, $username, $password);
            //$row = mysqli_fetch_assoc($results);
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        } 
    }

    function countRows($results, $username, $password) {
        while ($row = mysqli_fetch_assoc($results)){
            if(password_verify($password, $row['pass'])){
                $_SESSION['username'] = $username;
                $_SESSION['score'] = $row['score'];
                header('Location: ../index.php');
            }      
        }
        header('Location: ../index.php');
        die();
    }

    function getScore($results) {
        $row = mysqli_fetch_assoc($results);
        $_SESSION['score'] = $row['score'];
        header('Location: ../index.php');
    }
?>