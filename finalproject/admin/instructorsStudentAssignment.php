<?php

session_start(); 

include 'dbConnection.php'; //Have to have access to the db file code

$conn = getDatabaseConnection("channel_islands");

if(!isset( $_SESSION['adminName'])) 
{
    //redirects back to login.php if $_SESSION doesn't contain admin credentials
    header("Location:/finalProject/index.php");
}

function studentAssignment() {
    global $conn;
    $sql="SELECT concat(i.firstname, ' ', i.lastname) as instructor, count(*) as number_of_students
          FROM instructors i
	      JOIN students s 
		  ON s.instructorid = i.instructorid
          GROUP BY instructor
          ORDER BY number_of_students";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Instructors' Student Assignment </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <header>
            <h1> Instructors' Student Assignment </h1>
        </header>
        
        <h3> Welcome <?=$_SESSION['adminName']?>!</h3><br />
        
        <nav>
            <hr width="50%" />
           <a href="reports.php">Reports</a>
        </nav>
        
        <br /><br />

        <form action="/finalProject/logout.php">
            <input type="submit" class = 'btn btn-secondary' id = "beginning" value="Logout"/>
        </form>
        
        <br />
        
        <?php 
        $records=studentAssignment();

        echo "<table class='table table-hover'>";
        echo "<thread>
        <tr>
            <th scope='col'>Instructor</th>
            <th scope='col'># of Students</th>
        </tr>
       </thread>";
       echo"<tbody>";
       foreach($records as $record) {
           echo "<tr>";
           echo "<td>" . $record['instructor'] . "</td>";
           echo "<td>" . $record['number_of_students'] . "</td>";
       }
       echo "</tbody>";
       echo "</table>";
       ?>
       
       <footer>
            <hr>
            CST 336. 2018&copy;  Zephyr Consultants <br />
        </footer>
    </body>
</html>