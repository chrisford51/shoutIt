<?php 
    include 'database.php';


//Check if form was submitted 

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($connection, $_POST['user']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);
    
    //Set timezone and get time of user in Eastern Time
    date_default_timezone_set('America/New_York');
    $time = date('h:i:s a', time());
    
    //Validate input
    if (!isset($user) || $user == '' || !isset($message) || $message == '') {
        $error = "Form had errors!";
        header("Location: index.php?error=".urlencode($error));
        exit();
    } else { //Create query to insert fields and time into shouts Table.
        $query = "INSERT INTO shouts (user, message, time)
            VALUES ('$user', '$message', '$time')";
            
            //If query didn't INSERT into SQL table, give an error and die. 
        if (!mysqli_query($connection, $query)) {
            die('Error: '.mysqli_error($connection));
        } else { //If query did INSERT, redirect to index
            header("location: /projects/shoutit/index.php");
            exit();
        }
    }
}


?>