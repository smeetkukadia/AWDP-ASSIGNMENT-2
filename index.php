<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Smeet Boii — developer portfolio showcasing skills, projects, experience and contact information.">
  <meta name="author" content="Smeet Boii">
  <meta name="theme-color" content="#080b14">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">
  <title>Smeet Boii | Developer Portfolio</title>
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
        <div><p class="eyebrow">GET TO KNOW ME</p><h2>About <strong>Me</strong></h2></div>
      </div>
      <div class="about-grid">
        <div class="about-card glass">
          <div class="avatar">SK</div>
          <div>
            <h3>A self-taught developer</h3>
            <p>I like turning ideas into working interfaces, experimenting with code and understanding systems by building and taking them apart.</p>
          </div>
        </div>
        <div class="about-copy">
          <p>My portfolio is a growing collection of things I have learned, built and explored. I care about simple interfaces, readable code and practical solutions.</p>
          <p>Outside individual projects, I am interested in cybersecurity, Linux, programming and the technologies behind the web.</p>
          <div class="mini-list">
            <span>⌁ Curious by nature</span><span>⌁ Learning by doing</span><span>⌁ Focused on improvement</span>
          </div>
        </div>
      </div>
    </section>

    <section id="skills" class="section content-section">
      <div class="section-heading">
        <span>02</span>
        <div><p class="eyebrow">WHAT I WORK WITH</p><h2>Skills & <strong>Tools</strong></h2></div>
      </div>
      <div class="skills-grid">
        <article class="skill-card glass"><div class="skill-icon">&lt;/&gt;</div><h3>Frontend</h3><p>Building responsive pages with structure, styling and interactive behaviour.</p><div class="tags"><span>HTML5</span><span>CSS3</span><span>JavaScript</span></div></article>
        <article class="skill-card glass"><div class="skill-icon">PY</div><h3>Programming</h3><p>Writing practical programs and exploring programming concepts through projects.</p><div class="tags"><span>Python</span><span>PHP</span><span>Logic</span></div></article>
        <article class="skill-card glass"><div class="skill-icon">⌘</div><h3>Development Tools</h3><p>Using developer tools and version control to build, test and manage projects.</p><div class="tags"><span>Git</span><span>GitHub</span><span>VS Code</span></div></article>
        <article class="skill-card glass"><div class="skill-icon">LX</div><h3>Systems & Security</h3><p>Exploring Linux environments, networking and cybersecurity fundamentals.</p><div class="tags"><span>Linux</span><span>Networking</span><span>Cybersecurity</span></div></article>
      </div>
    </section>

    <section id="projects" class="section content-section">
      <div class="section-heading">
        <span>03</span>
        <div><p class="eyebrow">SELECTED WORK</p><h2>Featured <strong>Projects</strong></h2></div>
      </div>
      <div class="projects-grid">
        <article class="project-card featured glass">
          <div class="project-number">01</div>
          <div class="project-icon">BANK</div>
          <div class="project-content">
            <p class="project-type">ACADEMIC PROJECT</p>
            <h3>Banking Application</h3>
            <p>A centralized banking platform concept covering login, account management, transfers, transaction history, loans, deposits, notifications and security features.</p>
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
            <p>A responsive developer portfolio designed around a dark glassmorphism aesthetic, animated background and clear project sections.</p>
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
            <p>Academic research and documentation exploring cybercrime, malware, attack phases and security awareness.</p>
            <div class="tags"><span>Research</span><span>Security</span><span>Documentation</span></div>
          </div>
          <a class="project-link" href="#contact">Learn more ↗</a>
        </article>
      </div>
    </section>

    <section id="journey" class="section content-section">
      <div class="section-heading">
        <span>04</span>
        <div><p class="eyebrow">MY PROCESS</p><h2>Learning <strong>Journey</strong></h2></div>
      </div>
      <div class="timeline">
        <div class="timeline-item"><span>01</span><div><h3>Explore</h3><p>Start with a question, idea or technology that I want to understand.</p></div></div>
        <div class="timeline-item"><span>02</span><div><h3>Build</h3><p>Turn the idea into a small working project and learn through practice.</p></div></div>
        <div class="timeline-item"><span>03</span><div><h3>Break & Debug</h3><p>Find what fails, understand why it fails and improve the implementation.</p></div></div>
        <div class="timeline-item"><span>04</span><div><h3>Document</h3><p>Organize the result so the next project can start from a better foundation.</p></div></div>
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
        <div><p class="eyebrow">GET IN TOUCH</p><h2>Contact <strong>Me</strong></h2></div>
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
            <div><span>RESPONSE</span><p>I'll get back to you soon.</p></div>
          </div>
        </div>

        <form class="contact-form glass" action="process.php" method="POST">
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
            <textarea id="message" name="message" rows="6" placeholder="Tell me about your project..." maxlength="2000" required></textarea>
          </div>
          <button class="btn primary submit-btn" type="submit">Send message <span>↗</span></button>
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
    <span>© 2026</span>
  </footer>

  <script>
    const revealItems = document.querySelectorAll('.reveal, .content-section, .quote-section, .contact-section');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.12 });
    revealItems.forEach(item => observer.observe(item));
  </script>
</body>
</html>
