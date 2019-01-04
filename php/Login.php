<?php
	$con = mysqli_connect("localhost", "registerdu", "fbtpduf94", "registerdu");
	
	$userID = $_POST["userID"];
	$userPassword = $_POST["userPassword"];
	
	$statement = mysqli_prepare($con, "SELECT * FROM USERS WHERE userID = ? AND userPassword = ?");
	mysqli_stmt_bind_param($statement, "ss", $userID, $userPassword);
	mysqli_stmt_execute($statement);
	
	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement, $userID, $userPassword, $userGender, $userMajor, $userEmail);

	$response = array();
	$response["success"] = false;
	
	while(mysqli_stmt_fetch($statement))
	{
		$response["success"] = true;
		$response["userID"] = $userID;
		$response["userPassword"] = $userPassword;
	}
	
	echo json_encode($response);
?>