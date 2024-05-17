<?php
require('connection.php');




if (isset($_POST['submit1'])) {
    $resname = $_POST['delname'];
    $resnum = $_POST['delphone'];
    $resadd = $_POST['deladdress'];
    $rescity = $_POST['delcity'];

    // Wrap string values in single quotes in the SQL query
    $query = "INSERT INTO delivery(name, Phone, address, city, del_date, del_time) 
              VALUES ('$resname', '$resnum', '$resadd', '$rescity', NOW(), NOW())";

    if ($result = mysqli_query($conn, $query)) {
        echo "
        <script>
            alert('Details Received.');
            window.location.href='admin.php'; // Redirect to checkout page
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Cannot Run Query.');
            window.location.href='delivery.php';
        </script>
        ";
    }
}
?>