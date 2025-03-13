<?php
// Database Connection
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Set your password
$dbname = "hospital_db"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $patientID = trim($_POST['patientID']);
    $firstName = trim($_POST['firstName']);
    $middleName = trim($_POST['middleName']);
    $surname = trim($_POST['surname']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $county = $_POST['county'];

    // Validate required fields
    if (empty($patientID) || empty($firstName) || empty($surname) || empty($dob) || empty($gender) || empty($county)) {
        echo "<p style='color:red;'>All required fields must be filled!</p>";
    } else {
        // Insert into database
        $sql = "INSERT INTO patients (patientID, firstName, middleName, surname, dob, gender, county) 
                VALUES ('$patientID', '$firstName', '$middleName', '$surname', '$dob', '$gender', '$county')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Patient registered successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
}

// Close connection
$conn->close();
?>
