<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientID = $_POST['patientID'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $surname = $_POST['surname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $county = $_POST['county'];

    // SQL Query to Insert Data
    $sql = "INSERT INTO patients (patientID, firstName, middleName, surname, dob, gender, county) 
            VALUES ('$patientID', '$firstName', '$middleName', '$surname', '$dob', '$gender', '$county')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
