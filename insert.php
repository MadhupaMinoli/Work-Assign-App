


<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["exists"])){
    header("Location: login.php");
    
}
else{
  $uname  =  $_SESSION["username"];
  

}


$connection = mysqli_connect("localhost", "root", "", "workassign", "3306");
if (!$connection) {
    echo "Could not able to establish the connection", "<br>";
    echo mysqli_connect_error();
    die;
}



if(!empty($_POST['inDate'])&& isset($_POST['inTime']) && !empty($_POST['outDate']) && isset($_POST['outTime'])&& isset($_POST['work'])&& isset($_POST['approvedBy'])) {
    $inDate = $_POST['inDate'];
    $inTime = $_POST['inTime'];
    $outDate = $_POST['outDate'];
    $outTime = $_POST['outTime'];
    $duration = $_POST['diff'];
	$work = $_POST['work'];
    $breakfast = $_POST['breakfast'];
    $lunch = $_POST['lunch'];
    $dinner= $_POST['dinner'];
    $approvedBy= $_POST['approvedBy'];
  
    
    $in=$inDate+" "+$inTime;
    echo $in;


    $result = $connection->query("INSERT INTO `workassign`.`workassign` (`user`,`inDate`,`inTime`,`outDate`,`outTime`,`duration`,`work`,`breakfast`,`lunch`,`dinner`,`approve`)
     VALUES ('$uname','$inDate','$inTime','$outDate','$outTime','$duration','$work','$breakfast','$lunch','$dinner','$approvedBy')");

    $result = (bool)(($connection->affected_rows) > 0);
    echo $result;

   if($result){
       $_SESSION["message"]="Succesfully Submitted" ;
        header("location:index.php");}
    else{
        $_SESSION["message"]="Error in submission" ;

    }   
        
       
   
     }

    
    
    


?>