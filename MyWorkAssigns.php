<?php
 include('connection.php'); 


//session_set_cookie_params( 60,"/");
session_start();

if (!isset($_SESSION["exists"])){
    header("Location: login.php");
    
}
else{
  $uname  =  $_SESSION["username"];


}

error_reporting(0);

 include('insert.php'); 


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Work Assigns</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

</head>
<style>
body {
    text-align: center;
}
form {
    display: inline-block;
}
</style>
<body>
<ul class="nav blue-gradient py-4 mb-md-0 mb-4 font-weight-bold z-depth-1">
      <li class="nav-item">
        <a class="nav-link white-text" href="index.php">Work Assign Form</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active white-text" href="MyWorkAssigns.php">My Work Assigns</a>
      </li>
      

    <li class="nav-item" id="ReportTab">
        <a class="nav-link white-text"  href="searchAll.php" >All Reports</a>
      </li>

<li class="nav-item">
        <a class="nav-link white-text" href="logout.php">Log Out</a>
      </li>
    </ul>



    <div>
    </div>
    <table class="table table-hover">
    <thead class="blue white-text">
    
  </tbody>
</table>




<?php


    $sqlSelect = "SELECT * FROM `workassign` WHERE `User`='$uname' ORDER BY `inDate` desc LIMIT 40 ";
    $result = mysqli_query($conn, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>    
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class='table table-hover '>
        <thead class="blue white-text">
            <tr>
                <th>Id</th>
                <th>In Date</th>
                <th>In Time</th>
                <th>Out Date</th>
                <th>Out Time</th>
                <th>Duration</th>
                <th>Work</th>
                <th>Breakfast</th>
                <th>Lunch</th>
                <th>Dinner</th>
                <th>Approved By</th>
                <th></th>
            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
      

?>                  
        <tbody>
        <tr>
        <td><?php  echo $row['Id']; ?></td>
            <td><?php  echo $row['inDate']; ?></td>
            <td><?php  echo $row['inTime']; ?></td>
            <td><?php  echo $row['outDate']; ?></td>
            <td><?php  echo $row['outTime']; ?></td>
            <td><?php  echo $row['duration']; ?></td>
            <td><?php  echo $row['work']; ?></td>
            <td><?php  echo $row['breakfast']; ?></td>
            <td><?php  echo $row['lunch']; ?></td>
            <td><?php  echo $row['dinner']; ?></td>
            <td><?php  echo $row['approve']; ?></td>
            <td>     
                <button id="btnDelete" class="btn btn-danger btn-sm" onclick="remove('<?php  echo $row['Id']; ?>')">Delete</button>
            </td>
        </tr>
        
        <?php 

    }
?> 


        </tbody>
    </table>
  </div>
<?php 
} 
?>
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index_controller.js"></script>
<script>

function  remove (id) {
console.log(id);
$.ajax({
    method: 'GET',
    url : '../WorkAssign/phpControllers/index_controller.php?remove='+id,
    aysnc: true
}).done(function(response){

    console.log("response is==",response);
    var faults = JSON.parse(response);
    console.log(faults);
    alert(response);
    location.reload();
});

};

</script>

</body>

</html>
