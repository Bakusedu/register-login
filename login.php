<?php
include_once 'database.conn.php';

 if(isset($_POST['submit'])){
 	$regnum = $_POST['regnum'];
 	$password = $_POST['password'];
 	$hashPassword = md5($password);
 	if(!empty($regnum)&&!empty($password)){
 		$select = "SELECT * FROM `student` WHERE `regnum` = '$regnum' AND `password`='$hashPassword'";
 		$result = mysqli_query($conn,$select);
 		if(mysqli_num_rows($result)==NULL){
 			echo 'Login detais does not exist';

 		 }
 		 else{
 				echo 'welcome '.$regnum;
 		}
 	}
 else{
 		echo 'Some fields are empty';
 	}
}
?>