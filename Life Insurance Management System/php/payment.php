<?php

$con = mysqli_connect("localhost", "root", "", "iwt");

if (!$con){
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['payBtn']))
{   
    
    $policy     = $_POST['policy'];
    $name     = $_POST['name'];
    $cvv   = $_POST['cvv'];
    $card    = $_POST['user_card'];
    $month   = $_POST['month'];
    $year    = $_POST['year'];
    $amount    = $_POST['amount'];
    
    $sql = "INSERT INTO payment (policy, name, cvv, card, month, year, amount) VALUES ('$policy', '$name', '$cvv', '$card', '$month', '$year','$amount')";

    $result = mysqli_query($con, $sql);
        
    if($result)
    {
         echo "Payment Successful";
        header('location:../viewpayment.php');
    }
      else{
       die(mysqli_error($con));
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_sql = "DELETE FROM payment WHERE id = '$id'";

    // Execute the delete query
    if ($con->query($delete_sql)) {
        ?>
        <script>
             window.alert("delete Successfully");
             window.location.href ="../viewpayment.php";
    </script>
        <?php
        exit(0);
        } else 
        {
            ?>
        <script>
            window.alert("job not delete Successfully");
            window.location.href ="../viewpayment.php";
            </script>
        <?php
            exit(0);    
        }

}
$con->close();
?>
