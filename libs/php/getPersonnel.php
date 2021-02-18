<?php

	// example use from browser
	// http://localhost/companydirectory/libs/php/getPersonnel.php?id=1

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

	
	if($_POST['title'] == "Personnel"){
		$query = 'SELECT * from personnel WHERE id =' . $_REQUEST['id'];
	}

	if($_POST['title'] == "Departments"){
		$query = 'SELECT * from department WHERE id =' . $_REQUEST['id'];
	}

	if($_POST['title'] == "Locations"){
		$query = 'SELECT * from location WHERE id =' . $_REQUEST['id'];
	}
	//$query = 'SELECT * from personnel WHERE id =' . $_REQUEST['id'];

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
   
   	$tableRow = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($tableRow, $row);

	}

	// second query

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

	// third query

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
	$output['data']['tableRow'] = $tableRow;
	$output['data']['departments'] = $department;
	$output['data']['locations'] = $locations;
	
	mysqli_close($conn);

	echo json_encode($output); 

?>