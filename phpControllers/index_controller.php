<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="workassign";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else if (isset($_GET['remove'])){

$id=$_GET['remove'];

$result = $conn->query("DELETE FROM `workassign`.`workassign` WHERE  `Id`='$id'");


$result = (bool)(($conn->affected_rows) > 0);

if ($result) {

    $message = "Work Assign has been successfully deleted";
    

} else {

    $message = "Work Assign had not been deleted";
}


ob_clean();
echo json_encode($message);

}

?>