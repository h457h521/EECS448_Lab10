<?php
	$userName = $_POST["userName"];

	$mysqli = new mysqli("mysql.eecs.ku.edu","haoshehuang", "weej4Tah", "haoshehuang");

	if($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
	} else {
		$checkUser = "SELECT 1 FROM Users WHERE User_id = '$userName'";
		$createUser = "INSERT INTO Users (User_id) VALUES ('$userName')";

		$result = $mysqli->query($checkUser);

		if($result->num_rows > 0)
		{
		    echo "Username exists.<br>";
		} else {
			$mysqli->query($createUser);
			echo "User create success.<br>";
		}


	}

	$mysqli->close();

?>