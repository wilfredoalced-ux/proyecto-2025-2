<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estación Espacial OrbitaX</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #0b0c10;
      color: #c5c6c7;
    }

    header {
      background: linear-gradient(to right, #1f2833, #0b0c10);
      padding: 40px 20px;
      text-align: center;
      color: #66fcf1;
    }

    nav {
      background-color: #1f2833;
      display: flex;
      justify-content: center;
      padding: 10px;
    }

    nav a {
      color: #66fcf1;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }

    nav a:hover {
      color: #45a29e;
    }

    main {
      padding: 20px;
      max-width: 1000px;
      margin: auto;
    }

    section {
      margin-bottom: 40px;
    }

    h2 {
      color: #66fcf1;
    }

    .modulo {
      background-color: #1f2833;
      padding: 20px;
      border-radius: 10px;
      margin-top: 10px;
      box-shadow: 0 0 10px rgba(102, 252, 241, 0.2);
    }

    footer {
      background-color: #0b0c10;
      color: #45a29e;
      text-align: center;
      padding: 20px;
      font-size: 14px;
    }

    .imagen-estacion {
      width: 100%;
      border-radius: 10px;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Estación Espacial OrbitaX</h1>
    <p>Explorando el futuro desde la órbita terrestre</p>
  </header>

  <nav>
    <a href="#about">La Estación</a>
    <a href="#modulos">Módulos</a>
    <a href="#contacto">Contacto</a>
  </nav>

  <main>
    <section id="about">
      <h2>¿Qué es OrbitaX?</h2>
      <div class="modulo">
        <p>OrbitaX es una estación espacial avanzada diseñada para la investigación científica en microgravedad, la observación del espacio profundo y la cooperación internacional en la exploración espacial.</p>
        <img src="https://via.placeholder.com/800x300?text=Estaci%C3%B3n+Espacial" alt="Estación Espacial" class="imagen-estacion">
      </div>
    </section>

    <section id="modulos">
      <h2>Módulos Principales</h2>

      <div class="modulo">
        <h3>Módulo de Investigación</h3>
        <p>Equipado con laboratorios de física, biología y tecnología para experimentos en gravedad cero.</p>
      </div>

      <div class="modulo">
        <h3>Módulo de Vida</h3>
        <p>Donde los astronautas duermen, comen y se comunican con la Tierra.</p>
      </div>

      <div class="modulo">
        <h3>Módulo de Energía</h3>
        <p>Plataformas solares de última generación que proveen energía a toda la estación.</p>
      </div>
    </section>

    <section id="contacto">
      <h2>Contacto</h2>
      <div class="modulo">
        <p>¿Tienes preguntas sobre la misión OrbitaX o quieres colaborar con nosotros?</p>
        <p>Email: <a href="mailto:info@orbitax.space" style="color:#66fcf1;">info@orbitax.space</a></p>
      </div>
    </section>
  </main>

  <footer>
    &copy; 2025 Estación Espacial OrbitaX. Proyecto ficticio para fines educativos.
  </footer>

</body>
</html>
