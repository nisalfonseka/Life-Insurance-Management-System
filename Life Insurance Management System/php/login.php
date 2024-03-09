<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "iwt");

if (!$conn) {
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['loginbtn'])) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM user_table WHERE username = '$username' AND user_password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        // User login is successful
        $_SESSION['id'] = $row['id'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['username'] = $row['username'];  
        $_SESSION['email'] = $row['user_email'];
        $_SESSION['password'] = $row['user_password'];

        echo "User login is successful";
        //echo $_SESSION['user_id'];
        header('location: profile.php');
        exit;
    } else {
        // User login failed

        echo "<script>alert('Invalid User');</script>";
        header('location:../login.html');
        exit();
    }
}

mysqli_close($conn);
?>
