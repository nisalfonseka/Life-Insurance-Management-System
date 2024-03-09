<?php

$serverName="localhost";
$username="root";
$password="";
$databaseName="iwt";

$con =mysqli_connect($serverName,$username,$password,$databaseName);

if(!$con)
{
    die("connection faild:".mysqli_connect_error());
}
// else 
// {
//     echo "sucessfily";
// }


?>