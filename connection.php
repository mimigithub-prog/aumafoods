<?php
$server = "localhost";
$username = "aumarjty_auma";
$password = "aBN@,0_GYWLM";
$db       = "aumarjty_auma";

//create a connection
$conn = mysqli_connect ( $server, $username, $password, $db );

    //check connection
    
    if(!$conn ){
        die( "connection failed: " . mysqli_connect_error() );
    }else{ 

        //echo "Connected successfully";
    }
?>
