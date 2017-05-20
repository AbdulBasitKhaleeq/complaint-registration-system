<?php
error_reporting(0);
	session_start(); 
	if(!isset($_SESSION['admin']))
	header('location:../index.php');
session_destroy(); 
header('location:../index.php');
die();
?> 

