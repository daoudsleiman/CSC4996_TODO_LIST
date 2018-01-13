$(document).ready(function(){

    $("#submit_new_task").click(function(){
        var name = $('#name').val();
        var status = $('#status').val();
        var due_date = $('#due_date').val();

        if(name != '' && status != '' && due_date != '')
        {	
	        $.ajax({
	            type: 'POST',
	            url: 'ajax/insert_new_task.php',
	            data: {
	            		name:name,
	            	  	status:status,
	            	  	due_date:due_date
	            },
	            success: function () {
                    alert(due_date);
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

    $(".delete_task_btn").click(function(){
        var id = $(this).attr("data-id");

        $.ajax({
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

});