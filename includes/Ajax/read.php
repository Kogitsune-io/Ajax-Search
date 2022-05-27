<?php
include '../App/app.php';

if (isset($_REQUEST["username"])){	// Prevent unauthorised output of data on url access
	$where = '`username`'; // Plans for Asynchronous where Clause
	$request = '%'.$_REQUEST["username"].'%'; // Request Data with matching in any position

	if ($request == "" || $request == null){
		return false;
	} else {

	include '../App/establish_connection.php'; // Instantiate Connection

	try{

	$query = "SELECT * FROM `accounts` WHERE $where like ?";
	$stmt = $conn->prepare($query);

	$stmt->bindParam(1, $request);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$row = $stmt->fetchAll();
	
	}
	catch(PDOException $e){
		echo "Error in PDO: ".$e->getMessage()."<br>";
		die();
	}
}

	if ($row != null){
	echo "<table>";

		echo "
	 		<tr><td class='td-id'>Universally Unique ID</td>
	 		<td>Username</td>
	 		<td>Forename</td>
	 		<td>Surname</td>
	 		<td>Email</tr>
	 		";

	 	foreach ($row as $value){

	 		echo "
	 		<tr><td class='td-id'><b>" . $value['id'] . "</b></td>
	 		<td>" . $value['username'] . "</td>".
	 		"<td>" . $value['forename'] . "</td>".
	 		"<td>" . $value['surname'] . "</td>".
	 		"<td>" . $value['email'] . "</td>"
	 		;

	 	}
	echo "</table>";
	} else {

		echo "No records found";
	}
}
else {
	echo "No!"; // Redirect as Error 404

}