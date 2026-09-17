<?php
// process.php
// Receives the portfolio contact form and stores messages in MySQL.

require __DIR__ . "/db_connect.php";

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$message = trim($_POST["message"] ?? "");
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $errors[] = "Invalid request.";
} else {
    if ($name === "") {
        $errors[] = "Name is required.";
    } elseif (mb_strlen($name) > 100) {
        $errors[] = "Name is too long.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } elseif (strlen($email) > 150) {
        $errors[] = "Email is too long.";
    }

    if ($message === "") {
        $errors[] = "Message cannot be empty.";
    } elseif (mb_strlen($message) > 2000) {
        $errors[] = "Message is too long.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare(
            "INSERT INTO contact_messages (name, email, message, created_at)
             VALUES (?, ?, ?, NOW())"
        );

        if ($stmt) {
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $success = true;
            } else {
                $errors[] = "Unable to save your message. Please try again.";
            }
            $stmt->close();
        } else {
            $errors[] = "Database statement could not be prepared.";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $success ? "Message Sent" : "Contact Error" ?> | Smeet Boii</title>
<link rel="stylesheet" href="./style/style.css">
<style>
.result-page{min-height:100vh;display:grid;place-items:center;padding:25px}
.result-card{max-width:520px;width:100%;padding:45px;border-radius:20px;text-align:center;background:rgba(15,20,34,.88);border:1px solid rgba(255,255,255,.1);box-shadow:0 25px 80px rgba(0,0,0,.35)}
.result-icon{width:60px;height:60px;margin:0 auto 20px;display:grid;place-items:center;border-radius:50%;font-size:28px}
.ok{background:rgba(71,255,156,.12);color:#47ff9c;border:1px solid rgba(71,255,156,.3)}
.bad{background:rgba(255,80,100,.1);color:#ff6d7e;border:1px solid rgba(255,80,100,.25)}
.result-card h1{font:700 2rem "Space Grotesk";margin-bottom:12px}
.result-card p{color:#a7afc2;font-size:.9rem;line-height:1.6}
.errors{text-align:left;color:#ff8c98;font-size:.85rem;line-height:1.7;margin:20px 0}
.result-card .btn{margin-top:20px}
</style>
</head>
<body>
<div class="result-page">
  <div class="result-card">
    <?php if ($success): ?>
      <div class="result-icon ok">&#10003;</div>
      <h1>Message sent!</h1>
      <p>Thanks, <?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>. Your message has been saved successfully. I'll get back to you soon.</p>
    <?php else: ?>
      <div class="result-icon bad">!</div>
      <h1>Something went wrong</h1>
      <ul class="errors">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <a class="btn primary" href="index.html#contact">Back to portfolio</a>
  </div>
</div>
</body>
</html>
