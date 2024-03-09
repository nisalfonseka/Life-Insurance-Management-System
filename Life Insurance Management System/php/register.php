<?php

$conn = mysqli_connect("localhost", "root", "", "iwt");

if (!$conn){
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['submitbtn']))
{
    $firstname     = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $username   = $_POST['username'];
    $email   = $_POST['email'];
    $password    = $_POST['pwd'];
    
    $sql = "INSERT INTO user_table (firstname, lastname, username, user_email, user_password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";

    $result = mysqli_query($conn, $sql);
        
    if($result)
    {
        echo "User successfully created";
        header('location: ../login.html');
    }
    else{
        die(mysqli_error($conn));
    }
}
    
mysqli_close($conn);

?>
