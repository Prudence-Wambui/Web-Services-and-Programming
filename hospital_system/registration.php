<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $gender = trim($_POST["gender"]);
    $county = trim($_POST["county"]);

    // Basic validation
    $errors = [];

    if (empty($firstName)) {
        $errors[] = "First Name is required.";
    }

    if (empty($lastName)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    }

    if (empty($county)) {
        $errors[] = "Please select a county.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<h3 style='color: red;'>Errors:</h3>";
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='registration.html'>Go Back</a>";
        exit;
    }

    // If no errors, show success message
    echo "<h2>Registration Successful</h2>";
    echo "<p><strong>First Name:</strong> $firstName</p>";
    echo "<p><strong>Last Name:</strong> $lastName</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>County:</strong> $county</p>";
    echo "<br><a href='index.html'>Return to Home</a>";
} else {
    // Redirect back if accessed directly
    header("Location: registration.html");
    exit;
}
?>
