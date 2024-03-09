<?php

$con = mysqli_connect("localhost", "root", "", "iwt");

if (!$con){
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['claimbtn']))
{   
    
    $policyNo    = $_POST['policyNumber'];
    $report   = $_POST['reportdate'];
    $name     = $_POST['nameOfInsured'];
    $beneficiaryName = $_POST['nameOfBeneficiary'];
  
    $sql = "INSERT INTO claim (policy_number, date_of_report, name, beneficiary_name) VALUES ('$policyNo', '$report', '$name', '$beneficiaryName')";

    $result = mysqli_query($con, $sql);
        
    if($result)
    {
         echo "Payment Successful";
        header('location:../viewclaim.php');
    }
      else{
       die(mysqli_error($con));
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_sql = "DELETE FROM claim WHERE claim_id = '$id'";

    // Execute the delete query
    if ($con->query($delete_sql)) {
        ?>
        <script>
             window.alert("delete Successfully");
             window.location.href ="../viewclaim.php";
    </script>
        <?php
        exit(0);
        } else 
        {
            ?>
        <script>
            window.alert("job not delete Successfully");
            window.location.href ="../viewclaim.php";
            </script>
        <?php
            exit(0);    
        }

}
$con->close();
?>
