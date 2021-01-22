<?php

$con = new mysqli("localhost", "root", "","robotics_website");

    if( $con->connect_error ) 
    {
        echo "Cannot connect";
        die();
    }
    else
    {
        echo "Connected successfully<br>";    
    }
    
?>