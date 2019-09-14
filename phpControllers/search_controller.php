<?php

$connection = mysqli_connect("localhost", "root", "", "workassign", "3306");
if (!$connection) {
    echo '<script> alert("Could not able to establish the connection")</script>';
   echo "Could not able to establish the connection", "<br>";
    echo mysqli_connect_error();
    die;
}



if (isset($_GET['startDate']) && isset($_GET['endDate']) ){

    $startDate=$_GET['startDate'];
    $endDate=$_GET['endDate']; 
   
    
   
        $result = $connection->query("SELECT * FROM workassign WHERE `inDate` >= '$startDate' 
        AND `inDate` <= '$endDate'  " );
   
}

if(isset($result)) {
        $rows = $result->fetch_all();
        ob_clean ();
        echo json_encode($rows);
    }
    else {

        echo '<script> alert("Error in the get data")</script>';
    }


?>
