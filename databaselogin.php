<html>
<body>

<img src="php.png" width = 400 height = 200> </img>

<p> <a href="/index.html"> Main </a> </p>
<h1>This is the PHP testing page </h1>

        <?php
                $servername = "localhost";
                $username = "root";
                $password = "toor";
                $dbname = "mycorp";

                //create new connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connection_error){
                        die("Connection failed:" .$conn->connection_error);
                }
                //this will run the mysql query
                $sql = "SELECT first_name, last_name, title, last_updated FROM employees";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                        //output data in each row
                        while($row = $result->fetch_assoc()){
                                echo "first name: " . $row["first_name"]. " last name: " .$row["last_name"]. " Job: " .$row["title"]. " last updated: " .$row["last_updated"]. "<br>";
                        }
                }
                else {
                        echo "0 results";
                }
                $conn->close();
                
        ?>



</body>
</html>
