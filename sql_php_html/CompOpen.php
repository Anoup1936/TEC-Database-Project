<!DOCTYPE html>
<!-- final_project_interface.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>A PHP Script for Testing the GET Protocol</title>
  </head>
  <body>
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

    // Creates Variables for each of the values entered in the company section of the html page
    $openID = $_POST["value0"];
    $compID = $_POST["value1"];
    $qualID = $_POST["value2"];
    $stDate = $_POST["value3"];
    $enDate = $_POST["value4"];
    $hrPay = $_POST["value5"];

    //Simple message that repeats what the user entered back to them
    echo "<h2>Here is your Opening! : </h2>
          <p>Opening ID: "  $openID  "</p>
          <p>Company ID: " . $compID . "</p>
          <p> Qualification ID Needed: " . $qualID . "</p>
          <p>Start Date: " . $stDate . "</p>
          <p>End Date: " . $enDate . "</p>
          <p>Hourly Pay: $" . $hrPay . "</p>";

    // SQL query to insert the user entered values into their corresponding table columns
    $sql = "INSERT INTO OPENING (OPENING_ID, COMPANY_ID, QUALIFICATION_ID, ST_DATE, END_DATE, HOURLY_PAY)
    VALUES ('$openID', '$compID', '$qualID', '$stDate', '$enDate', '$hrPay')";

    // Sends the result of the SQL query to $result variable
    $result = $conn->query($sql);
    ?>
  </body>
</html>