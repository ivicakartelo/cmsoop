<?php
session_start();
if (!empty($_SESSION["username"])) {}
else
header("Location: login/login_form.php");

$content = '
	<div class="grid12">
		<h1>All menu</h1>
    </div>
        
	<div class="grid12 last">
        <table id="post" class="table">
        <thead>
        <tr>
		<th>Name</th>
		<th>Published</th>
		<th>Content</th>
		<th>Edit</th>
		<th>Delete</th>
        </tr>
        </thead>
		</table>	
	</div>
    <div class="grid12" style="padding: 20px 0 20px 0;">
        <h6>Kartedium CMS OOP</h6>
    </div>';
        include ("template.php");
?>

<!-- JQuery Ajax read all posts-->
<script>
  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "control/select_control.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].name+"</td>"+
				"<td>"+data[user].published+"</td>"+
                "<td><div class=''>"+data[user].content+"</div></td>"+
                "<td><a href='edit_view.php?menu_id="+data[user].menu_id+"'>Edit</a></td>"+
				"<td><a href='#' onClick=Delete('"+data[user].menu_id+"')>Delete</a></td>"+
                "</tr>";
            } //For END

            $(response).appendTo($("#post"));
            
        } //Function data END
    }); //Ajax END
  }); //Ready END

  // Delete post
 function Delete(menu_id){
    var result = confirm("Sure to Delete the Post?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: 'control/delete_control.php',
            dataType: 'json',
            data: {
                menu_id: menu_id
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("The Post Deleted!");
                    window.location.href = 'index.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
  }
</script>