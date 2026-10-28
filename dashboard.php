<?php
// dashboard.php
require "auth.php";   // redirects to login.php if not logged in
require "db_connect.php";

$messages = [];
$result = $conn->query("SELECT id, name, email, message, created_at FROM contact_messages ORDER BY created_at DESC");
if ($result) {
  while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
  }
}
$conn->close();

$admin_username = $_SESSION["admin_username"] ?? "Admin";

// Small summary numbers for the stat row
$total = count($messages);
$today_count = 0;
$today = date("Y-m-d");
foreach ($messages as $m) {
  if (date("Y-m-d", strtotime($m["created_at"])) === $today) {
    $today_count++;
  }
}
$latest = $total > 0 ? date("d M, g:i a", strtotime($messages[0]["created_at"])) : "—";

// First letter for the avatar circle (multibyte-safe when available)
function initial($name)
{
  $name = trim($name);
  if ($name === "")
    return "?";
  return function_exists("mb_substr")
    ? mb_strtoupper(mb_substr($name, 0, 1, "UTF-8"), "UTF-8")
    : strtoupper(substr($name, 0, 1));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#080b14">
  <title>Messages | Admin</title>
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

    /* Header */
    .site-header {
      position: sticky;
      top: 0;
      z-index: 20;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      padding: 18px clamp(20px, 5vw, 80px);
      background: rgba(7, 10, 18, .72);
      border-bottom: 1px solid var(--line);
      backdrop-filter: blur(18px);
      -webkit-backdrop-filter: blur(18px)
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 10px;
      font: 700 1.35rem "Space Grotesk";
      letter-spacing: -.03em
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

    .brand .tag {
      font: 500 .68rem "Source Code Pro";
      letter-spacing: .14em;
      color: var(--muted);
      border-left: 1px solid var(--line);
      padding-left: 12px;
      margin-left: 2px
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 16px;
      font-size: .8rem;
      color: var(--muted)
    }

    .header-right strong {
      color: var(--text);
      font-weight: 600
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 10px 16px;
      border-radius: 10px;
      font-size: .8rem;
      font-weight: 700;
      transition: .25s
    }

    .btn.secondary {
      border: 1px solid var(--line);
      background: rgba(255, 255, 255, .035)
    }

    .btn.secondary:hover {
      border-color: rgba(8, 247, 254, .45);
      transform: translateY(-2px)
    }

    .btn span {
      color: var(--cyan)
    }

    /* Layout */
    .section {
      width: min(1120px, calc(100% - 40px));
      margin: auto;
      padding: 70px 0 90px
    }

    .eyebrow {
      font: 500 .72rem "Source Code Pro";
      letter-spacing: .18em;
      color: var(--cyan);
      margin-bottom: 10px
    }

    .page-title {
      font: 700 clamp(2rem, 4vw, 3.2rem) "Space Grotesk";
      letter-spacing: -.05em;
      line-height: 1;
      margin-bottom: 12px
    }

    .page-title strong {
      color: var(--cyan)
    }

    .page-sub {
      color: var(--muted);
      font-size: .9rem;
      margin-bottom: 36px
    }

    .glass {
      background: var(--card);
      border: 1px solid var(--line);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, .18)
    }

    /* Stats */
    .stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin-bottom: 36px
    }

    .stat {
      border-radius: 16px;
      padding: 20px 24px;
      display: flex;
      flex-direction: column
    }

    .stat strong {
      font: 700 1.7rem "Space Grotesk";
      letter-spacing: -.03em
    }

    .stat strong.cyan {
      color: var(--cyan)
    }

    .stat span {
      font-size: .68rem;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .1em;
      margin-top: 2px
    }

    /* Messages */
    .msg-list {
      display: flex;
      flex-direction: column;
      gap: 16px
    }

    .msg-card {
      border-radius: 16px;
      padding: 24px 26px;
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 18px;
      transition: .25s
    }

    .msg-card:hover {
      border-color: rgba(8, 247, 254, .3);
      transform: translateY(-2px)
    }

    .avatar {
      width: 46px;
      height: 46px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      font: 700 1.05rem "Space Grotesk";
      color: #041014;
      background: linear-gradient(135deg, var(--cyan), var(--purple))
    }

    .msg-top {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 10px
    }

    .msg-name {
      font: 600 1.05rem "Space Grotesk";
      margin-right: 8px
    }

    .msg-email {
      font: 400 .78rem "Source Code Pro";
      color: var(--cyan);
      word-break: break-all
    }

    .msg-email:hover {
      text-decoration: underline
    }

    .msg-date {
      font: 400 .72rem "Source Code Pro";
      color: #737c90;
      white-space: nowrap
    }

    .msg-body {
      font-size: .92rem;
      line-height: 1.7;
      color: #cbd2e4;
      white-space: pre-wrap;
      word-break: break-word
    }

    .empty {
      border-radius: 16px;
      border-style: dashed;
      padding: 56px 24px;
      text-align: center;
      color: var(--muted);
      font-size: .9rem
    }

    .empty b {
      display: block;
      font: 600 1.1rem "Space Grotesk";
      color: var(--text);
      margin-bottom: 6px
    }

    @media (max-width: 700px) {
      .stats {
        grid-template-columns: 1fr
      }

      .header-right .who {
        display: none
      }

      .brand .tag {
        display: none
      }

      .msg-card {
        grid-template-columns: 1fr;
        padding: 22px
      }

      .section {
        padding: 50px 0 70px
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

  <header class="site-header">
    <a class="brand" href="index.php" aria-label="Back to portfolio">
      <span class="brand-mark">&lt;/&gt;</span>
      <span>Smeet<span class="accent">.</span></span>
      <span class="tag">ADMIN</span>
    </a>

    <div class="header-right">
      <span class="who">Signed in as <strong><?= htmlspecialchars($admin_username) ?></strong></span>
      <a class="btn secondary" href="logout.php">Log out <span>↗</span></a>
    </div>
  </header>

  <main class="section">
    <p class="eyebrow">INBOX</p>
    <h1 class="page-title">Contact <strong>Messages</strong></h1>
    <p class="page-sub">Everything submitted through your portfolio contact form, newest first.</p>

    <div class="stats">
      <div class="stat glass"><strong class="cyan"><?= $total ?></strong><span>Total messages</span></div>
      <div class="stat glass"><strong><?= $today_count ?></strong><span>Received today</span></div>
      <div class="stat glass"><strong><?= htmlspecialchars($latest) ?></strong><span>Latest message</span></div>
    </div>

    <?php if (empty($messages)): ?>
      <div class="empty glass">
        <b>No messages yet</b>
        New submissions from the contact form will show up here.
      </div>
    <?php else: ?>
      <div class="msg-list">
        <?php foreach ($messages as $m): ?>
          <article class="msg-card glass">
            <div class="avatar"><?= htmlspecialchars(initial($m["name"])) ?></div>
            <div>
              <div class="msg-top">
                <div>
                  <span class="msg-name"><?= htmlspecialchars($m["name"]) ?></span>
                  <a class="msg-email"
                    href="mailto:<?= htmlspecialchars($m["email"]) ?>"><?= htmlspecialchars($m["email"]) ?></a>
                </div>
                <div class="msg-date"><?= htmlspecialchars(date("d M Y, g:i a", strtotime($m["created_at"]))) ?></div>
              </div>
              <div class="msg-body"><?= htmlspecialchars($m["message"]) ?></div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </main>

</body>

</html>