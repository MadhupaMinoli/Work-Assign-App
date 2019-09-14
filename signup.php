<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->



<?php

// if (!(isset($_POST["username"]) && isset($_POST["passowrd"]))){
//     header("Location: login.php");
// }


$message = '';
$uname = $_POST["username"];
$upassword = $_POST["password"];
$repassword = $_POST["repassword"];



$connection = mysqli_connect("localhost","root","","workassign","3306");
if (!$connection){
    echo "Could not establish the connection", "<br>";
    echo mysqli_connect_error();
}else{

    $result = $connection->query("INSERT INTO `workassign`.`login` (`username`,`password`)
     VALUES ('$uname','$upassword')");
    if($result) {
        $message = "Successfully Signed Up";
    }
    else{
        $message = " Error Occured";
    }
}
?>
<main class="container">
    <div class="alert alert-danger">
        <?php echo $message ?>
    </div>
    <p>
        Return to <a href="login.php">Login</a>
    </p>
</main>




