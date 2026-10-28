<?php
// create_admin.php
// ONE-TIME SETUP SCRIPT: creates your admin login account.
//
// How to use:
//   1. Edit the $username and $password values below.
//   2. Upload this file to your server alongside the other files.
//   3. Visit it once in your browser (e.g. https://yoursite.com/create_admin.php).
//   4. You should see "Admin account created successfully."
//   5. DELETE this file from your server immediately after — leaving it
//      online would let anyone (re)create an admin account.

require "db_connect.php";

$username = "admin";             // <-- change this
$password = "admin123"; // <-- change this to a strong password

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO admins (username, password_hash, created_at) VALUES (?, ?, NOW())"
);
$stmt->bind_param("ss", $username, $password_hash);

if ($stmt->execute()) {
    echo "Admin account created successfully. You can now delete this file and log in at login.php.";
} else {
    if ($conn->errno === 1062) {
        echo "That username already exists. Pick a different username, or this account already exists — you can delete this file and log in.";
    } else {
        echo "Error creating admin account: " . htmlspecialchars($stmt->error);
    }
}

$stmt->close();
$conn->close();
?>
