<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "iwt");

if (!$conn) {
    die("Connection Failed!" . mysqli_connect_error());
}

$id = $_SESSION['id'];


$sql = "SELECT * from user_table where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$username = $row['username'];
$email = $row['user_email'];
$password = $row['user_password'];

if (isset($_POST['updatebtn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $sql1 = "UPDATE user_table set id=$id, firstname ='$firstname', lastname='$lastname', username='$username', user_email ='$email', user_password='$password' where id=$id";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        echo "User updated ";
        header('location:../login.html');
    } else {
        die(mysqli_error($conn));
    }
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>

<head>
    <title>LIFE INSURANCE</title>
    <link rel="icon" type="img/png" href="image/logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../style/header-footer.css">
    <link rel="stylesheet" type="text/css" href="../style/register.css">
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <h1>Life Insurance</h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../home.html">Home</a></li>
                <li><a href="../createpolicy.html">Create Policy</a></li>
                <li><a href="../claim.html">Make a Claim</a></li>
                <li><a href="../Payment.html">Pay Premium</a></li>
                <li><a href="../about.html">About Us</a></li>
                <li><a href="../contact.html">Contact Us</a></li>
            </ul>
        </div>
        <div class="login">
            <a href="../login.html">Login</a>
            <a href="../register.html">Register</a>
        </div>
    </div>
    <div class="wrapper">
        <h1>Update Profile</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" required autocomplete="off">
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required autocomplete="off">
            <input type="text" name="username" id="username" placeholder="Username" required autocomplete="off">
            <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off">
            <input type="password" name="pwd" id="pwd" placeholder="Password" required autocomplete="off">

            <button type="submit" name="updatebtn" id="updatebtn">Update</button>
        </form>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!--1st column-->
                <div class="footer-col">
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="../contact.html">Contact Us</a></li>
                        <li><a href="../about.html">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <!--2nd column-->
                <div class="footer-col">
                    <ul>
                        <br>
                        <br>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <!--3rd column-->
                <div class="footer-col">
                    <h4>Office</h4>
                    <ul>
                        <li><a href="">312, Galle Rd</a></li>
                        <li><a href="">Kollupitiya</a></li>
                        <li><a href="">+97 123134235</a></li>
                        <li><a href="">support@life.com</a></li>
                    </ul>
                </div>
                <!--4th column-->
                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <form action="">
                        <input type="text" placeholder="Your Name" class="inputName">
                        <input type="email" placeholder="Your Email" class="inputEmail">
                        <input type="submit" value="submit" class="inputSubmit">
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p>&#169; 2023 Life Insurance. All Rights Reserved.</p>
                </div>
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>