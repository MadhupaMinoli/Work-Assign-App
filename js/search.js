$( function() {
  $("#startDate,#endDate").pickadate({
    format: "yyyy-mm-dd",
    autoclose:true,
});
	
  } );
  

  function clearTable()

  {
   var tableRef = document.getElementById('tblSearch');
   while ( tableRef.rows.length > 0 )
   {
	tableRef.deleteRow(1);
   }
  }


