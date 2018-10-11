<?php
    session_start();
    require_once('mysqli_connect.php');
    require_once('functions.php');

    if (isset($_POST['username']) and isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = "SELECT * FROM Hangman WHERE user = ? AND pass = ?";
        
        connectionTest($username, $password, $query);
    }

    function connectionTest($username, $password, $query) {
        echo $username . "<br>";
        echo $password . "<br>";
        $link = connect();
        /* create a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);

            /* execute query */
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            countRows($results, $username);
            //$row = mysqli_fetch_assoc($results);
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        } 
    }

    function countRows($results, $username) {
        $count = mysqli_num_rows($results);
        if ($count == 1){
            $_SESSION['username'] = $username;
        }else{
            echo "Invalid Login Credentials.";
            mysqli_close($link);
            die();
        }
    }
    /*
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "Hai " . $username . "";
        echo "This is the Members Area";
        echo "<a href='logout.php'>Logout</a>";  
    } */
?>