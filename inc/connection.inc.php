<?php
	$HOSTNAME = 'localhost';
	$USERNAME = 'root';
	$PASSWORD = '';
	$DATABASE = 'csinseew_team_database';

	if(!$connection = mysqli_connect($HOSTNAME , $USERNAME , $PASSWORD, $DATABASE))
		die(mysqli_error($connection));
	
?>