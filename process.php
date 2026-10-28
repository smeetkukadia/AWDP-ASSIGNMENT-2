<?php
// process.php
// Handles the contact form submission (called via fetch/AJAX) and
// responds with JSON so the page can show a popup instead of redirecting.

header("Content-Type: application/json");

require "db_connect.php";

$response = [
    "success" => false,
    "message" => "",
    "errors"  => [],
];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    $response["message"] = "Invalid request method.";
    echo json_encode($response);
    exit;
}

$name    = trim($_POST["name"] ?? "");
$email   = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");

if ($name === "") {
    $response["errors"][] = "Name is required.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response["errors"][] = "A valid email is required.";
}
if ($message === "") {
    $response["errors"][] = "Message cannot be empty.";
}

if (empty($response["errors"])) {
    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())"
    );

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            $response["success"] = true;
            $response["message"] = "Thanks, " . $name . " — your message has been sent. I'll get back to you soon.";
        } else {
            http_response_code(500);
            $response["message"] = "Something went wrong while saving your message. Please try again.";
        }
        $stmt->close();
    } else {
        http_response_code(500);
        $response["message"] = "Something went wrong. Please try again.";
    }
} else {
    http_response_code(422);
    $response["message"] = "Please fix the errors below.";
}

$conn->close();
echo json_encode($response);
?>
