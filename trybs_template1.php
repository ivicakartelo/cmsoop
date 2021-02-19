<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style6.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Bootstrap 4 Website Example https://www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_template1 -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Blog</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">Home</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin/index.php">Admin</a>
      </li>  
    </ul>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">

    <div class="col-sm-4">
      <h2>About Me</h2>
      <h5>Photo of me:</h5>
      <div><img style="width: 100%; height: auto;" src="images/5.jpg" /></div>
      <p>Some text about me in culpa qui officia deserunt mollit 
        anim nec nulla id, venenatis egestas diam. Sed ac sagittis 
        tortor, vel volutpat massa. Praesent volutpat, turpis vitae ultricies feugiat, 
        justo sapien lobortis mi, id luctus eros ipsum ut metus. Suspendisse fermentum </p>
      <h3>All Posts</h3>
      <ul id="menu" class="nav nav-pills flex-column">
      </ul>
      <hr class="d-sm-none">
    </div><!-- col-sm-4 end -->

    
    
    <?php
    if (isset($_GET["menu_id"])) {
    $a = $_GET["menu_id"];
    echo $content1; 
    echo $a;
    echo $content2;
    echo $content3;
    }
    else {
      echo $content;
    }
    ?>

  </div><!-- row end -->
</div><!-- container end -->

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
<!-- PHP -->

</body>
</html>

<!-- JQuery Ajax Script-->
<script>
$(document).ready(function()
{
$.ajax(
    {
    type: "GET",
    url: "control/select_control1.php",
    dataType: 'json',
    success: function(data)
    {
    var response="";
    for(var user in data)
    {
    response += 
    "<li class='nav-item'><a class='nav-link' "+
	"href="+
    "index.php?menu_id="+data[user].menu_id+">"+data[user].name+"</a></li>";
    }
    $(response).appendTo($("#menu"));
    }
    });
});
</script>