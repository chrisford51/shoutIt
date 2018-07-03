<?php

//Connect to the database

$connection = mysqli_connect("localhost", "chrisdaw_admin", "Fairburn123", "chrisdaw_shoutit");


//Test connection
if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' .mysqli_connect_error();
    
}


?>