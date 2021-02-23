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

	// $_REQUEST used for development / debugging. Remember to cange to $_POST for production
	//$_POST['id'] = 3;
	//$_POST['title'] = 'Departments';
	
	//$_POST['title'] = 'Locations';

//$count = 'SELECT COUNT(*) FROM personnel WHERE departmentID = ' . $_POST['id'];

////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['title'] == "Departments"){
	$querycount = 'SELECT COUNT(*) as count FROM personnel WHERE departmentID = ' . $_POST['id'];
	//$querycount = 'SELECT COUNT(*) FROM personnel';
	
	$result = $conn->query($querycount);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$data = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	}

	$countRec = $data[0];
/* 
	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	} */
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['title'] == "Locations"){
	
	$querycount = 'SELECT COUNT(*) as count FROM department WHERE locationID = ' . $_POST['id'];
	$result = $conn->query($querycount);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$data = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	}

	$countRec = $data[0];
/* 
	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	 }*/
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($_POST['title'] == "Personnel"){
	
		$query = 'DELETE FROM personnel WHERE id = ' . $_POST['id'];
		$result = $conn->query($query);
		$countRec = '';
		$category = "Personnel";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if($_POST['title'] == "Departments"){
	
	if($countRec['count'] > 0){
		$category = "Departments";
	} else{
		$query = 'DELETE FROM department WHERE id = ' . $_POST['id'];
		$result = $conn->query($query);
	}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* 
if($_POST['title'] == "Departments"){
	$query = 'DELETE FROM department WHERE id = ' . $_POST['id'];
} */

////////////////////////////////////////////////////////////////////////////////////////////////////////////

if($_POST['title'] == "Locations"){
	//if($data > 0){
		
	//}
	if($countRec['count'] > 0){
		$category = "Locations";
	} else{
		$query = 'DELETE FROM location WHERE id = ' . $_POST['id'];
		$result = $conn->query($query);
	}
	
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////
/* if($_POST['title'] == "Locations"){
	$query = 'DELETE FROM location WHERE id = ' . $_POST['id'];
} */

////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$query = 'DELETE FROM department WHERE id = ' . $_POST['id'];


////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data']= [];
	$output['data']['no']= $countRec;
	//$output['data']['cat']= $category
	//$output['data']['count'] = $count;
	
	mysqli_close($conn);

	echo json_encode($output); 

?>