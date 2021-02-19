<?php
$content = '
		<div class="grid12">
		<h1>All comments</h1>
        </div>
        
		<div class="grid12">
        <table id="comments" class="table">
          <thead>
            <tr>
        <th>Comment_id</th>
        <th>Menu_id</th>
        <th>Nickname</th>
        <th>Content</th>
		<th>Published</th>
		<th>Approved</th>
		<th>Edit</th>
		<th>Delete</th>
        </tr>
        </thead>
		</table>
		
		</div>
	
        <div class="grid12" style="padding: 20px 0 20px 0;"><h6>Kartedium CMS OOP</h6></div>
';
  include ("template.php");
  ?>

<!-- JQuery Ajax script for All Comments -->
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
                "<td>"+data[user].comment_id+"</td>"+
                "<td>"+data[user].menu_id+"</td>"+
                "<td>"+data[user].nickname+"</td>"+
                "<td>"+data[user].content+"</td>"+
				"<td>"+data[user].published+"</td>"+
                "<td>"+data[user].approved+"</td>"+
                "<td><a href='edit_view.php?comment_id="+data[user].comment_id+"'>Edit</a></td>"+
				"<td><a href='#' onClick=Delete('"+data[user].comment_id+"')>Delete</a></td>"+
                "</tr>";
            }
            $(response).appendTo("#comments");
        }
    });
  });
  
  //JQuery Ajax script for Delete Comments

 function Delete(comment_id){
    var result = confirm("Sure to Delete the Comment?"); 
    if (result == true) { 
        $.ajax(
        {
            type: "POST",
            url: 'control/delete_control.php',
            dataType: 'json',
            data: {
                comment_id: comment_id
            },
            error: function (x) {
                alert(result.responseText);
            },
            success: function (x) {
                if (x['status'] == true) {
                    alert("The Comment Deleted!");
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