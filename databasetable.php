<html>
<style>
table, th, td {
	border: 1px solid black;
}
</style>
<body>

<img src="php.png" width = 400 height = 200> </img>

<p> <a href="/index.html"> Main </a> </p>
<h1>This is the PHP testing page </h1>

	<?php
		//these var hold strings with the database and  authentication info
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "mycorp";

		echo "<h2>Employee Info Table</h2>";
		//create new connection using sql injection
		$conn = new mysqli($servername, $username, $password, $dbname);
		//if conn points to connetion error
		if ($conn->connection_error){
			//die() returns a mesage then exits the entire php script. similar to break in C
			die("Connection failed:" .$conn->connection_error);
		}
		//this will run the mysql query
		$sql = "SELECT first_name, last_name, department, email, phone, salery, date_entered FROM employee_info";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			//output data in each row
			//tr = table row  th = table heading    td = table down

			//creates the top row headings
			echo "<table><tr><th>First Name</th><th>Last Name</th><th>department</th><th>email</th><th>phone</th><th>salery</th><th>date entered</th></tr>";
			//loops until it reaches the last row. printd out the data in each row
			while($row = $result->fetch_assoc()){
				echo "<tr><td>" . $row["first_name"]. "</td><td> " .$row["last_name"]. "</td><td>" .$row["department"]. "</td><td>" .$row["email"]. "</td><td>" .$row["phone"]. "</td><td>" .$row["salery"].  "</td><td>" .$row["date_entered"]. "</td></tr>";
			}
			echo "</table>";
		}
		//if  the sql querty is wrong  return this 
		else {
			echo "0 results";
		}
		$conn->close();

	?>



</body>
</html>
