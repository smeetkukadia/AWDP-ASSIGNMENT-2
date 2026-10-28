<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Smeet Boii — developer portfolio showcasing skills, projects, experience and contact information.">
  <meta name="author" content="Smeet Boii">
  <meta name="theme-color" content="#080b14">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=Source+Code+Pro:wght@400;500&display=swap"
    rel="stylesheet">
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <title>Smeet Boii | Portfolio</title>
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
      --line: rgba(255, 255, 255, .10)
    }

    html {
      scroll-behavior: smooth
    }

    body {
      font-family: Inter, Arial, sans-serif;
      background: var(--bg);
      color: var(--text);
      overflow-x: hidden;
      line-height: 1.6
    }

    a {
      color: inherit;
      text-decoration: none
    }

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

    .site-header {
      position: sticky;
      top: 0;
      z-index: 20;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 30px;
      padding: 18px clamp(20px, 5vw, 80px);
      background: rgba(7, 10, 18, .72);
      border-bottom: 1px solid var(--line);
      backdrop-filter: blur(18px)
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

    .nav {
      display: flex;
      gap: 25px;
      align-items: center
    }

    .nav a {
      font-size: .82rem;
      color: var(--muted);
      transition: .25s
    }

    .nav a:hover,
    .nav a.active {
      color: #fff
    }

    .nav a.active:after {
      content: "";
      display: block;
      height: 2px;
      margin-top: 6px;
      background: var(--cyan);
      box-shadow: 0 0 10px var(--cyan)
    }

    .nav-cta {
      font-size: .8rem;
      font-weight: 700;
      border: 1px solid var(--line);
      padding: 10px 16px;
      border-radius: 10px;
      background: rgba(255, 255, 255, .04)
    }

    .nav-cta span {
      color: var(--cyan)
    }

    .section {
      width: min(1120px, calc(100% - 40px));
      margin: auto;
      padding: 110px 0
    }

    .hero {
      min-height: calc(100vh - 74px);
      display: grid;
      grid-template-columns: 1.15fr .85fr;
      align-items: center;
      gap: 70px;
      padding-top: 80px
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
      margin-bottom: 25px
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
      margin-bottom: 10px
    }

    .hero h1 {
      font: 800 clamp(3.7rem, 8vw, 7rem) "Space Grotesk";
      letter-spacing: -.075em;
      line-height: .95
    }

    .hero h1 span {
      background: linear-gradient(90deg, #fff, var(--cyan));
      -webkit-background-clip: text;
      color: transparent
    }

    .hero h2 {
      font: 600 clamp(1rem, 2vw, 1.4rem) "Space Grotesk";
      color: #c9cede;
      margin-top: 22px
    }

    .hero h2 i {
      font-style: normal;
      color: var(--cyan);
      margin: 0 8px
    }

    .hero-text {
      max-width: 620px;
      color: var(--muted);
      font-size: 1rem;
      margin: 20px 0 28px
    }

    .hero-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 15px;
      padding: 13px 19px;
      border-radius: 10px;
      font-size: .82rem;
      font-weight: 700;
      transition: .25s
    }

    .btn.primary {
      background: var(--cyan);
      color: #041014;
      box-shadow: 0 0 25px rgba(8, 247, 254, .14)
    }

    .btn.primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 35px rgba(8, 247, 254, .28)
    }

    .btn.secondary {
      border: 1px solid var(--line);
      background: rgba(255, 255, 255, .035)
    }

    .btn.secondary:hover {
      border-color: rgba(8, 247, 254, .45);
      transform: translateY(-3px)
    }

    .quick-stats {
      display: flex;
      gap: 35px;
      margin-top: 50px
    }

    .quick-stats div {
      display: flex;
      flex-direction: column
    }

    .quick-stats strong {
      font: 700 1.4rem "Space Grotesk"
    }

    .quick-stats span {
      font-size: .68rem;
      color: var(--muted);
      text-transform: uppercase;
      letter-spacing: .1em
    }

    .hero-card {
      border: 1px solid rgba(255, 255, 255, .12);
      border-radius: 18px;
      overflow: hidden;
      background: rgba(5, 8, 15, .72);
      box-shadow: 0 25px 80px rgba(0, 0, 0, .35);
      transform: rotate(1.5deg)
    }

    .terminal-top {
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 13px 16px;
      border-bottom: 1px solid var(--line);
      font: 500 .7rem "Source Code Pro";
      color: #727b90
    }

    .terminal-top span {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: #4c5363
    }

    .terminal-top b {
      margin-left: 8px;
      font-weight: 400
    }

    .terminal-body {
      padding: 28px;
      font: 500 .82rem/2 "Source Code Pro";
      color: #cbd2e4
    }

    .terminal-body em {
      font-style: normal;
      color: var(--purple)
    }

    .terminal-body strong {
      color: var(--cyan);
      font-weight: 500
    }

    .indent {
      padding-left: 25px
    }

    .terminal-line {
      margin-top: 22px;
      border-top: 1px solid var(--line);
      padding-top: 17px;
      color: #fff
    }

    .terminal-line span {
      color: #47ff9c
    }

    .cursor {
      color: var(--cyan);
      animation: blink 1s infinite
    }

    @keyframes blink {
      50% {
        opacity: 0
      }
    }

    .content-section {
      opacity: 0;
      transform: translateY(25px);
      transition: .8s ease
    }

    .content-section.visible,
    .quote-section.visible,
    .contact-section.visible {
      opacity: 1;
      transform: none
    }

    .section-heading {
      display: flex;
      gap: 22px;
      align-items: flex-start;
      margin-bottom: 45px
    }

    .section-heading>span {
      font: 600 .75rem "Source Code Pro";
      color: var(--cyan);
      padding-top: 11px
    }

    .section-heading h2 {
      font: 700 clamp(2rem, 4vw, 3.2rem) "Space Grotesk";
      letter-spacing: -.05em;
      line-height: 1
    }

    .section-heading h2 strong {
      color: var(--cyan)
    }

    .about-grid {
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      gap: 35px;
      align-items: center
    }

    .glass {
      background: var(--card);
      border: 1px solid var(--line);
      backdrop-filter: blur(15px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, .18)
    }

    .about-card {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 28px;
      border-radius: 16px
    }

    .avatar {
      width: 72px;
      height: 72px;
      display: grid;
      place-items: center;
      border-radius: 18px;
      background: linear-gradient(135deg, var(--cyan), var(--purple));
      color: #071018;
      font: 800 1.35rem "Space Grotesk"
    }

    .about-card h3 {
      font: 600 1.1rem "Space Grotesk";
      margin-bottom: 6px
    }

    .about-card p,
    .about-copy p {
      color: var(--muted);
      font-size: .9rem
    }

    .about-copy {
      padding: 10px
    }

    .about-copy p+p {
      margin-top: 16px
    }

    .mini-list {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 25px
    }

    .mini-list span {
      font-size: .7rem;
      color: #d7dcec;
      border: 1px solid var(--line);
      padding: 7px 10px;
      border-radius: 8px
    }

    .skills-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 15px
    }

    .skill-card {
      padding: 24px;
      border-radius: 14px;
      transition: .3s
    }

    .skill-card:hover,
    .project-card:hover {
      transform: translateY(-7px);
      border-color: rgba(8, 247, 254, .28)
    }

    .skill-icon,
    .project-icon {
      display: grid;
      place-items: center;
      width: 48px;
      height: 48px;
      border: 1px solid rgba(8, 247, 254, .25);
      border-radius: 12px;
      color: var(--cyan);
      font: 700 .8rem "Source Code Pro";
      margin-bottom: 25px
    }

    .skill-card h3,
    .project-card h3 {
      font: 600 1.05rem "Space Grotesk";
      margin-bottom: 8px
    }

    .skill-card p,
    .project-card p {
      color: var(--muted);
      font-size: .78rem
    }

    .tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-top: 17px
    }

    .tags span {
      font-size: .62rem;
      padding: 5px 8px;
      border-radius: 6px;
      background: rgba(255, 255, 255, .05);
      color: #cdd4e4;
      border: 1px solid var(--line)
    }

    .projects-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px
    }

    .project-card {
      position: relative;
      padding: 28px;
      border-radius: 16px;
      transition: .3s;
      overflow: hidden
    }

    .project-card.featured {
      grid-column: span 2
    }

    .project-number {
      position: absolute;
      right: 22px;
      top: 20px;
      color: rgba(255, 255, 255, .12);
      font: 700 3rem "Space Grotesk"
    }

    .project-icon {
      width: 58px;
      height: 58px
    }

    .project-type {
      font: 500 .63rem "Source Code Pro";
      letter-spacing: .15em;
      color: var(--cyan) !important
    }

    .project-content {
      max-width: 720px
    }

    .project-content h3 {
      font-size: 1.45rem;
      margin: 6px 0 10px
    }

    .project-link {
      display: inline-block;
      margin-top: 22px;
      color: #fff;
      font-size: .75rem;
      font-weight: 700;
      border-bottom: 1px solid var(--cyan);
      padding-bottom: 3px
    }

    .timeline {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 15px
    }

    .timeline-item {
      padding: 24px;
      border-top: 1px solid rgba(8, 247, 254, .45);
      background: rgba(255, 255, 255, .025)
    }

    .timeline-item>span {
      font: 600 .7rem "Source Code Pro";
      color: var(--cyan)
    }

    .timeline-item h3 {
      font: 600 1rem "Space Grotesk";
      margin: 20px 0 8px
    }

    .timeline-item p {
      font-size: .76rem;
      color: var(--muted)
    }

    .quote-section {
      text-align: center;
      opacity: 0;
      transform: translateY(25px);
      transition: .8s ease
    }

    .quote-mark {
      font: 800 5rem Georgia;
      color: var(--cyan);
      line-height: .5;
      opacity: .7
    }

    blockquote {
      font: 700 clamp(1.6rem, 4vw, 3rem) "Space Grotesk";
      letter-spacing: -.04em;
      max-width: 800px;
      margin: 15px auto
    }

    .quote-section>p:last-child {
      color: var(--muted);
      font-size: .75rem
    }

    .contact-section {
      opacity: 0;
      transform: translateY(25px);
      transition: .8s ease
    }

    .contact-card {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 30px;
      padding: 45px;
      border-radius: 20px
    }

    .contact-card h2 {
      font: 700 clamp(2rem, 4vw, 3.2rem) "Space Grotesk";
      letter-spacing: -.05em;
      line-height: 1.05;
      margin-bottom: 15px
    }

    .contact-card h2 strong {
      color: var(--cyan)
    }

    .contact-card p:last-child {
      max-width: 650px;
      color: var(--muted);
      font-size: .86rem
    }

    /* ---------- Contact layout, details & form ---------- */
    .contact-layout {
      display: grid;
      grid-template-columns: .95fr 1.05fr;
      gap: 30px;
      align-items: stretch
    }

    .contact-layout .contact-card {
      flex-direction: column;
      align-items: flex-start;
      justify-content: space-between;
      gap: 40px
    }

    .contact-details {
      display: flex;
      flex-direction: column;
      gap: 20px;
      width: 100%;
      padding-top: 28px;
      border-top: 1px solid var(--line)
    }

    .contact-details>div {
      display: flex;
      flex-direction: column;
      gap: 4px
    }

    .contact-details span {
      font: 600 .68rem "Source Code Pro";
      letter-spacing: .14em;
      color: var(--cyan)
    }

    .contact-details a,
    .contact-details p {
      font-size: .92rem;
      color: var(--text);
      word-break: break-word;
      transition: .2s
    }

    .contact-details a:hover {
      color: var(--cyan)
    }

    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 22px;
      padding: 40px;
      border-radius: 20px
    }

    .form-row {
      display: flex;
      flex-direction: column;
      gap: 8px
    }

    .form-row label {
      font: 600 .7rem "Source Code Pro";
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--muted)
    }

    .form-row input,
    .form-row textarea {
      width: 100%;
      padding: 14px 16px;
      background: rgba(255, 255, 255, .04);
      border: 1px solid var(--line);
      border-radius: 10px;
      color: var(--text);
      font: 400 .92rem/1.6 Inter, Arial, sans-serif;
      transition: .25s
    }

    .form-row textarea {
      resize: vertical;
      min-height: 140px
    }

    .form-row input::placeholder,
    .form-row textarea::placeholder {
      color: #6b7284
    }

    .form-row input:hover,
    .form-row textarea:hover {
      border-color: rgba(255, 255, 255, .2)
    }

    .form-row input:focus,
    .form-row textarea:focus {
      outline: none;
      background: rgba(255, 255, 255, .06);
      border-color: rgba(8, 247, 254, .5);
      box-shadow: 0 0 0 3px rgba(8, 247, 254, .12)
    }

    .submit-btn {
      width: 100%;
      justify-content: center;
      border: none;
      cursor: pointer;
      font-family: Inter, Arial, sans-serif;
      margin-top: 4px
    }

    .submit-btn .btn-label span {
      margin-left: 6px
    }

    .social-row {
      display: flex;
      justify-content: center;
      gap: 28px;
      margin-top: 30px
    }

    .social-row a {
      font-size: .75rem;
      color: var(--muted);
      transition: .2s
    }

    .social-row a:hover {
      color: var(--cyan)
    }

    .footer {
      width: min(1120px, calc(100% - 40px));
      margin: auto;
      padding: 28px 0 40px;
      border-top: 1px solid var(--line);
      display: flex;
      justify-content: space-between;
      color: #737c90;
      font-size: .68rem
    }

    .footer strong {
      font: 600 .9rem "Space Grotesk";
      color: #fff
    }

    .footer p {
      text-align: center
    }

    @media(max-width:900px) {
      .nav {
        display: none
      }

      .hero {
        grid-template-columns: 1fr;
        gap: 40px
      }

      .hero-card {
        max-width: 650px;
        width: 100%;
        transform: none
      }

      .skills-grid {
        grid-template-columns: repeat(2, 1fr)
      }

      .timeline {
        grid-template-columns: repeat(2, 1fr)
      }

      .about-grid {
        grid-template-columns: 1fr
      }

      .contact-layout {
        grid-template-columns: 1fr
      }
    }

    @media(max-width:600px) {
      .site-header {
        padding: 15px 20px
      }

      .nav-cta {
        display: none
      }

      .section {
        padding: 75px 0
      }

      .hero {
        min-height: auto;
        padding-top: 65px
      }

      .hero h1 {
        font-size: 3.5rem
      }

      .hero h2 {
        font-size: .95rem
      }

      .hero h2 i {
        margin: 0 3px
      }

      .quick-stats {
        gap: 20px;
        margin-top: 35px
      }

      .quick-stats strong {
        font-size: 1.15rem
      }

      .skills-grid,
      .projects-grid,
      .timeline {
        grid-template-columns: 1fr
      }

      .project-card.featured {
        grid-column: span 1
      }

      .contact-card {
        padding: 28px;
        align-items: flex-start;
        flex-direction: column
      }

      .contact-form {
        padding: 28px
      }

      .social-row {
        flex-wrap: wrap;
        gap: 15px
      }

      .footer {
        flex-direction: column;
        gap: 10px;
        text-align: center
      }

      .footer p {
        text-align: center
      }
    }

    .toast {
      position: fixed;
      left: 50%;
      bottom: 32px;
      transform: translateX(-50%) translateY(20px);
      max-width: min(420px, calc(100vw - 32px));
      background: rgba(18, 22, 34, 0.92);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      color: #f3f4f6;
      padding: 14px 20px;
      border-radius: 12px;
      border: 1px solid rgba(255, 255, 255, 0.12);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45);
      font-family: 'Inter', sans-serif;
      font-size: 14.5px;
      line-height: 1.5;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.25s ease, transform 0.25s ease;
      z-index: 9999;
      border-left: 3px solid transparent;
    }

    .toast.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateX(-50%) translateY(0);
    }

    .toast.success {
      border-left-color: #22c55e;
    }

    .toast.error {
      border-left-color: #ef4444;
    }

    #contactSubmitBtn:disabled {
      opacity: 0.7;
      cursor: default;
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
    <a class="brand" href="#home" aria-label="Smeet Boii home">
      <span class="brand-mark">&lt;/&gt;</span>
      <span>Smeet<span class="accent">.</span></span>
    </a>

    <nav class="nav" aria-label="Main navigation">
      <a class="active" href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#skills">Skills</a>
      <a href="#projects">Projects</a>
      <a href="#journey">Journey</a>
      <a href="#contact">Contact</a>
    </nav>

    <a class="nav-cta" href="mailto:smeetkukadia3101@gmail.com">Let's talk <span>↗</span></a>
  </header>

  <main>
    <section id="home" class="hero section">
      <div class="hero-copy reveal">
        <div class="status"><span></span> Available for opportunities</div>
        <p class="eyebrow">HELLO, I'M</p>
        <h1>Smeet <span>Kukadia</span></h1>
        <h2>Developer <i>•</i> Problem Solver <i>•</i> Tech Explorer</h2>
        <p class="hero-text">
          I enjoy building clean, useful web experiences and learning how technology works
          from the inside out.
        </p>

        <div class="hero-actions">
          <a class="btn primary" href="#projects">View my work <span>↓</span></a>
          <a class="btn secondary" href="#contact">Get in touch <span>↗</span></a>
        </div>

        <div class="quick-stats">
          <div><strong>06+</strong><span>Core skills</span></div>
          <div><strong>∞</strong><span>Things to learn</span></div>
          <div><strong>24/7</strong><span>Curiosity</span></div>
        </div>
      </div>

      <div class="hero-card reveal">
        <div class="terminal-top"><span></span><span></span><span></span><b>~/smeet/portfolio</b></div>
        <div class="terminal-body">
          <p><em>const</em> developer = {</p>
          <p class="indent">name: <strong>"Smeet Kukadia"</strong>,</p>
          <p class="indent">focus: <strong>"Web Development"</strong>,</p>
          <p class="indent">learning: <strong>"Always"</strong>,</p>
          <p class="indent">coffee: <strong>true</strong></p>
          <p>};</p>
          <div class="terminal-line"><span>$</span> build something awesome<span class="cursor">_</span></div>
        </div>
      </div>
    </section>

    <section id="about" class="section content-section">
      <div class="section-heading">
        <span>01</span>
        <div>
          <p class="eyebrow">GET TO KNOW ME</p>
          <h2>About <strong>Me</strong></h2>
        </div>
      </div>
      <div class="about-grid">
        <div class="about-card glass">
          <div class="avatar">SK</div>
          <div>
            <h3>A self-taught developer</h3>
            <p>I like turning ideas into working interfaces, experimenting with code and understanding systems by
              building and taking them apart.</p>
          </div>
        </div>
        <div class="about-copy">
          <p>My portfolio is a growing collection of things I have learned, built and explored. I care about simple
            interfaces, readable code and practical solutions.</p>
          <p>Outside individual projects, I am interested in cybersecurity, Linux, programming and the technologies
            behind the web.</p>
          <div class="mini-list">
            <span>⌁ Curious by nature</span><span>⌁ Learning by doing</span><span>⌁ Focused on improvement</span>
          </div>
        </div>
      </div>
    </section>

    <section id="skills" class="section content-section">
      <div class="section-heading">
        <span>02</span>
        <div>
          <p class="eyebrow">WHAT I WORK WITH</p>
          <h2>Skills & <strong>Tools</strong></h2>
        </div>
      </div>
      <div class="skills-grid">
        <article class="skill-card glass">
          <div class="skill-icon">&lt;/&gt;</div>
          <h3>Frontend</h3>
          <p>Building responsive pages with structure, styling and interactive behaviour.</p>
          <div class="tags"><span>HTML5</span><span>CSS3</span><span>JavaScript</span></div>
        </article>
        <article class="skill-card glass">
          <div class="skill-icon">PY</div>
          <h3>Programming</h3>
          <p>Writing practical programs and exploring programming concepts through projects.</p>
          <div class="tags"><span>Python</span><span>PHP</span><span>Logic</span></div>
        </article>
        <article class="skill-card glass">
          <div class="skill-icon">⌘</div>
          <h3>Development Tools</h3>
          <p>Using developer tools and version control to build, test and manage projects.</p>
          <div class="tags"><span>Git</span><span>GitHub</span><span>VS Code</span></div>
        </article>
        <article class="skill-card glass">
          <div class="skill-icon">LX</div>
          <h3>Systems & Security</h3>
          <p>Exploring Linux environments, networking and cybersecurity fundamentals.</p>
          <div class="tags"><span>Linux</span><span>Networking</span><span>Cybersecurity</span></div>
        </article>
      </div>
    </section>

    <section id="projects" class="section content-section">
      <div class="section-heading">
        <span>03</span>
        <div>
          <p class="eyebrow">SELECTED WORK</p>
          <h2>Featured <strong>Projects</strong></h2>
        </div>
      </div>
      <div class="projects-grid">
        <article class="project-card featured glass">
          <div class="project-number">01</div>
          <div class="project-icon">BANK</div>
          <div class="project-content">
            <p class="project-type">ACADEMIC PROJECT</p>
            <h3>Banking Application</h3>
            <p>A centralized banking platform concept covering login, account management, transfers, transaction
              history, loans, deposits, notifications and security features.</p>
            <div class="tags"><span>Web</span><span>PHP</span><span>MySQL</span><span>Security</span></div>
          </div>
          <a class="project-link" href="#contact">Discuss project ↗</a>
        </article>

        <article class="project-card glass">
          <div class="project-number">02</div>
          <div class="project-icon">&lt;/&gt;</div>
          <div class="project-content">
            <p class="project-type">WEB DEVELOPMENT</p>
            <h3>Personal Portfolio</h3>
            <p>A responsive developer portfolio designed around a dark glassmorphism aesthetic, animated background and
              clear project sections.</p>
            <div class="tags"><span>HTML</span><span>CSS</span><span>Responsive</span></div>
          </div>
          <a class="project-link" href="#home">Explore ↗</a>
        </article>

        <article class="project-card glass">
          <div class="project-number">03</div>
          <div class="project-icon">SEC</div>
          <div class="project-content">
            <p class="project-type">CYBERSECURITY</p>
            <h3>Security Case Studies</h3>
            <p>Academic research and documentation exploring cybercrime, malware, attack phases and security awareness.
            </p>
            <div class="tags"><span>Research</span><span>Security</span><span>Documentation</span></div>
          </div>
          <a class="project-link" href="#contact">Learn more ↗</a>
        </article>
      </div>
    </section>

    <section id="journey" class="section content-section">
      <div class="section-heading">
        <span>04</span>
        <div>
          <p class="eyebrow">MY PROCESS</p>
          <h2>Learning <strong>Journey</strong></h2>
        </div>
      </div>
      <div class="timeline">
        <div class="timeline-item"><span>01</span>
          <div>
            <h3>Explore</h3>
            <p>Start with a question, idea or technology that I want to understand.</p>
          </div>
        </div>
        <div class="timeline-item"><span>02</span>
          <div>
            <h3>Build</h3>
            <p>Turn the idea into a small working project and learn through practice.</p>
          </div>
        </div>
        <div class="timeline-item"><span>03</span>
          <div>
            <h3>Break & Debug</h3>
            <p>Find what fails, understand why it fails and improve the implementation.</p>
          </div>
        </div>
        <div class="timeline-item"><span>04</span>
          <div>
            <h3>Document</h3>
            <p>Organize the result so the next project can start from a better foundation.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section quote-section">
      <div class="quote-mark">“</div>
      <blockquote>Build it. Break it. Understand it. Improve it.</blockquote>
      <p>— a simple approach to learning technology</p>
    </section>

    <section id="contact" class="section contact-section">
      <div class="section-heading">
        <span>05</span>
        <div>
          <p class="eyebrow">GET IN TOUCH</p>
          <h2>Contact <strong>Me</strong></h2>
        </div>
      </div>

      <div class="contact-layout">
        <div class="contact-card glass">
          <div>
            <p class="eyebrow">HAVE AN IDEA?</p>
            <h2>Let's build something <strong>useful.</strong></h2>
            <p>Send me a message using the form. Your name, email and message will be securely stored in MySQL.</p>
          </div>
          <div class="contact-details">
            <div><span>EMAIL</span><a href="mailto:smeetkukadia3101@gmail.com">smeetkukadia3101@gmail.com</a></div>
            <div><span>RESPONSE</span>
              <p>I'll get back to you soon.</p>
            </div>
          </div>
        </div>

        <form class="contact-form glass" id="contactForm" action="process.php" method="POST">
          <div class="form-row">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" placeholder="Your name" maxlength="100" required>
          </div>
          <div class="form-row">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" placeholder="you@example.com" maxlength="150" required>
          </div>
          <div class="form-row">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" placeholder="Tell me about your project..." maxlength="2000"
              required></textarea>
          </div>
          <button class="btn primary submit-btn" type="submit" id="contactSubmitBtn">
            <span class="btn-label">Send message <span>↗</span></span>
          </button>
        </form>
      </div>

      <div class="social-row">
        <a href="https://github.com/smeet-boii" target="_blank" rel="noopener">GitHub ↗</a>
        <a href="https://instagram.com/smeet_boii" target="_blank" rel="noopener">Instagram ↗</a>
        <a href="https://telegram.me/botboii" target="_blank" rel="noopener">Telegram ↗</a>
        <a href="https://www.snapchat.com/add/smeet_boii" target="_blank" rel="noopener">Snapchat ↗</a>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div><strong>Smeet<span class="accent">.</span></strong> Kukadia</div>
    <p>Designed & built with curiosity.</p>
    <span>© 2026 · <a href="login.php" style="color:inherit; opacity:0.6;">Admin</a></span>
  </footer>

  <div id="toast" class="toast" role="status" aria-live="polite"></div>

  <script>
    const revealItems = document.querySelectorAll('.reveal, .content-section, .quote-section, .contact-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.12 });
    revealItems.forEach(item => observer.observe(item));

    // --- Contact form: submit via fetch, show a popup instead of redirecting ---
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('contactSubmitBtn');
    const toast = document.getElementById('toast');
    let toastTimer = null;

    function showToast(message, type) {
      toast.textContent = message;
      toast.className = 'toast show ' + type;
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => {
        toast.classList.remove('show');
      }, 5000);
    }

    if (contactForm) {
      contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const originalLabel = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="btn-label">Sending…</span>';

        try {
          const formData = new FormData(contactForm);
          const res = await fetch(contactForm.action, {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
          });

          const data = await res.json();

          if (data.success) {
            showToast(data.message || "Message sent successfully.", 'success');
            contactForm.reset();
          } else {
            const errText = (data.errors && data.errors.length)
              ? data.errors.join(' ')
              : (data.message || "Something went wrong. Please try again.");
            showToast(errText, 'error');
          }
        } catch (err) {
          showToast("Could not reach the server. Please try again.", 'error');
        } finally {
          submitBtn.disabled = false;
          submitBtn.innerHTML = originalLabel;
        }
      });
    }
  </script>
</body>

</html>