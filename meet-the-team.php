<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style1.css"> <!-- Resource style -->
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="prabhakar gupta">

<link rel="shortcut icon" href="http://csinsit.org/img/logo-csi.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="http://csinsit.org/css/prabhakar.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://csinsit.org/css/font-awesome.min.css"> 

<link href='http://fonts.googleapis.com/css?family=Signika+Negative:400,700' rel='stylesheet' type='text/css'>

<script src="http://csinsit.org/js/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!--<script src="http://csinsit.org/js/snowstorm.js"></script>-->    <meta name="description" content="Do you want to make a website of your own? Here is a small help from our side for making you skilled enough for achieving that goal."> 
    <meta name="keywords" content="CSINSIT,CSI,NSIT,NSITONLINE,SIG,competitions,workshops,TNT,Tech N Talk,BNB,Bits N Bytes,Techelon,Blog,HTML,CSS,XML,JavaScript"> 
    <title>CSI NSIT Web Development Tutorials</title> 


	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  
</head>
<?php
	require_once 'inc/connection.inc.php';
	require 'inc/lib/simplexlsx.class.php';
	$year_designations = array(
		'TEAM MEMBERS',
		'EXECUTIVE MEMBERS',
		'DIRECTORS AND CO-ORDINATORS'
	);
	$SEX = array(
		'M'	=> 'male',
		'F' => 'female'
	);
?>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php">CSI NSIT</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="index.php">Home</a></li>
      <li><a href="http://csinsit.org/techbytes/">Blog</a></li>
      <li><a href="meet-the-team.php">Team</a></li>
      <li><a href="index.php#section-contact">Contact</a></li>
    </ul>
    <!--
    <div class="navbar-header navbar-right">
  		<p class="navbar-text">
  		<a href="#" class="navbar-link">Username</a>
  		</p>
  	</div>
  	-->
  </div>
</nav>

<!--
	<header class="cd-header">
		<a href="#0" class="cd-logo"><img src="img/csi1.png" alt="Logo"></a>
		<a href="#0" class="cd-3d-nav-trigger">
			Menu
			<span></span>
		</a>
	</header> <!-- .cd-header -->
	
	<main>
		
<script type="text/javascript">$(document).ready(function(){$(window).scroll(function(){if($(this).scrollTop()>100){$(".drive-me-top-babe").fadeIn()}else{$(".drive-me-top-babe").fadeOut()}});$(".drive-me-top-babe").click(function(){$("html, body").animate({scrollTop:0},500);return false})})
</script><style type="text/css">.drive-me-top-babe{background-color:url(images/up-arrow.png);width:40px;height:40px;text-align:center;position:fixed;z-index:100;display:none;right:10px;bottom:10px;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;opacity:.75;filter:alpha(opacity=75)}
</style><script>$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);e=e.length?e:$("[name="+this.hash.slice(1)+"]");if(e.length){$("html,body").animate({scrollTop:e.offset().top},1e3);return false}}})})</script>
<div class="drive-me-top-babe"><a href="#top">
<i class="fa fa-angle-double-up" style="font-size:40px; color:black"></i></a>
</div>    
   
    <div class="container" style="padding-top:70px;">
        <div class="row">
            <div class="col-md-6">
                <div class="row team-members-level">faculty involved</div> 
                <div class="row faculty-team"> 
                    <div class="col-md-6 team-members-edit">
                        <a href="http://www.nsit.ac.in/faculty/faculty.php" target="_blank"><img src="img/team/MPSbhatia-sir.jpg"></a>
                        <h1>Dr. M.P.S. Bhatia</h1>
                        <h2>PhD (Software Engineering)<br>Professor, IT Department</h2> 
                    </div> 

                    <div class="col-md-6 team-members-edit">
                        <a href="http://www.nsit.ac.in/faculty/faculty.php" target="_blank"><img src="img/team/ritu-mam.jpg"></a>
                        <h1>Dr. Ritu Sibal</h1>
                        <h2>PhD (Software Engineering)<br>Associate Professor, COE Department</h2> 
                    </div> 

                </div>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <div class="row team-members-level">Team</div> 
                <br>
                <div class="panel">
                    <div class="panel-body">
<?php
	$CURRENT_YEAR = 15;
	for($i=$CURRENT_YEAR; $i>4; $i--){
		$temp = $i+1;
		if($i!=13 && $i!=7){
			echo '<a href="?year=' . $i . '">';
			
			if($i == $CURRENT_YEAR){
				echo 'Current Team';
			} else {
				$print_year = ($i<10) ? ('200' . $i . ' - 200' . ($i + 1)) : ('20' . $i . ' - 20' . ($i + 1));
				$print_year = ($i == 9) ? ('200' . $i . ' - 20' . ($i + 1)) : $print_year; //for checking 2009-2010 year
				echo $print_year;
			}
			echo '</a><br>';
		}
	}
?>  
                    </div>
                </div>
            </div>  
<?php
if(isset($_GET['year']) && !empty($_GET['year'])){
    $year= floor((int)$_GET['year']);
	if($year == 13 || $year == 7){
?>
		</div>
		<div class="row">
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4>Oh snap! You got an error!</h4>
					<p>We do not have the team members list for the year you asked for! We will try to get the list, meanwhile you can do any of the following:</p>
					<p>
						<a href="?year=<?php echo $CURRENT_YEAR;?>"><button type="button" class="btn btn-danger">View Current Team</button></a>
						<a href="/"><button type="button" class="btn btn-default">Go Back to Homepage</button></a>
					</p>
				</div>
			</div>
		</div>
	</div>
<?php
	} else if($year<=$CURRENT_YEAR && $year>11){
		if($year >= 12){
			$table_name = 'team-20' . $year . '-' . ($year + 1);
			$query = "SELECT * FROM `" . $table_name . "` ORDER BY `year` DESC, `priority` DESC, `name` ASC";
			$while_loop_year = -999;
			if($query_run = mysqli_query($connection, $query)){
				while($query_row = mysqli_fetch_assoc($query_run)){
					$year = (int)$query_row['year'];
					if($year != $while_loop_year){
						echo '</div><div class="row team-members-level">' . $year_designations[$year-2] . '</div><div class="row">';
						$while_loop_year = $year;
					}
					echo '<div class="';
					if($year != 2){
						echo'col-md-4';
					} else {
						echo'col-md-3';
					}
					
					$sex = $query_row['sex'];
					$image = isset($query_row['image_link']) ? $query_row['image_link'] : ('img/team/unknown-' . $SEX[$sex]);
					
					echo' team-members-edit"><a href="' . $query_row['facebook_link'] . '" target="_blank"><img src="' . $image . '.jpg"></a><h1>' . $query_row['name'] . '</h1><h2>' . $query_row['designation'] . '</h2></div>';
				}
			}
		}
    } elseif ($year<11 && $year>4){
        $file = "inc/team_lists/team_20".$year.".xlsx";
        $xlsx = new SimpleXLSX($file);
        foreach($xlsx->rows() as $k => $r){
            if($r[1]=='end'){
                echo '</div><div class="row team-members-level">'.$r[2].'</div><div class="row">';
            } else {
                echo'<div class="col-md-4 team-members-edit"><h1>'.$r[1].'</h1><h2>'.@$r[4].'</h2></div> ';
            }  
        }  
    } else {
?>
	</div> 
		<div class="row">
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4>Oh snap! You are trying to access an invalid page!</h4>
					<p><strong>If you reached here unintentionally, then you may do any of the following</strong>
					<br><small>For Hackers find me in page-source</small></p>
<!--
	You won't succeed.
	*EVIL LAUGHTER*
-->
					<p>
						<a href="?year=<?php echo $CURRENT_YEAR;?>"><button type="button" class="btn btn-danger">View Current Team</button></a>
						<a href="/"><button type="button" class="btn btn-default">Go Back to Homepage</button></a>
					</p>
				</div>
			</div>
		</div>
	</div>
<?php
	}
}
?>
	</main>
	
	<nav class="cd-3d-nav-container">
		<ul class="cd-3d-nav">
			<li class="cd-selected">
				<a href="http://csinsit.org/">Home</a>
			</li>

			<li>
				<a href="http://csinsit.org/#about">About Us</a>
			</li>

			<li>
				<a href="http://csinsit.org/techbytes/">Blog</a>
			</li>

			<li>
				<a href="http://csinsit.org/about-bottom-grids">Newsfeed</a>
			</li>

			<li>
				<a href="http://csinsit.org/#team">Team</a>
			</li>
		</ul> <!-- .cd-3d-nav -->

		<span class="cd-marker color-1"></span>	
	</nav> <!-- .cd-3d-nav-container -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->


</body>
</html>