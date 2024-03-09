<?php
    require 'php/connection.php';
    session_start();


$select_sql = "SELECT * FROM create_policy";
$result = $con->query($select_sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>View Policy</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style/viewpayment.css"> 
    <link rel="stylesheet" type="text/css" href="style/header-footer.css">

    <script src=""></script>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <h1>Life Insurance</h1>
        </div>
        <div class="menu">
            <ul>
            <li><a href="home.html">Home</a></li>
                    <li><a href="createpolicy.html">Create Policy</a></li>
                    <li><a href="claim.html">Make a Claim</a></li>
                    <li><a href="Payment.html">Pay Premium</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>   
            </ul>
        </div>
        <div class="login">
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        </div>
    </div>
</body>


<body>
    <h1 class="payment">Policy Details</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Policy Type</th>
            <th>Title</th>
            <th>Full Name</th>
            <th>NIC</th>
            <th>Age</th>
            <th>ContactNo</th>
            <th>Address</th>
            <th>Beneficiary Name</th>
            <th>Beneficiary Contact No</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['policyType'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['name_with_initial'] . "</td>";
                echo "<td>" . $row['nic'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['contactNumber'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['beneficiaryName'] . "</td>";
                echo "<td>" . $row['beneficiaryContact'] . "</td>";
                echo '<td><a href="php/createPolicy.php?id=' . $row['id'] . '&action=delete" name="delete_ci">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found in the table.</td></tr>";
        }
        ?>
    </table>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!--1st column-->
                <div class="footer-col">
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="about.html">About Us</a></li>
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

<?php
$con->close();
?>