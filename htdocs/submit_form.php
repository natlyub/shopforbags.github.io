<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = trim($_POST['message']);

        // Свързване с базата данни
        $host = "localhost";
        $username = "root";
        $password = "root"; // Провери дали това е вярната парола за MAMP
        $database = "form_db";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Използване на prepared statement за сигурност
        $stmt = $conn->prepare("INSERT INTO form_tbl (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $msg);

        if ($stmt->execute()) {
            echo "Form Submitted Successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request!";
}
?>