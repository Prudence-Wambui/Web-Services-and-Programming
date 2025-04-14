<?php
require 'db_config.php';

function clean_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $patientID = clean_input($_POST['patientID']);
  $firstName = clean_input($_POST['firstName']);
  $middleName = clean_input($_POST['middleName']);
  $surname = clean_input($_POST['surname']);
  $dob = clean_input($_POST['dob']);
  $gender = clean_input($_POST['gender']);
  $county = clean_input($_POST['county']);

  // Insert into DB
  $sql = "INSERT INTO patients (patientID, firstName, middleName, surname, dob, gender, county)
          VALUES ('$patientID', '$firstName', '$middleName', '$surname', '$dob', '$gender', '$county')";

  if ($conn->query($sql) === TRUE) {
    $message = "Registration successful!";
  } else {
    $message = "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Confirmation</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <div class="form-container">
    <h2><?php echo $message; ?></h2>
    <a href="index.html">Back to Home</a>
  </div>
</body>
</html>
