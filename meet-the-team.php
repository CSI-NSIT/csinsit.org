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
<!DOCTYPE html>
<html lang="en">

<head> 
<?php include('inc/header.inc.links.php');?>
	<meta name="description" content="Meet The Team"> 
	<meta name="keywords" content="CSINSIT,CSI,NSIT,NSITONLINE,SIG,competitions,workshops,TNT,Tech N Talk,BNB,Bits N Bytes,Techelon,Blog,HTML,CSS,XML,JavaScript"> 
	<title>CSI NSIT Meet The Team</title> 
</head>

<body id="top">
<?php include('inc/header.php');?>
<?php include('inc/top-button.php');?> 

    <div class="container" style="padding-top:70px;">
        <div class="row pages-header"> meet the <strong>CSI NSIT</strong> team</div>
        <div class="row">
            <div class="col-md-8">
                <div class="row team-members-level">faculty involved</div> 
                <div class="row faculty-team"> 
                    <div class="col-md-6 team-members-edit">
                        <a href="http://www.nsit.ac.in/faculty/faculty.php" target="_blank"><img src="img/team/bhatia_sir.jpg"></a>
                        <h1>Dr. M.P.S. Bhatia</h1>
                        <h2>PhD (Software Engineering)<br>Professor, IT Department</h2> 
                    </div> 

                    <div class="col-md-6 team-members-edit">
                        <a href="http://www.nsit.ac.in/faculty/faculty.php" target="_blank"><img src="img/team/unknown-female.jpg"></a>
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
	$CURRENT_YEAR = 16;
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
    } elseif ($year<=11 && $year>4){
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
</body>
<?php include('inc/analytics.php');?>
</html>