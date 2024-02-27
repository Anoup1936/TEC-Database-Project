<!DOCTYPE html>
<!-- final_project_interface.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>A PHP Script for Displaying Information from a Database</title>
    <link href="styles.css" rel="stylesheet">
  </head>
  <body class="interface">
    <?php
    $server = "localhost";
    $server = "127.0.0.1";
    $user   = "root";
    $pass   = "";
    $db     = "tec";
    
    // Create connection with DBMS
    $conn = mysqli_connect($server, $user, $pass, $db);
    
    // Check whether connection succeeded
    if(mysqli_connect_errno()){
      echo "Failed to connect to Database: " . mysqli_connect_errno();    
    }

    echo "<div class='center_div'><h2>You sent me the values \"$_GET[value1]\"</h2></div>";

    // Create variable for FIRST_NAME column and set it as $_GET['value1']
    $candidateName = mysqli_real_escape_string($conn, $_GET['value1']);

    // Second SQL query to pull the data from the database
    $query = "SELECT JH.START_DATE AS 'Start Date', JH.END_DATE AS 'End Date', C.FIRST_NAME AS 'First Name', C.LAST_NAME AS 'Last Name', Q.QUALIFICATION_DESC AS 'Qualification'
    FROM JOB_HISTORY AS JH
    LEFT JOIN CANDIDATE AS C ON JH.CANDIDATE_ID = C.CANDIDATE_ID
    LEFT JOIN QUALIFICATION_STATUS AS QS ON QS.CANDIDATE_ID = JH.CANDIDATE_ID
    LEFT JOIN QUALIFICATIONS AS Q ON Q.QUALIFICATION_ID = QS.QUALIFICATION_ID
    WHERE C.FIRST_NAME LIKE '%$candidateName%';";

    // Sends the result of the SQL query to $result variable
    $result = $conn->query($query);

    // Displays the result of the SQL query to the webpage if the table contains data
    // Displays "0 results" if the table is empty
    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div class='center_div'>
          <table>
           <caption>Candidate Job History</caption>
            <tr>
              <th scope='col'>Start Date</th>
              <th scope='col'>End Date</th>
              <th scope='col'>First Name</th>
              <th scope='col'>Last Name</th>
              <th scope='col'>Qualification</th>
            </tr>
            <tr>";
              echo "<td>".$row["Start Date"]."</td>";
              echo "<td>".$row["End Date"]."</td>";
              echo "<td>".$row["First Name"]."</td>";
              echo "<td>".$row["Last Name"]."</td>";
              echo "<td>".$row["Qualification"]."</td>";
            echo "</tr>
          </table>
        </div>";
      }
    } else {
      echo "0 results";
    }
    ?>
  </body>
</html>
