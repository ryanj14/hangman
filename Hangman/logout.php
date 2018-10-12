<?php
    session_start();
    require_once('mysqli_connect.php');
    require_once('functions.php');

    if(isset($_POST['logout'])) {
        updateScore();
    } else {
        echo "Not working";
    }

    function updateScore() {
        $updateScore = $_POST['score'];
        $score = $_SESSION['score'];
        $user = $_SESSION['username'];
        $query = "UPDATE Hangman
                  SET score = ?
                  WHERE user = ? AND score = ?";

        $link = connect();
        /* create a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "isi", $updateScore, $user, $score);

            /* execute query */
            mysqli_stmt_execute($stmt);
            
            killSession($link);
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        } 
    }

    function killSession($link) {
        session_start();
        session_destroy();
        mysqli_close($link);
        header('Location: index.php');
        die();
    }
?>