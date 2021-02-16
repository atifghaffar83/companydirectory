<?php

	// example use from browser
	// http://localhost/companydirectory/libs/php/insertDepartment.php?name=New%20Department&locationID=1

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

	/* $_REQUEST['name']= "Testing";
	$_REQUEST["locationID"]= 1; */
	//$_POST['id'] = 101;
/* 	$_POST['firstName'] = "atif 77";
	$_POST['lastName'] = "gha 77";
	$_POST['email'] = "atif77@gmail.com";
	$_POST['jobTitle'] = "SHY Why";
	$_POST['departmentID'] = 4;
	$_POST['title'] = "Personnel"; */

	if($_POST['title'] == "Personnel"){
		//$query = 'INSERT INTO personnel (id, firstName, lastName, jobTitle, email, departmentID) VALUES(' . $_POST["id"] . ',"' . $_POST['firstName'] . '","' . $_POST["lastName"] . '","' . $_POST["jobTitle"] . '","' . $_POST["email"] . '",' . $_POST["departmentID"] . ')';
		$query = 'INSERT INTO personnel (firstName, lastName, jobTitle, email, departmentID) VALUES("' . $_POST['firstName'] . '","' . $_POST["lastName"] . '","' . $_POST["jobTitle"] . '","' . $_POST["email"] . '",' . $_POST["departmentID"] . ')';
		
	}
	
	if($_POST['title'] == "Departments"){
		$query = 'INSERT INTO department (name, locationID) VALUES("' . $_POST['name'] . '",' . $_POST["locationID"] . ')';
	}
	
	if($_POST['title'] == "Locations"){
		$query = 'INSERT INTO location (name) VALUES("' . $_POST['name'] . '")';
		
	}


	//$query = 'INSERT INTO department (name, locationID) VALUES("' . $_REQUEST['name'] . '",' . $_REQUEST["locationID"] . ')';
	//$query = 'INSERT INTO department (name, locationID) VALUES("' . $_REQUEST['name'] . '",' . $_REQUEST["locationID"] . ')';

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



	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = [];
	
	mysqli_close($conn);

	echo json_encode($output); 

?>