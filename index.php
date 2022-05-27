<?php include __DIR__ . '/includes/App/app.php';?>

<!doctype html><html>
<head>

<title>Alliance Military Archive</title>
<link rel="stylesheet" type="text/css" href="scripts/style.css"/>

<script>

// Regular Expressions
const nullRegEx = /\s/;
const userRegEx = /^[a-zA-Z@]+$/;



// Input search
function search(search){

	var search = document.getElementById("search").value.replace(/\s+/g, ''); // Input
  	document.getElementById("typed").innerHTML = "You are looking for " + search.replace(/\s+/g, ''); // Visual Output

  	if (search != nullRegEx) {
  		console.log(search);
  		citadelRecords(search); // Parse
  	}

  	if (search == null || search == "" || search == "undefined"){
  		document.getElementById("typed").innerHTML = "You are looking for...";
  	}

}

// Option Change 
/*
function option(where){
	var where = document.getElementById("where").value; // Input
  	
	var xhr; 
	xhr = new XMLHttpRequest(); // Shorthand variable

	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("records").innerHTML = this.responseText;
		}
	};

  	if (where) {
  		console.log(where);
  		xhr.open("POST", "includes/ajax/read.php", true); // Asyncronous POST
  		xhr.send(where);
  	}

}
*/

// Request and Response record if exists
function citadelRecords(request) {
	var xhr; 
	xhr = new XMLHttpRequest(); // Shorthand variable

	xhr.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("records").innerHTML = this.responseText;
			}
	};

	if (request.match(nullRegEx)){ // Prevent xhr if whitepsace found
		console.log("WhiteSpace Detected"); // Notify request

	} else if (request == null || request == "" || request == "undefined"){ // Prevent xhr if null, empty or undefined
		console.log("request is null"); // Notify request

		// Prevent xhr
		var request = null; // Defined as nothing to be found on request
	  	xhr.open("POST", "includes/ajax/read.php?username="+request, true); // Asyncronous POST
	  	xhr.send();

	} else if (request.match(userRegEx)){ // Allow xhr if Regex match
		console.log("Request made: ", request); // Show Request		

		// Commit xhr
	  	xhr.open("POST", "includes/ajax/read.php?username="+request, true); // Asyncronous POST
	  	xhr.send();
  	} 

}
</script>

</head>
<body>
<div class="content">
<h4>Search Personnel</h4>
<form>
<input id="search" type="text"/>
<div id="typed">You are looking for... </div>
<!-- <select id="where">
	<option value="id">UUID</option>
  	<option value="username">Username</option>
  	<option value="forename">Forename</option>
  	<option value="surname">Surname</option>
  	<option value="email">Email</option>
</select> -->
</form>

<script>
document.getElementById("search").addEventListener("keyup", search); // On type search for 
// document.getElementById("where").addEventListener("change", option); // On change where clause 
</script>


<h2>ALLIANCE RECORDS</h2>
<div id="records">
	



</div>


</div>
</body>
</html>
