<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname  = 'paystack_database';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    echo "Error in connection";
}
else{
    echo 'Successful connection';
}
$fname = mysqli_real_escape_string($conn, $_GET['fname']);
$surname = mysqli_real_escape_string($conn, $_GET['surname']);
$email = mysqli_real_escape_string($conn, $_GET['email']);
$phonenumber = mysqli_real_escape_string($conn, $_GET['phonenumber']);
$stateoforigin = mysqli_real_escape_string($conn, $_GET['stateoforigin']);
$address = mysqli_real_escape_string($conn, $_GET['address']);


mysqli_query($conn, "INSERT INTO candidate_table(firstname, surname, email, phonenumber, state, address)
 VALUES ('".$fname."', '".$surname."', '".$email."', '".$phonenumber."', '".$stateoforigin."', '".$address."' )");

mysqli_close($conn)
?>