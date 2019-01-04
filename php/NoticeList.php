<?php
	$con = mysqli_connect("localhost", "registerdu", "fbtpduf94", "registerdu");
	if (!$con)  
	{  
		echo "MySQL connect error : ";
		echo mysqli_connect_error();
		exit();  
	}  	
	$result = mysqli_query($con, "SELECT * FROM NOTICE ORDER BY noticeDate DESC;");
	$response = array();
	
	if($result){
		
		while($row = mysqli_fetch_array($result))
		{
			array_push($response,
				array("noticeContent"=>$row[0],
				"noticeName"=>$row[1],
				"noticeDate"=>$row[2]
				));
		}
		    print_r($response);

			header('Content-Type: application/json; charset=utf8');
			echo json_encode(array("response"=>$response), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
			mysqli_close($con);
	}
	else
	{
		echo "SQL error : ";
		echo mysqli_error($con);
	}
?>
	