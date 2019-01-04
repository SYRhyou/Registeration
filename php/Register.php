<?php
	$con = mysqli_connect("localhost", "registerdu", "fbtpduf94", "registerdu");
	
	$userID = $_POST["userID"];
	$userPassword = $_POST["userPassword"];
	$userGender = $_POST["userGender"];
	$userMajor = $_POST["userMajor"];
	$userEmail = $_POST["userEmail"];
	
	$statement = mysqli_prepare($con, "INSERT INTO USERS VALUES (?,?,?,?,?)");
	mysqli_stmt_bind_param($statement, "sssss", $userID, $userPassword, $userGender, $userMajor, $userEmail);
	mysqli_stmt_execute($statement);
	
	$response = array();
	$response["success"] = true;
	
	$json = json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
	echo json_encode($response);
?>
	