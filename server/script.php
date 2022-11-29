<?php
include('../database/database.php');

//register account
if(isset($_POST['register'])){
	$email =  mysqli_real_escape_string($connection, $_POST['email']);
	$username =  mysqli_real_escape_string($connection, $_POST['username']);
	$password =  mysqli_real_escape_string($connection, $_POST['password']);
	
	$sql = "select * from user where email ='$email'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
        echo "This email is already in use, login?";
    }else{
        $sql = "select * from user where username ='$username'";
    $result = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($result);
    if($count > 0){
         echo "This username is already in use.";
    }else{
		$stmt = $connection->prepare("INSERT INTO user (email, username, password) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $_POST['email'], $_POST['username'], md5($_POST['password']));
		$stmt->execute();
		$stmt->close();
		echo "Account created successfully!";
	}
	}
}

//login to account
if(isset($_POST['login'])){
$stmt = $connection->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $_POST['username'], md5($_POST['password']));
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows === 0){
	echo "Wrong username/password";
} else{
	header('location: main.php');
}
$stmt->close();
}
?>