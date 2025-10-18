<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>🚀 STARSHIP DASHBOARD</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Roboto:wght@400;700&display=swap');

  :root {
    --bg: #000010;
    --panel: #0a0a20;
    --neon: #00fffc;
    --neon-alt: #ff00ff;
    --accent: #00c2ff;
    --muted: #555;
    --glow: 0 0 18px #00fffc, 0 0 30px #00fffc;
  }

  html, body {
    height: 100%;
    margin: 0;
    font-family: 'Orbitron', 'Roboto', monospace;
    background: var(--bg);
    color: var(--neon);
    overflow-x: hidden;
  }

  #spaceCanvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
  }

  .main {
    position: relative;
    z-index: 5;
    max-width: 1400px;
    margin: 0 auto;
    padding: 40px 24px 60px;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    box-sizing: border-box;
  }

  header.hdr {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px 32px;
    margin-bottom: 40px;
    background: rgba(0,0,0,0.3);
    border-radius: 20px;
    box-shadow: 0 0 60px rgba(0,255,204,0.3);
    backdrop-filter: saturate(180%) blur(12px);
  }

  .logo {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .logo .badge {
    width: 72px;
    height: 72px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(90deg, var(--neon), var(--neon-alt));
    color: #000;
    font-weight: 900;
    font-size: 36px;
    box-shadow: var(--glow);
    user-select: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .logo .badge:hover {
    transform: rotate(15deg) scale(1.1);
    box-shadow: 0 0 30px rgba(0,255,204,0.7), 0 0 60px rgba(255,0,255,0.6);
  }

  .title {
    font-size: 32px;
    color: var(--neon-alt);
    font-weight: 900;
    letter-spacing: 0.12em;
    text-shadow: var(--glow);
    user-select: none;
  }

  .animated-text {
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    border-right: 0.15em solid var(--neon);
  }

  .animated-text span {
    display: inline-block;
    animation: typing 3s steps(30, end) infinite;
  }

  @keyframes typing {
    0% { width: 0; }
    100% { width: 100%; }
  }

  .btn-ghost {
    padding: 14px 28px;
    border-radius: 999px;
    border: 1.8px solid rgba(0,255,204,0.3);
    color: var(--neon-alt);
    font-weight: 700;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 0 10px rgba(0,255,204,0.15);
    backdrop-filter: saturate(180%) blur(8px);
  }
  .btn-ghost:hover, .btn-ghost:focus {
    transform: translateY(-4px) scale(1.1);
    box-shadow: 0 0 30px rgba(0,255,204,0.7), 0 0 60px rgba(255,0,255,0.6);
    outline: none;
  }

  .grid-cards {
    display: grid;
    grid-template-columns: 1fr;
    gap: 32px;
    margin-bottom: auto;
  }
  @media(min-width: 640px) {
    .grid-cards {
      grid-template-columns: repeat(2, 1fr);
      gap: 36px;
    }
  }
  @media(min-width: 1024px) {
    .grid-cards {
      grid-template-columns: repeat(4, 1fr);
      gap: 40px;
    }
  }

  .card {
    background: linear-gradient(145deg, rgba(0,0,20,0.7), rgba(0,0,30,0.5));
    border: 1.5px solid rgba(0,255,204,0.2);
    padding: 32px 24px 36px;
    border-radius: 28px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
    box-shadow:
      0 0 25px rgba(0,255,204,0.25),
      inset 0 0 18px rgba(0,255,204,0.15);
    cursor: pointer;
    position: relative;
    overflow: hidden;
    user-select: none;
  }
  .card:hover {
    transform: scale(1.15) rotateZ(-1.5deg);
    box-shadow:
      0 0 50px rgba(0,255,204,0.8),
      0 0 90px rgba(255,0,255,0.7),
      inset 0 0 25px rgba(255,0,255,0.4);
    border-color: var(--neon-alt);
    background: linear-gradient(135deg, rgba(0,255,255,0.2), rgba(255,0,255,0.25));
  }

  .card .icon {
    font-size: 72px;
    margin-bottom: 16px;
    filter: drop-shadow(0 10px 30px rgba(0,255,204,0.7));
    transition: filter 0.4s ease, color 0.3s ease;
  }
  .card:hover .icon {
    filter: drop-shadow(0 15px 45px rgba(255,0,255,0.9));
    color: var(--neon-alt);
  }

  .card h3 {
    font-size: 26px;
    font-weight: 900;
    color: var(--neon);
    margin: 0;
    letter-spacing: 0.06em;
    text-shadow: var(--glow);
    user-select: text;
  }

  .card p {
    font-size: 15px;
    color: var(--muted);
    margin: 6px 0 0 0;
    user-select: text;
  }

  .counter {
    position: absolute;
    top: 14px;
    right: 14px;
    background: var(--neon-alt);
    color: #000;
    font-weight: 700;
    font-size: 13px;
    padding: 5px 10px;
    border-radius: 10px;
    box-shadow: var(--glow);
    user-select: none;
  }

  footer {
    text-align: center;
    color: var(--muted);
    margin-top: 40px;
    font-size: 14px;
    user-select: none;
  }

  .blink {
    animation: blink 1.5s infinite;
  }

  @keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
  }
</style>
</head>
<body>

<canvas id="spaceCanvas"></canvas>

<div class="main">

  <!-- Header -->
  <header class="hdr" role="banner">
    <div class="logo" aria-label="Logo y título de la página">
      <div class="badge blink" aria-hidden="true">🚀</div>
      <div class="animated-text" aria-live="polite" aria-atomic="true">
        <span>STARSHIP DASHBOARD</span>
      </div>
    </div>
    <a href="{{ route('estudiantes.index') }}" class="btn-ghost" role="link" aria-label="Ir a la gestión de estudiantes">🎓 Estudiantes</a>
  </header>

  <!-- Grid tarjetas -->
  <section class="grid-cards" aria-label="Navegación principal">
    <a href="{{ route('bienvenidos1') }}" class="card" onmouseover="playSound()" role="link" aria-describedby="desc1" tabindex="0">
      <div class="icon" aria-hidden="true">👋</div>
      <h3>Bienvenido</h3>
      <p id="desc1">Página de bienvenida</p>
      <div class="counter" id="c1">12</div>
    </a>
    <a href="{{ route('proyecto1') }}" class="card" onmouseover="playSound()" role="link" aria-describedby="desc2" tabindex="0">
      <div class="icon" aria-hidden="true">📁</div>
      <h3>Proyecto 1</h3>
      <p id="desc2">Detalles del Proyecto 1</p>
      <div class="counter" id="c2">8</div>
    </a>
    <a href="{{ route('proyecto2') }}" class="card" onmouseover="playSound()" role="link" aria-describedby="desc3" tabindex="0">
      <div class="icon" aria-hidden="true">🗂️</div>
      <h3>Proyecto 2</h3>
      <p id="desc3">Detalles del Proyecto 2</p>
      <div class="counter" id="c3">15</div>
    </a>
    <a href="{{ route('estudiantes.index') }}" class="card" onmouseover="playSound()" role="link" aria-describedby="desc4" tabindex="0">
      <div class="icon" aria-hidden="true">🎓</div>
      <h3>Estudiantes</h3>
      <p id="desc4">Gestión de estudiantes</p>
      <div class="counter" id="c4">{{ count($estudiantes ?? []) }}</div>
    </a>
  </section>

  <!-- Footer -->
  <footer role="contentinfo">
    <p>© STARSHIP PANEL · {{ date('Y') }} | Futurismo Espacial Hacker</p>
  </footer>
</div>

<script>
  // === Space stars effect ===
  const canvas = document.getElementById('spaceCanvas');
  const ctx = canvas.getContext('2d');
  let stars = [], width, height;

  function resize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    width = canvas.width;
    height = canvas.height;
    stars = [];
    for (let i = 0; i < 300; i++) {
      stars.push({
        x: Math.random() * width,
        y: Math.random() * height,
        r: Math.random() * 1.5 + 0.5,
        speed: Math.random() * 0.7 + 0.2
      });
    }
  }
  window.addEventListener('resize', resize);
  resize();

  function drawStars() {
    ctx.clearRect(0, 0, width, height);
    ctx.fillStyle = '#0ff';
    stars.forEach(s => {
      ctx.beginPath();
      ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
      ctx.fill();
      s.y -= s.speed;
      if (s.y < 0) s.y = height;
    });
    requestAnimationFrame(drawStars);
  }
  drawStars();

  // === Neon hover sound ===
  const audio = new Audio("https://www.soundjay.com/buttons/sounds/button-16.mp3");
  function playSound() {
    audio.currentTime = 0;
    audio.play();
  }
</script>

</body>
</html>