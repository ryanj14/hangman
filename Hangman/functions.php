<?php
// Connects to the database
function connect(){
    // Connecting to the database
    $list = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // If we don't connect to the database it will spit out an error for us to fix
    if(!$list) {
        die("Connection failed: ".mysqli_connect_error()); // Remove the connect_error method after done testing because of hacking issues.
    } else {
        return $list;
    }
}

// Checking to see if we actually placed the data into the database
function sqlCheck($list, $sql){
    if (!(mysqli_query($list, $sql))) {
        echo "Error: " . $sql . "<br>" . mysqli_error($list). "<br>";
        mysqli_close($list);
        die();
    } else {
        header('Location: index.php');
        mysqli_close($list);
    }
}
?>