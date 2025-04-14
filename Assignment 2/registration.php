<?php
require 'db_config.php';

function clean_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Patient data
  $patientID = clean_input($_POST['patientID']);
  $firstName = clean_input($_POST['firstName']);
  $middleName = clean_input($_POST['middleName']);
  $surname = clean_input($_POST['surname']);
  $dob = clean_input($_POST['dob']);
  $gender = clean_input($_POST['gender']);
  $county = clean_input($_POST['county']);

  // Next of kin data
  $kinFirstName = clean_input($_POST['kinFirstName']);
  $kinSurname = clean_input($_POST['kinSurname']);
  $relationship = clean_input($_POST['relationship']);

  // Prepare SQL statements
  $stmt1 = $conn->prepare("INSERT INTO patients (patientID, firstName, middleName, surname, dob, gender, county)
                           VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt1->bind_param("sssssss", $patientID, $firstName, $middleName, $surname, $dob, $gender, $county);

  $stmt2 = $conn->prepare("INSERT INTO next_of_kin (patientID, firstName, surname, relationship)
                           VALUES (?, ?, ?, ?)");
  $stmt2->bind_param("ssss", $patientID, $kinFirstName, $kinSurname, $relationship);

  if ($stmt1->execute() && $stmt2->execute()) {
    $message = "Registration successful!";
  } else {
    $message = "Error: " . $conn->error;
  }

  $stmt1->close();
  $stmt2->close();
  $conn->close();
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
