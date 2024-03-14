<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
    } else {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

        if (mysqli_query($conn, $sql)) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Error: Form submission method not allowed.";
}
?>
