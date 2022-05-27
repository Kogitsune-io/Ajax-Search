<?php
/*
 * Connection Services
*/

namespace App\Service\config;
use PDO;
include 'config.php';

class Database {
    private $conn = null;
	public function dbConn(){

		// SERVER 
		// User was denied remote access to x10Hosting SQL server
		/*$host = 'localhost';
		$database   = 'database';
		$username = 'root';
		$password = '';*/


		// LOCALHOST
		$host = HOST;
		$database = DATABASE;
		$username = USERNAME;
		$password = PASSWORD;

		$charset = 'utf8mb4';

		$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
		$options = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		    PDO::ATTR_EMULATE_PREPARES   => false,
		];
        if (!is_null($this->conn)) {
            return $this->conn;
        }
        $this->conn = false;
        try {
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch(PDOException $e) {
        	throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $this->conn;
    }

    public function connect(){    	
		$db = new Database();
		$conn = $db->dbConn();
		if (!$conn) {
		    die("Error connecting to the database");
    	}
    	return $conn;
    }

    public function kill_conn(){
    	$conn = $stmt = $query = null;
    	return $conn;
    }
}

$app = new Database();
