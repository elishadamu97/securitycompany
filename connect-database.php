<?php
$host = 'localhost';
include 'config.php';
$fname = mysqli_real_escape_string($conn, $_GET['fname']);
$surname = mysqli_real_escape_string($conn, $_GET['surname']);
$email = mysqli_real_escape_string($conn, $_GET['email']);
$phonenumber = mysqli_real_escape_string($conn, $_GET['phonenumber']);
$stateoforigin = mysqli_real_escape_string($conn, $_GET['stateoforigin']);
$address = mysqli_real_escape_string($conn, $_GET['address']);
$reference = mysqli_real_escape_string($conn, $_GET['sent_to_database']);

mysqli_query($conn, "INSERT INTO candidate_table(firstname, surname, email, phonenumber, state, address, reference)
 VALUES ('".$fname."', '".$surname."', '".$email."', '".$phonenumber."', '".$stateoforigin."', '".$address."', '".$reference."' )");

mysqli_close($conn)
?>