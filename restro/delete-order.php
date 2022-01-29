<?php
	//checking connection and connecting to a database
	require_once('connection/config.php');
	//Connect to mysqli server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'rms');
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	// $db = mysqli_select_db(DB_DATABASE);
	// if(!$db) {
	// 	die("Unable to select database");
	// }
 
 // check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($link,"DELETE FROM orders_details WHERE order_id='$id'")
 or die("The order does not exist ... \n"); 
 
 // redirect back to the member index
 header("Location: member-index.php");
 }
 else
 // if id isn't set, redirect back to member index
 {
 header("Location: member-index.php");
 }
 
?>