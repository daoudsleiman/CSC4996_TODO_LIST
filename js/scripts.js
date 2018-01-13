$(document).ready(function(){
    var task_table = $('#task_table').DataTable({
        "bLengthChange": false //hide "show entries"

    }); //initialize JQuery datatable

    $("#submit_new_task").click(function(){ //JQuery on click
        var name = $('#name').val();
        var status = $('#status').val();
        var due_date = $('#due_date').val();

        if(name != '' && status != '' && due_date != '')
        {	
	        $.ajax({ //ajax to php handler
	            type: 'POST',
	            url: 'ajax/insert_new_task.php',
	            data: {
	            		name:name,
	            	  	status:status,
	            	  	due_date:due_date
	            },
	            success: function () {
	              alert('Task Created');
	              window.location.reload();
	            }
	          });
    	}
    	else
    	{
    		alert("All fields must be filled");
    	}
    });

    $(".delete_task_btn").click(function(){ //JQuery on click, had to use class because multiple delete buttons
        var id = $(this).attr("data-id");

        $.ajax({ //ajax to php handler
            type: 'POST',
            url: 'ajax/delete_task.php',
            data: {
            		id:id
            },
            success: function () {
              alert('Task Deleted');
              window.location.reload();
            }
          });

    });

    $(".filters").click(function(){ 

        var filter = $(this).attr("data-id");

        if(filter == 'ALL')
        {
            task_table.search("").draw(); //use datatables search box to filter
        }
        else
        {
            task_table.search(filter).draw();
        }   

    });

});