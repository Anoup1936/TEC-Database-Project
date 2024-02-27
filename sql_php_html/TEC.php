<?php

// test_conn.php
// Update $user and $pass varibles according to your credentials
$server = "localhost";
$server = "127.0.0.1";
$user   = "root";
$pass   = "";
$db     = "mysql";
$dbupdated = "tec";

// Create connection with DBMS
// $conn = mysqli_connect($server, $user, $pass, $db);



$conn = mysqli_connect($server, $user, $pass, $db);

$create_db = "CREATE DATABASE IF NOT EXISTS tec";

$result = mysqli_query($conn, $create_db);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS CANDIDATE (
                    CANDIDATE_ID INT PRIMARY KEY,
                    FIRST_NAME VARCHAR(20) NOT NULL,
                    LAST_NAME VARCHAR(25) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);






$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS QUALIFICATIONS (
                    QUALIFICATION_ID INT PRIMARY KEY,
                    QUALIFICATION_CODE VARCHAR(20),
                    QUALIFICATION_DESC VARCHAR(100)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);






$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS COURSE (
                    COURSE_ID INT PRIMARY KEY,
                    COURSE_NAME VARCHAR(50) NOT NULL,
                    QUALIFICATION_ID INT,
                    FEE FLOAT(7, 2) NOT NULL,
                    FOREIGN KEY (QUALIFICATION_ID) REFERENCES QUALIFICATIONS(QUALIFICATION_ID)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS SESSION (
                    SESSION_ID INT PRIMARY KEY,
                    COURSE_ID INT,
                    FOREIGN KEY (COURSE_ID) REFERENCES COURSE(COURSE_ID)                    
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS COMPANY (
                    COMPANY_ID INT PRIMARY KEY,
                    COMPANY_NAME VARCHAR(20) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS QUALIFICATION_STATUS (
                    QUALIFICATION_ID INT,
                    CANDIDATE_ID INT ,
                    PRIMARY KEY (QUALIFICATION_ID, CANDIDATE_ID),
                    FOREIGN KEY (QUALIFICATION_ID) REFERENCES QUALIFICATIONS(QUALIFICATION_ID), 
                    FOREIGN KEY (CANDIDATE_ID) REFERENCES CANDIDATE(CANDIDATE_ID)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS PREREQUISITE (
                    QUALIFICATION_ID INT,
                    COURSE_ID INT,
                    PRIMARY KEY (QUALIFICATION_ID, COURSE_ID),
                    FOREIGN KEY (QUALIFICATION_ID) REFERENCES QUALIFICATIONS(QUALIFICATION_ID), 
                    FOREIGN KEY (COURSE_ID) REFERENCES COURSE(COURSE_ID)  
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);



$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS OPENING (
                    OPENING_ID INT PRIMARY KEY,
                    COMPANY_ID INT,
                    QUALIFICATION_ID INT,
                    ST_DATE DATE NOT NULL,
                    END_DATE DATE NOT NULL,
                    HOURLY_PAY FLOAT(7, 2) NOT NULL,
                    FOREIGN KEY (COMPANY_ID) REFERENCES COMPANY(COMPANY_ID),
                    FOREIGN KEY (QUALIFICATION_ID) REFERENCES QUALIFICATIONS(QUALIFICATION_ID)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS PLACEMENT (
                    PLACEMENT_ID INT PRIMARY KEY,
                    CANDIDATE_ID INT,
                    OPENING_ID INT,
                    HOURS_WORKED INT NOT NULL,
                    FOREIGN KEY (CANDIDATE_ID) REFERENCES CANDIDATE(CANDIDATE_ID),
                    FOREIGN KEY (OPENING_ID) REFERENCES OPENING(OPENING_ID)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS JOB_HISTORY (
                    OPENING_ID INT,
                    CANDIDATE_ID INT,
                    START_DATE DATE,
                    END_DATE DATE,   
                    PRIMARY KEY (OPENING_ID, CANDIDATE_ID),
                    FOREIGN KEY (CANDIDATE_ID) REFERENCES CANDIDATE(CANDIDATE_ID),
                    FOREIGN KEY (OPENING_ID) REFERENCES OPENING(OPENING_ID)
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);

?>
 
