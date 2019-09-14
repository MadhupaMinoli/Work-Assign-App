
    $('#showReport').click(function () {
    
    $.ajax({
        method: 'GET',
        url : '../WorkAssign/phpControllers/search_controller.php?startDate='+$('#startDate').val()+'&endDate='+$('#endDate').val(),
        aysnc: true
    }).done(function(response){
        console.log(response);
        
        $("#tblSearch tbody tr").remove();

        var faults = JSON.parse(response);

        for(var i=0; i< faults.length; i++){
        
            var rowData = "<tr>" +
                "<td >"+ faults[i][0] +"</td>" +
                "<td>"+ faults[i][1] +"</td>" +
                "<td>"+ faults[i][2] +"</td>" +
                "<td>"+ faults[i][3] +"</td>" +
				"<td >"+ faults[i][4] +"</td>" +
                "<td>"+ faults[i][5] +"</td>" +
                "<td>"+ faults[i][6] +"</td>" +
                "<td>"+ faults[i][7] +"</td>" +
				"<td >"+ faults[i][8] +"</td>" +
                "<td>"+ faults[i][9] +"</td>" +
                "<td>"+ faults[i][10] +"</td>" +
                "<td>"+ faults[i][11] +"</td>" +
                "</tr>"

            $("#tblSearch tbody").append(rowData);
        }
    });

});

function searchTable() {

    $('#tblSearch thead tr').clone(true).appendTo( '#tblSearch thead' );
    $('#tblSearch thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" id="datatable" placeholder="Search..." />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
    var table = $('#tblSearch').DataTable( {
        dom: 'lfrtip  B',
        buttons: [
            {
                extend: 'excel',
                text: 'Save as Excel',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }
        ],
        orderCellsTop: true,
        fixedHeader: true,
        "scrollY": 380,
        "scrollX": true
    } );

    
} 

$('#btnClear').click(function() {
    location.reload();
});