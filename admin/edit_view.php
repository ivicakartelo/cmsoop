<?php
session_start();
if (!empty($_SESSION["username"])) {}
//header("Location: index.php");
else
header("Location: login/login_form.php");

$content = '
<div class="grid12">
<h1>Edit menu</h1>
<form role="form">
    <div class="form-group">
    <p><input class="form-control form-control-lg" type="text" id="name" placeholder="Enter Name"></p>
    <p><textarea class="form-control form-control-lg" id="content" rows="10"></textarea></p>
    <p><input class="form-control form-control-lg" type="text" id="published" placeholder="Enter published"></p>
    </div>
    <div class="grid12 last">
  <input type="button" class="btn btn-primary" onClick="UpdatePost()" value="Update"></input>
</div>
</form>';

include ("template.php");
?>

<!-- JQuery Ajax script select single row -->
<script>
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "control/select_onerow_control_for_edit_view.php?menu_id=<?php echo $_GET['menu_id']; ?>",
            dataType: 'json',
            success: function(data) {
                $('#name').val(data['name']);
                $('#content').val(data['content']);
                $('#published').val(data['published']);
            },
            error: function (result) {
                console.log(result);
            },
        });
    });

    function UpdatePost(){
        $.ajax(
        {
            type: "POST",
            url: 'control/update_control.php',
            dataType: 'json',
            data: {
                menu_id: <?php echo $_GET['menu_id']; ?>,
                name: $("#name").val(),
                content: $("#content").val(),        
                published: $("#published").val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert("The Post Updated!");
                    window.location.href = 'index.php';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>