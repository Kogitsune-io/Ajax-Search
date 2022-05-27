<?php
namespace App\Service;
use PDO;
include 'connection_service.php';

class Service
{
	/*
	* Function: Pass array to paramater
	* @param $args
	* @return values
	*/
	/*public $data = null;
	public function arrayExploder($args){
		$args = json_encode($args);
		var_dump($args . "<br><br>");
		$args = json_decode($args);
		var_dump($args);

		
	}
*/

	/*
	* Function: Load all courses available for users to view
	* @param $username TBA
	* @return
	*/
	public function queryBuilder($query, $search){

		$username = $search;

		include __DIR__ . '/establish_connection.php';
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	
			$query = ($query);

			var_dump($query); // Bind here
			$conn->bindParam(':username', $username, PDO::PARAM_STR);



			$row = $conn->query($query)->fetchAll();

			$response = array();
			foreach ($row as $key => $value) { 
				$id = $value['id'];
				$username  = $value['username'];
				$forename  = $value['forename'];
				$surname  = $value['surname'];
				$email  = $value['email'];
				array_push($response, ['id' => $id,'username' => $username, 'forename' => $forename,  'surname' => $surname,  'email' => $email]);			
			}

			$this->data = $response;


		include __DIR__ . '/end_connection.php';
	}

	// Resource: https://code.tutsplus.com/tutorials/object-oriented-php-for-beginners--net-12762
	public function response(){
		return $this->data;
	}


	

	

}

$app = new Service();
