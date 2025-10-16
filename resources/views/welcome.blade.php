<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>🚀 STARSHIP DASHBOARD</title>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<style>
:root{
  --bg:#000010;
  --panel:#0a0a20;
  --neon:#00fffc;
  --neon-alt:#ff00ff;
  --accent:#00c2ff;
  --muted:#555;
  --glow:0 0 18px #00fffc,0 0 30px #00fffc;
}

html,body{height:100%;margin:0;font-family:'Orbitron', monospace;background:var(--bg);color:var(--neon);overflow-x:hidden;}
#spaceCanvas{position:fixed;top:0;left:0;width:100%;height:100%;z-index:0;pointer-events:none;}
.main{position:relative; z-index:5; max-width:1400px;margin:0 auto;padding:40px 16px;}
header.hdr{display:flex;justify-content:space-between;align-items:center;padding:24px 32px;margin-bottom:40px;background: rgba(0,0,0,0.3);border-radius:20px;box-shadow:0 0 40px rgba(0,255,204,0.3);}
.logo{display:flex;align-items:center;gap:14px;}
.logo .badge{width:64px;height:64px;border-radius:14px;display:flex;align-items:center;justify-content:center;background:linear-gradient(90deg,var(--neon),var(--neon-alt));color:#000;font-weight:900;font-size:28px;box-shadow:var(--glow);}
.title{font-size:28px;color:var(--neon-alt);font-weight:900;letter-spacing:0.1em;text-shadow:var(--glow);}
.grid-cards{display:grid;grid-template-columns:1fr;gap:28px;}
@media(min-width:640px){.grid-cards{grid-template-columns:repeat(2,1fr);}}
@media(min-width:1024px){.grid-cards{grid-template-columns:repeat(4,1fr);}}
.card{background: rgba(0,0,20,0.5);border:1px solid rgba(0,255,204,0.15);padding:28px;border-radius:24px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;transition: all 0.4s ease;box-shadow:0 0 20px rgba(0,255,204,0.2),0 0 60px rgba(0,255,204,0.1);cursor:pointer;position:relative;overflow:hidden;}
.card:hover{transform:scale(1.12) rotateZ(-1deg);box-shadow:0 0 40px rgba(0,255,204,0.6),0 0 80px rgba(255,0,255,0.5);}
.card .icon{font-size:60px;margin-bottom:14px;filter: drop-shadow(0 8px 22px rgba(0,255,204,0.5));}
.card h3{font-size:24px;font-weight:900;color:var(--neon);margin:0;letter-spacing:0.05em;text-shadow:var(--glow);}
.card p{font-size:14px;color:var(--muted);margin:4px 0 0 0;}
.counter{position:absolute;top:12px;right:12px;background:var(--neon-alt);color:#000;font-weight:700;font-size:12px;padding:3px 7px;border-radius:8px;box-shadow:var(--glow);}
.btn-ghost{padding:14px 24px;border-radius:999px;border:1px solid rgba(0,255,204,0.25);color:var(--neon-alt);font-weight:700;text-decoration:none;transition: all 0.2s ease;}
.btn-ghost:hover{transform: translateY(-3px) scale(1.05);box-shadow:0 0 20px rgba(0,255,204,0.5);}
footer{text-align:center;color:var(--muted);margin-top:32px;font-size:13px;}
.typing{border-right:.15em solid var(--neon);white-space:nowrap;overflow:hidden;}
</style>
</head>
<body>

<canvas id="spaceCanvas"></canvas>

<div class="main">

  <!-- Header -->
  <header class="hdr">
    <div class="logo">
      <div class="badge">🚀</div>
      <div class="title typing" id="typingTitle">STARSHIP DASHBOARD</div>
    </div>
    <a href="{{ route('estudiantes.index') }}" class="btn-ghost">🎓 Estudiantes</a>
  </header>

  <!-- Grid tarjetas -->
  <section class="grid-cards">
    <a href="{{ route('bienvenidos1') }}" class="card" onmouseover="playSound()">
      <div class="icon">👋</div>
      <h3>Bienvenido</h3>
      <p>Página de bienvenida</p>
      <div class="counter" id="c1">12</div>
    </a>
    <a href="{{ route('proyecto1') }}" class="card" onmouseover="playSound()">
      <div class="icon">📁</div>
      <h3>Proyecto 1</h3>
      <p>Detalles del Proyecto 1</p>
      <div class="counter" id="c2">8</div>
    </a>
    <a href="{{ route('proyecto2') }}" class="card" onmouseover="playSound()">
      <div class="icon">🗂️</div>
      <h3>Proyecto 2</h3>
      <p>Detalles del Proyecto 2</p>
      <div class="counter" id="c3">15</div>
    </a>
    <a href="{{ route('estudiantes.index') }}" class="card" onmouseover="playSound()">
      <div class="icon">🎓</div>
      <h3>Estudiantes</h3>
      <p>Gestión de estudiantes</p>
      <div class="counter" id="c4">{{ count($estudiantes ?? []) }}</div>
    </a>
  </section>

  <!-- Footer -->
  <footer>
    <p>© STARSHIP PANEL · {{ date('Y') }} | Futurismo Espacial Hacker</p>
  </footer>
</div>

<script>
// === Space stars effect ===
const canvas=document.getElementById('spaceCanvas');const ctx=canvas.getContext('2d');let stars=[],width,height;
function resize(){canvas.width=window.innerWidth;canvas.height=window.innerHeight;width=canvas.width;height=canvas.height;stars=[];for(let i=0;i<300;i++){stars.push({x:Math.random()*width,y:Math.random()*height,r:Math.random()*1.5+0.5,speed:Math.random()*0.7+0.2})}}
window.addEventListener('resize',resize);resize();
function drawStars(){ctx.fillStyle='black';ctx.fillRect(0,0,width,height);ctx.fillStyle='#0ff';stars.forEach(s=>{ctx.beginPath();ctx.arc(s.x,s.y,s.r,0,Math.PI*2);ctx.fill();s.y-=s.speed;if(s.y<0)s.y=height;});requestAnimationFrame(drawStars);}
drawStars();

// === Typing effect ===
const titleTxt="STARSHIP DASHBOARD";let i=0;const el=document.getElementById("typingTitle");el.textContent="";
function typingEffect(){if(i<titleTxt.length){el.textContent+=titleTxt.charAt(i);i++;setTimeout(typingEffect,60);}}
typingEffect();

// === Neon hover sound ===
const audio=new Audio("https://www.soundjay.com/buttons/sounds/button-16.mp3");
function playSound(){audio.currentTime=0; audio.play();}
</script>

</body>
</html>
