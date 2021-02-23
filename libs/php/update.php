<?php

	// example use from browser
	// use insertDepartment.php first to create new dummy record and then specify it's id in the command below
	// http://localhost/companydirectory/libs/php/deleteDepartmentByID.php?id= <id>

	// remove next two lines for production
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	$executionStartTime = microtime(true);

	include("config.php");

	header('Content-Type: application/json; charset=UTF-8');

	$conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

	if (mysqli_connect_errno()) {
		
		$output['status']['code'] = "300";
		$output['status']['name'] = "failure";
		$output['status']['description'] = "database unavailable";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	}	

/* 	$_POST['title'] = "Personnel";
	$_POST['firstName'] = "kash";
	$_POST['lastName'] = "kash";
	$_POST['email'] = "kash@kash.com";
	$_POST['jobTitle'] = 3;
	$_POST['departmentID'] = 10;
	$_POST['id'] = 96; */


	if($_POST['title'] == "Personnel"){
		$query = 'UPDATE personnel SET firstName = "'.$_POST['firstName'].'", lastName = "'.$_POST['lastName'].'", email = "'.$_POST['email'].'", jobTitle = "'.$_POST['jobTitle'].'", departmentID = "'.$_POST['departmentID'].'" WHERE personnel.id = '.$_POST['id'];
	}
	
	if($_POST['title'] == "Departments"){
		$query = 'UPDATE department SET name = "'.$_POST['edeptname'].'", locationID = "'.$_POST['elocationname'].'" WHERE department.id = '.$_POST['id'];
	}
	
	if($_POST['title'] == "Locations"){
		$query = 'UPDATE location SET name = "'.$_POST['elocname'].'" WHERE location.id = '.$_POST['id'];
	}
	
	
	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];
		

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}
// second query getting edit record
	if($_POST['title'] == "Personnel"){
		$query = 'SELECT * from personnel WHERE id =' . $_POST['id'];
	} else if($_POST['title'] == "Departments"){
		$query = 'SELECT * from department WHERE id =' . $_POST['id'];
	} else if($_POST['title'] == "Locations"){
		$query = 'SELECT * from location WHERE id =' . $_POST['id'];
	}

	//$query = 'SELECT * from personnel WHERE id =' . $_POST['id'];
	$result = $conn->query($query);

	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];
		

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$updateData = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($updateData, $row);

	}

	// 3rd query

	$query = 'SELECT id, name from department ORDER BY 2';

	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}
   
   	$department = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($department, $row);

	}

	// 4th query

	$query = 'SELECT id, name from location ORDER BY 2';

	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}
   
   	$locations = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($locations, $row);

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	//$output['data'] = [];
	$output['data']['updateData'] = $updateData;
	$output['data']['departments'] = $department;
	$output['data']['locations'] = $locations;
	
	
	mysqli_close($conn);

	echo json_encode($output); 

?>