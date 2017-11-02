<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/ajax_project6/core/init.php';

if(isset($_POST['st_btn'])){
	$st_fname=$_POST['st_fname'];
	$st_lname=$_POST['st_lname'];
	$st_email=$_POST['st_email'];
	$st_birthdate=$_POST['st_birthdate'];
	$id_number=$_POST['id_number'];
	$st_telnumber=$_POST['st_telnumber'];
	$st_dateregister=date("Y-m-d H:i:s");

	mysqli_query($con,"INSERT INTO student
	    (st_fname,st_lname,st_email,st_birthdate,id_number,st_telnumber,st_dateregister,house_master_id)
	    VALUES
	    ('$st_fname','$st_lname','$st_email','$st_birthdate','$id_number','$st_telnumber','$st_dateregister','$userloggedin') 
		");




 	//display  data

$sql=mysqli_query($con,"SELECT * FROM student WHERE house_master_id ='$userloggedin' ORDER By student_id DESC LIMIT 1 ");
 $row = mysqli_fetch_assoc($sql);
 $student_id=$row['student_id'];
$st_fname=$row['st_fname'];
$st_lname=$row['st_lname'];
$st_email=$row['st_email'];
$st_birthdate=$row['st_birthdate'];
$id_number=$row['id_number'];
$st_telnumber=$row['st_telnumber'];
$st_dateregister=date_time($row['st_dateregister']);
$house_master_id=$row['house_master_id'];



echo " <tr>
<td><a href='edit_student.php?edit=$student_id' title='edit'><i class='fa fa-pencil-square-o text-primary' aria-hidden='true'></i></a></td>
                      <td><a href='home.php?delete=$student_id' title='delete'><i class='fa fa-trash-o text-danger' aria-hidden='true'></i></a></td>
                      <td>$student_id</td>
                      <td>$st_fname</td>
                      <td>$st_lname</td>
                      <td>$st_email</td>
                      <td>$st_birthdate</td>
                      <td>$id_number</td>
                      <td>$st_telnumber</td>
                      <td>$st_dateregister</td>
                      <td>$house_master_id</td>


                      </tr>";
}

?>