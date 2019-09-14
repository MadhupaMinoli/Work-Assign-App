

$('#inTime,#outTime').pickatime({
    twelvehour: false,
   
  });
  
  // Data Picker Initialization
  $("#inDate,#outDate").pickadate({
    format: "yyyy-mm-dd",
    autoclose:true,
});

    $('#timeDifference').on('click', function() {
      if (($('#inTime').val()!="") && ($('#outTime').val()!="") && ($('#inDate').val()!="") && ($('#outDate').val()!="")){
      var dl = document.getElementById("diff");
      while (dl.hasChildNodes()) {
        dl.removeChild(dl.lastChild);
      }
  
  
      var date1 = new Date($('#inDate').val() + " " + $('#inTime').val()).getTime();
      var date2 = new Date($('#outDate').val() + " " + $('#outTime').val()).getTime();
      var msec = date2 - date1;
      var mins = Math.floor(msec / 60000);
      var hrs = Math.floor(mins / 60);
      var days = Math.floor(hrs / 24);
      var yrs = Math.floor(days / 365);
      mins = mins % 60;
      hrs = hrs % 24;
      
  if (days>=0 && hrs>=0 && mins >=0){
          $('#diff').val(days + " days, " + hrs + " hrs, " + mins + " mins");
      }
  
  else{
      
      $('#diff').val("Invalid Date-Time Inputs");
      $('#inTime').val("");
      $('#inDate').val("");
      $('#outTime').val("");
      $('#outDate').val("");
  }
  
      }
      
      
  
  
  
    });
  
  
  
  
function remove (id) {
  console.log(id);
  $.ajax({
      method: 'GET',
      url : '../WorkAssign/phpControllers/index_controller.php?remove='+id,
      aysnc: true
  }).done(function(response){
  
      console.log("response is==",response);
      var faults = JSON.parse(response);
      console.log(faults);
  });
  
  };
  
  