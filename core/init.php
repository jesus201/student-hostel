<?php
ob_start();
session_start();
$con=mysqli_connect("localhost","root","","student_hostel");

if(mysqli_connect_errno()){
	echo "error connecting ". mysqli_connect_errno();
	die();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/config.php';

require_once BASEURL. 'controllers/helpers.php';



 if (isset($_SESSION['loggedin'])) {
 	$userloggedin=$_SESSION['loggedin'];
	$sql=mysqli_query($con,"SELECT * FROM house_master WHERE house_master_id='$userloggedin' ");
     $row=mysqli_fetch_assoc($sql);

     $masterfname=$row['fname'];
     $masterlname=$row['lname'];
 }


?>