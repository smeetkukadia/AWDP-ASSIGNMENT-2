<?php
// login.php
session_start();

// If already logged in, go straight to the dashboard
if (!empty($_SESSION["admin_id"])) {
  header("Location: dashboard.php");
  exit;
}

require "db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"] ?? "");
  $password = $_POST["password"] ?? "";

  if ($username === "" || $password === "") {
    $error = "Please enter both your username and password.";
  } else {
    $stmt = $conn->prepare("SELECT id, password_hash FROM admins WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $stmt->close();

    if ($admin && password_verify($password, $admin["password_hash"])) {
      // Prevent session fixation
      session_regenerate_id(true);
      $_SESSION["admin_id"] = $admin["id"];
      $_SESSION["admin_username"] = $username;
      header("Location: dashboard.php");
      exit;
    } else {
      $error = "Incorrect username or password.";
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
  <meta name="theme-color" content="#080b14">
  <title>Admin Login | Smeet Boii</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=Source+Code+Pro:wght@400;500;600&display=swap"
    rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    :root {
      --bg: #070a12;
      --card: rgba(15, 20, 34, .72);
      --text: #f5f7ff;
      --muted: #a7afc2;
      --cyan: #08f7fe;
      --purple: #9b7cff;
      --line: rgba(255, 255, 255, .10);
      --error: #ff6b81;
    }

    html {
      scroll-behavior: smooth
    }

    body {
      font-family: Inter, Arial, sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }

    a {
      color: inherit;
      text-decoration: none
    }

    /* Animated background (same as portfolio) */
    .background {
      position: fixed;
      inset: 0;
      z-index: -2;
      overflow: hidden;
      background: radial-gradient(circle at 50% -10%, #151c35 0, #070a12 48%, #05070d 100%)
    }

    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(2px);
      opacity: .26;
      animation: float 16s ease-in-out infinite alternate
    }

    .orb-one {
      width: 520px;
      height: 520px;
      background: radial-gradient(circle, #08f7fe, transparent 68%);
      top: -250px;
      right: -140px
    }

    .orb-two {
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, #9b7cff, transparent 68%);
      left: -250px;
      top: 35%
    }

    .orb-three {
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, #ff3de0, transparent 68%);
      right: 5%;
      bottom: 0
    }

    .grid-lines {
      position: absolute;
      inset: 0;
      opacity: .22;
      background-image: linear-gradient(rgba(255, 255, 255, .035) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .035) 1px, transparent 1px);
      background-size: 55px 55px;
      mask-image: linear-gradient(to bottom, black, transparent 90%)
    }

    @keyframes float {
      to {
        transform: translate(70px, 40px) scale(1.08)
      }
    }

    /* Login card */
    .login-wrap {
      width: 100%;
      max-width: 420px
    }

    .brand {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      font: 700 1.35rem "Space Grotesk";
      letter-spacing: -.03em;
      margin-bottom: 26px
    }

    .brand-mark {
      font-family: "Source Code Pro";
      font-size: 1rem;
      color: var(--cyan);
      border: 1px solid rgba(8, 247, 254, .35);
      padding: 5px 7px;
      border-radius: 8px
    }

    .accent {
      color: var(--cyan)
    }

    .glass {
      background: var(--card);
      border: 1px solid var(--line);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, .35)
    }

    .card {
      border-radius: 20px;
      padding: 40px 36px
    }

    .status {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 7px 12px;
      border: 1px solid rgba(8, 247, 254, .25);
      border-radius: 99px;
      background: rgba(8, 247, 254, .05);
      font-size: .72rem;
      color: #d9feff;
      margin-bottom: 22px
    }

    .status span {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #47ff9c;
      box-shadow: 0 0 10px #47ff9c
    }

    .eyebrow {
      font: 500 .72rem "Source Code Pro";
      letter-spacing: .18em;
      color: var(--cyan);
      margin-bottom: 8px
    }

    h1 {
      font: 700 2.2rem "Space Grotesk";
      letter-spacing: -.05em;
      line-height: 1.05;
      margin-bottom: 10px
    }

    h1 strong {
      color: var(--cyan)
    }

    .sub {
      font-size: .86rem;
      color: var(--muted);
      margin-bottom: 28px
    }

    .error-box {
      background: rgba(255, 107, 129, .08);
      border: 1px solid rgba(255, 107, 129, .35);
      color: var(--error);
      font-size: .85rem;
      padding: 11px 14px;
      border-radius: 10px;
      margin-bottom: 20px
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 20px
    }

    .field label {
      font: 600 .7rem "Source Code Pro";
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--muted)
    }

    .field input {
      width: 100%;
      padding: 14px 16px;
      background: rgba(255, 255, 255, .04);
      border: 1px solid var(--line);
      border-radius: 10px;
      color: var(--text);
      font: 400 .92rem/1.6 Inter, Arial, sans-serif;
      transition: .25s
    }

    .field input::placeholder {
      color: #6b7284
    }

    .field input:hover {
      border-color: rgba(255, 255, 255, .2)
    }

    .field input:focus {
      outline: none;
      background: rgba(255, 255, 255, .06);
      border-color: rgba(8, 247, 254, .5);
      box-shadow: 0 0 0 3px rgba(8, 247, 254, .12)
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      width: 100%;
      padding: 14px 19px;
      border-radius: 10px;
      font: 700 .85rem Inter, Arial, sans-serif;
      border: none;
      cursor: pointer;
      transition: .25s;
      margin-top: 6px;
      background: var(--cyan);
      color: #041014;
      box-shadow: 0 0 25px rgba(8, 247, 254, .14)
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 35px rgba(8, 247, 254, .28)
    }

    .btn span {
      color: #041014
    }

    .back-link {
      display: block;
      text-align: center;
      margin-top: 24px;
      font-size: .78rem;
      color: var(--muted);
      transition: .2s
    }

    .back-link:hover {
      color: var(--cyan)
    }

    @media (max-width: 480px) {
      .card {
        padding: 30px 24px
      }

      h1 {
        font-size: 1.9rem
      }
    }
  </style>
</head>

<body>

  <div class="background">
    <div class="orb orb-one"></div>
    <div class="orb orb-two"></div>
    <div class="orb orb-three"></div>
    <div class="grid-lines"></div>
  </div>

  <div class="login-wrap">
    <a class="brand" href="index.php" aria-label="Back to portfolio">
      <span class="brand-mark">&lt;/&gt;</span>
      <span>Smeet<span class="accent">.</span></span>
    </a>

    <div class="card glass">
      <div class="status"><span></span> Secure area</div>
      <p class="eyebrow">ADMIN ACCESS</p>
      <h1>Sign <strong>in</strong></h1>
      <p class="sub">Log in to view messages sent through your portfolio contact form.</p>

      <?php if ($error): ?>
        <div class="error-box"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <form method="POST" action="login.php">
        <div class="field">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Your username" autocomplete="username" required
            autofocus>
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password"
            required>
        </div>
        <button type="submit" class="btn">Sign in <span>↗</span></button>
      </form>

      <a class="back-link" href="index.php">&larr; Back to site</a>
    </div>
  </div>

</body>

</html>