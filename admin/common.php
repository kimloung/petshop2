<?php

session_start();

function isLogined()
{
	//echo('@:' . $_SESSION['username']);	
	if(empty($_SESSION['username']))
		return false;
	return true;
}

?>

