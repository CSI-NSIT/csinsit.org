<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$page_id = 'csinsit';
$access_token = ' 1167509093264725|kT0gwEHq7G-fvh7teSVxP4IKPGA';
//Get the JSON
$json_object = @file_get_contents('https://graph.facebook.com/csinsit/posts?access_token=1167509093264725|kT0gwEHq7G-fvh7teSVxP4IKPGA&fields=id,link,message,picture,description,story&limit=6');
//Interpret data
$fbdata = json_decode($json_object);

$a=[];$b=[];$c=[];$i=0;

foreach ($fbdata->data as $post)
{
$a[$i]= '<p><a href="' . $post->link . '"> <img src="' . $post->picture . '" /> </a></p>';
$b[$i]= '<p><a href="' . $post->link . '" style="color:black;">' . $post->story . '</a></p>';
$c[$i]= '<p><a href="' . $post->link . '" style="color:black; text-decoration:none;">' . $post->message . '</a></p>';
$i++;
}
for($j=0;$j<=$i;$j++){
	$x.=$a[$j];
	$x.=$b[$j];
    $x.=$c[$j];
    $y.=$a[$j+1];
	$y.=$b[$j+1];
    $y.=$c[$j+1];
    ?>
<div class="row">
<div class="col-md-6" style="text-align:center;font-family: 'Lato', sans-serif;font-weight:500">
<?php
echo $x;
?>
</div>
<div class="col-md-6" style="text-align:center;font-family: 'Lato', sans-serif;font-weight:500">
<?php
echo $y;
?>
</div>
</div>
    <?php	
$j++;
unset($x);
unset($y);
}
?>

</body>
</html>