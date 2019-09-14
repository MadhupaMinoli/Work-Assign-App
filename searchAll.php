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
?>
<html>
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


 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css" />
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
--><link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">



</head>
<style>
    #datatable{
        width:100;
    }
thead,tfoot {background-color: #F0F0F0}
.navbar-inverse .navbar-nav>li>a {
    color: WHITE;
}
.navbar-inverse .navbar-brand {
    color: WHITE;
}
div.dt-buttons{
width: -webkit-fill-available;

}
body{
    font-size:16px;
    
}
.btn{
    height:56px;
    
}

select {
    display: block;
}
    </style>


<body>

<ul class="nav blue-gradient py-4 mb-md-0 mb-4 font-weight-bold z-depth-1">
      <li class="nav-item">
        <a class="nav-link white-text" href="index.php">Work Assign Form</a>
      </li>
      <li class="nav-item">
        <a class="nav-link  white-text" href="MyWorkAssigns.php">My Work Assigns</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active white-text" href="searchAll.php">All Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link white-text" href="logout.php">Log Out</a>
      </li>
    </ul>


<div class="card" style="height: 200px; width: 500px; margin:auto;">

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
    
        <!-- Form -->
        
        <form id=searchForm class="text-center" style="color: #757575;">
        
            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input  type="text"  class="form-control datepicker" name="startDate" id="startDate" autocomplete="off" >
                        <label for="startDate">Start Date</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                    <input  type="text"  class="form-control datepicker" name="endDate" id="endDate" autocomplete="off" >
                        <label for="endTime">End Time</label>
                    </div>
                </div>
            </div>
        </form>
        

    </div>

</div>
<div class="card" style="
width: 600px;
margin:auto;
" >
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-mdb-color waves-effect" name="showReport" id="showReport" > Show Report</button>
  <button type="button" class="btn btn-outline-mdb-color waves-effect" onclick="searchTable()">Search More</button>
  <button type="button" class="btn btn-outline-mdb-color waves-effect" id="btnClear" onclick="clearTable()">Clear Table</button>
</div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">     
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <table class='table table-hover ' id="tblSearch">
        <thead class="light-blue white-text">
            <tr>
                <th>Id</th>
                <th>User</th>
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
                
            </tr>
            </thead>
                <tbody>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            <hr>
        </div>
    </div>
    <!-- <button class="btn btn-info col-lg-offset-10" onclick="tableToExcel('tblSearch', 'W3C Example Table')">Download Report</button> -->



<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 


<script type="text/javascript" src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
  
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script src="Js/search_controller.js"></script>
<script src="Js/search.js"></script> 
<script src="Js/TableToExcel.js"></script>



</body>
</html>