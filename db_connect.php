<?php
    #these are when u first time install xampp and u don't change anything
    $servername ="localhost"; 
    $username ="root";
    $password ="";
    $database ="chatroom";

//creating database connection
 
$conn= mysqli_connect( $servername, $username, $password, $database);

//checking connection
if(!$conn)
{
    die("failed to connect". mysqli_connect_error());
}






?>