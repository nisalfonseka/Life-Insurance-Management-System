<?php

$con = mysqli_connect("localhost", "root", "", "iwt");

if (!$con){
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['createbtn']))
{   
    
    $policyType     = $_POST['PolicyType'];
    $title     = $_POST['title'];
    $fullname   = $_POST['name'];
    $nic    = $_POST['nic'];
    $age   = $_POST['age'];
    $contactNumber   = $_POST['contNo'];
    $address   = $_POST['address'];
    $benName   = $_POST['beneficiaryName'];
    $benContact   = $_POST['beneficiaryContact'];
    
    
    $sql = "INSERT INTO create_policy (policyType, title, name_with_initial, nic, age, contactNumber, address, beneficiaryName, beneficiaryContact) VALUES ('$policyType', '$title', '$fullname', '$nic', '$age', '$contactNumber','$address','$benName','$benContact')";

    $result = mysqli_query($con, $sql);
        
    if($result)
    {
         echo "Policy Successful";
       header('location:../viewPolicy.php');
    }
      else{
       die(mysqli_error($con));
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_sql = "DELETE FROM create_policy WHERE id = '$id'";

    // Execute the delete query
    if ($con->query($delete_sql)) {
        ?>
        <script>
             window.alert("delete Successfully");
             window.location.href ="../viewPolicy.php";
    </script>
        <?php
        exit(0);
        } else 
        {
            ?>
        <script>
            window.alert("job not delete Successfully");
            window.location.href ="../viewPolicy.php";
            </script>
        <?php
            exit(0);    }

}
$con->close();
?>
