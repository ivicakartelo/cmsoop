<?php
session_start();
if (!empty($_SESSION["username"])) {  
}
//header("Location: index.php");
else
header("Location: login/login_form.php");

$content = '
<div class="grid12">
<h1>Add menu</h1>
    <form role="form">
    <div class="form-group">
    <p><input class="form-control form-control-lg" type="text" id="name" placeholder="Enter Name"></p>
    <p><textarea class="form-control form-control-lg" id="content" rows="5" placeholder="Enter content"></textarea></p>
    </div>
    <p><input type="button" class="btn btn-primary"
        onClick="AddPost()" value="Submit" /></p>   
    </form>
</div>	
<div class="grid12" style="padding: 20px 0 20px 0;">
    <h6>Kartedium CMS OOP</h6>
</div>';

include ("template.php");

?>

<!-- JQuery Ajax script -->
<script>
  function AddPost(){

        $.ajax(
        {
            type: "POST",
            url: 'control/insert_control.php',
            dataType: 'json',
            data: {
                name: $("#name").val(),
                content: $("#content").val(),        
                published: $("#published").val()
	            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert(result['message']);
                    window.location.href = 'index.php';
                }
                else {
                    alert(result['message']);
                    window.location.href = 'index.php';
                }
            }
        });
    }
</script>