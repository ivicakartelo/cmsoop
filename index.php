<?php
if (!isset($_GET["menu_id"])) 
{
    $content = '
    <div id="post" class="col-sm-8">
    </div><!-- col-sm-8 end -->';
include ("trybs_template1.php");
?>

<!-- JQuery Ajax Script home page concat posts -->
<script>
$(document).ready(function()
{
$.ajax(
    {
    type: "GET",
    url: "control/select_control2.php",
    dataType: 'json',

    success: function(a) 
    {
    var r="";
    for(var b in a)
        {
            r += 
            "<h2><a href='index.php?menu_id="+a[b].menu_id+"'>"+a[b].name+"</a></h2>"+
	        "<h5>"+a[b].published+"</h5>"+
            "<p>"+a[b].content+"</p>";
            //"<div class='video-container'>"+data[user].content+"</div>";
        }
    $(r).appendTo("#post");
    }

    });
});

</script>
<?php
}
else {
    //display landing page
    $content1 ='
    <div class="col-sm-8">
    <div id="post"></div>
    
    <h1>Add comment</h1>
    
    <form role="form">
    <p><input type="hidden" style="width: 100%;" id="menu_id" value="';
    
    $content2 = '"></p>
    <div class="form-group">
    <p><input class="form-control form-control-lg" type="text" id="nickname" placeholder="Enter Nickname"></p>
    <p><textarea class="form-control form-control-lg" id="content" rows="5" placeholder="Enter content"></textarea></p>
    </div>
    <p><input type="button" class="btn btn-primary"
        onClick="AddComment()" value="Submit" /></p>
    </form>';

    $content3 = '
    
    <div id="comments">   
    </div><!-- col-sm-8 end -->';

    include ("trybs_template1.php");
?>

<script>
$(document).ready(function()
{
    $.ajax(
	{
    type: "GET",
    url: "control/select_onerow_control_for_post_view.php?menu_id=<?php echo $_GET['menu_id']; ?>",
    dataType: 'json',
    success: function(data) {
	var response="";
	for(var user in data){
	response += 
	"<h2>"+data[user].name+"</h2>"+
	"<h5>"+data[user].published+"</h5>"+
    "<p>"+data[user].content+"</p>";
	}
	$(response).appendTo($("#post"));
	}
    });
});


<!-- get approved comments -->

$(document).ready(function()
{
    $.ajax(
	{
    type: "GET",
    url: "admin/comments/control/comments_approved.php?menu_id=<?php echo $_GET['menu_id']; ?>",
    dataType: 'json',
    success: function(data) {
	var response="";
	for(var user in data){
	response += 
    "<h2>"+data[user].nickname+"</h2>"+
    "<p>"+data[user].content+"</p>"+
	"<h5>"+data[user].published+"</h5>";
	}
	$(response).appendTo($("#comments"));
	}
    });
});
</script>


<script>
  function AddComment(){

        $.ajax(
        {
            type: "POST",
            url: 'admin/comments/control/insert_control.php',
            dataType: 'json',
            data: {
                menu_id: $("#menu_id").val(),
                nickname: $("#nickname").val(),
                content: $("#content").val(),        
                published: $("#published").val()
	            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if (result['status'] == true) {
                    alert(result['message']);
                    //alert("Your Comment added, thank you! It would be visible after review.");
                    window.location.reload();
                }
                else {
                    alert(result['message']);
                    window.location.reload();
                }
            }
        });
    }
</script>
<?php
}
    ?>
