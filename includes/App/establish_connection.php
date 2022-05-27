<?php
namespace App\Service;
use PDO;

try {
	$db = new config\Database();
	$conn = $db->dbConn();

	if (!$conn) {
			die("Error connecting to the database");
	}

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	} catch (PDOException $e) {
      exit($e->getMessage());
    }