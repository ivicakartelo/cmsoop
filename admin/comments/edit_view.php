<?php
session_start();
if (!empty($_SESSION["username"])) {  
}
//header("Location: index.php");
else
header("Location: login/login_form.php");
$content = '
<div class="grid12">
<h1>Edit comment</h1>
<form role="form">
<div class="form-group">
    <p><label for="comment_id">Comment_id:</label></p>
    <p><input class="form-control form-control-lg" type="text" id="comment_id"></p>

    <p><label for="menu_id">Menu_id:</label></p>
    <p><input class="form-control form-control-lg" type="text" id="menu_id"></p>

    <p><label for="nickname">Nickname:</label></p>
    <p><input class="form-control form-control-lg" type="text" id="nickname"></p>

    <p><label for="content">Content:</label></p>
    <p><textarea class="form-control form-control-lg" id="content" rows="10"></textarea></p>
    
    <p><label for="published">Published:</label></p>
    <p><input class="form-control form-control-lg" type="text" id="published"></p>

    <p><label for="approved">Approved:</label></p>
    <p><input class="form-control form-control-lg" type="text" id="approved"></p>

</div>
<div class="grid12">
  <input type="button" class="btn btn-primary" onClick="UpdateComment()" value="Update"></input>
</div>
</form>
';
include ("template.php");
?>

<!-- JQuery Ajax script for edit_view -->
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "control/select_onerow_control_for_edit_view.php?comment_id=<?php echo $_GET['comment_id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#comment_id').val(data['comment_id']);
                $('#menu_id').val(data['menu_id']);
                $('#nickname').val(data['nickname']);
                $('#content').val(data['content']);
                $('#published').val(data['published']);
                $('#approved').val(data['approved']);
            },
            error: function (result) {
                console.log(result);
            },
        });
    });

//JQuery Ajax script for update comments
    function UpdateComment(){
        $.ajax(
        {
            type: "POST",
            url: 'control/update_control.php',
            dataType: 'json',
            data: {
                comment_id: <?php echo $_GET['comment_id']; ?>,
                comment_id: $("#comment_id").val(),
                menu_id: $("#menu_id").val(),
                nickname: $("#nickname").val(),
                content: $("#content").val(),        
                published: $("#published").val(),
                approved: $("#approved").val()	
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("The Comment Updated!");
                    window.location.href = 'index.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>