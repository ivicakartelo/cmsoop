<!DOCTYPE html>
<html>
<head>
<title>CMS OOP</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>	
<link rel="stylesheet" href="style6.css" type="text/css">
<link href="//fonts.googleapis.com/css?family=Nunito:400,300,700" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- How TO - Collapse Sidebar -->
<!-- https://www.w3schools.com/howto/howto_js_collapse_sidebar.asp -->
<style>
body {
  font-family: "Lato", sans-serif;
}
.sidebar {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #1C2833;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 0;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>

<script>
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>

<!-- Hide show button -->
<!-- https://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_hide_show -->
<script>
$(document).ready(function(){
$("#button2").hide();
  $(".hide").click(function(){
    $("#button1").hide();
    $("#button2").show();
  });
  $(".show").click(function(){
    $("#button2").hide();
    $("#button1").show();
  });
});
</script>

<style>
.fa-bars {
  font-size: 2.5rem;
  background-color: transparent;
  padding: 10px;
  color: #1C2833;
}
.fa-window-close {
  font-size: 3rem;
  background-color: #788FCC;
  padding: 10px;
  color: #ffffff;
}
</style>


<!-- How TO - Collapse Sidebar  END -->
</head>
<body>

<div id="mySidebar" class="sidebar">
    <!--
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    -->
    <ul>
    <li><a href="index.php">Dashboard Menu</a></li>
    <li><a href="add_view.php">Add menu</a></li>
    <li><a href="comments/index.php">Dashboard Comments</a></li>
    
    <li><a href="../index.php">Home</a></li>
    <li><a href="login/logout.php">Logout</a></li>
    </ul>
</div>

<div id="main">
    <div style="width: 100%; background-color: #788FCC;text-align: right;">
    <button id="button2" class="show" class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i></button>
    <a href="javascript:void(0)" id="button1" class="hide" class="closebtn" onclick="closeNav()"><i class="fas fa-window-close"></i></a>
</div>

    <div class="container">
    <div class="grid12 zadnji">

    <?php echo $content; ?>
            
    </div><!-- CONTAINER END -->
</div><!-- MAIN END -->
  
</body>
</html> 