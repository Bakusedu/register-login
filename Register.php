<?php
 include_once 'database.conn.php';

 //database connected

 if(isset($_POST['submit'])){
 	$name = $_POST['name'];
 	$regnum = $_POST['regnum'];
 	$email = $_POST['email'];
 	$level = $_POST['level'];
 	$department = $_POST['department'];
 	$gender = $_POST['gender'];
 	$password = $_POST['pwd'];
 	 if(!empty($name)&&!empty($regnum)&&!empty($email)&&!empty($level)&&!empty($department)&&!empty($gender)&&!empty($password)){
 	 	$sql = "SELECT * FROM student 
 	 	WHERE `regnum`='$regnum' OR `name`='$name' AND `email`='$email'";
 	 	$result = mysqli_query($conn,$sql);
 	 	$resultChecker = mysqli_num_rows($result);
 	 	   if($resultChecker != NULL){
 	 		    echo 'records already exist';
 	 	   
 	 	}
 	 	   else{

 	 		//hash the password

 	 		$hashedPwd = md5($password);

 	 		$insert = "INSERT INTO student VALUES (NULL,'$name','$regnum','$level','$department','$gender','$email','$hashedPwd')";
 	 		mysqli_query($conn,$insert);
 	 		echo 'Record added!';
 	 	}
 	 	
 	 }
 	 else{
 	 	
 	 	echo 'Some Fields Are Empty';
 	 }
 }

?>