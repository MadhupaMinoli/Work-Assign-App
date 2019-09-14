<?php

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
        <a class="nav-link active white-text" href="index.php">Work Assign Form</a>
      </li>
      <li class="nav-item">
        <a class="nav-link white-text" href="MyWorkAssigns.php">My Work Assigns</a>
      </li>

    <li class="nav-item" id="ReportTab">
        <a class="nav-link white-text"  href="searchAll.php" >All Reports</a>
      </li>

<li class="nav-item">
        <a class="nav-link white-text" href="logout.php">Log Out</a>
      </li>
      
    </ul>
<div class="card" style="
height: 750px;
width: 500px;
margin:auto;
">


    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Work Assign Form</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
    <?php if (isset($_SESSION['message'])): ?>

<div class="alert alert-success msg">
    <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
    ?>
</div>
<?php endif ?>
        <!-- Form -->
        
        <form class="text-center" action="insert.php" method="post" style="color: #757575;">
        
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input  type="text" name="inDate" id="inDate" class="form-control datepicker" required>
                        <label for="inDate">In Date</label>
                        
                        
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input  type="text" name="inTime" id="inTime" class="form-control timepicker" required>
                        <label for="inTime">In Time</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input  type="text" name="outDate" id="outDate" class="form-control datepicker" required>
                        <label for="outDate">Out Date</label>
                        
                        
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input  type="text" name="outTime" id="outTime" class="form-control timepicker" required>
                        <label for="outTime">Out Time</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <button class ="btn blue-gradient"type="button" id="timeDifference">Duration</button>
                        
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input id="diff" name="diff" required> 
                        
                    </div>
                </div>
            </div>
            
            <div class="md-form mt-0">
                <input type="text" id="work" name="work" class="form-control" required>
                <label for="work">Work</label>
            </div>
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="breakfast" id="breakfast" value="Yes">
                        <label class="custom-control-label" for="breakfast">Breakfast</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="lunch" id="lunch" value="Yes">
                        <label class="custom-control-label" for="lunch">Lunch</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="dinner" id="dinner" value="Yes">
                        <label class="custom-control-label" for="dinner">Dinner</label>
                    </div>
                </div>
            </div>
            <div class="md-form">
                
                <select class="browser-default custom-select mb-4" name="approvedBy" required>
                    <option value="" disabled selected>Approved By</option>
                    <option value="Sameera Liyanaarachchi" >Sameera Liyanaarachchi</option>
                    <option value="Neranjan Chandrasekara">Neranjan Chandrasekara</option>
                    <option value="Sachin Jayasundara">Sachin Jayasundara</option>
                    <option value="Preethikumar Thilakarathne">Preethikumar Thilakarathne</option>
                    <option value="Sampath De Silva" >Sampath De Silva</option>
                    <option value="Sudheera Bandara">Sudheera Bandara</option>
                    <option value="Pradeep Krishantha">Pradeep Krishantha</option>
                    <option value="Avantha Basnayaka">Avantha Basnayaka</option>
                    <option value="Indika Fernando">Indika Fernando</option>
                    <option value="Keshani Perera">Keshani Perera</option>
                    <option value="Darshana Kariyapperuma">Darshana Kariyapperuma</option>
                    <option value="Sachinda Rajapaksha">Sachinda Rajapaksha</option>
                </select>
                
            </div>

            <!-- Sign up button -->
            <button class="btn btn-info my-4 btn-block" type="submit">Submit</button>
            
            <hr>
        </form>
        

    </div>

</div>

  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index_controller.js"></script>
  
</body>

</html>
