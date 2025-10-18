<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Café del Bosque</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f1ee;
        }

        header {
            background-color: #6f4e37;
            color: white;
            text-align: center;
            padding: 30px;
        }

        nav {
            background-color: #3e2f23;
            overflow: hidden;
        }

        nav a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #5c4331;
        }

        main {
            padding: 20px;
        }

        .productos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .producto {
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .producto img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        form {
            max-width: 500px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #6f4e37;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a3d2a;
        }

        footer {
            background-color: #3e2f23;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<header>
    <h1>Café del Bosque</h1>
    <p>El sabor auténtico del café artesanal</p>
</header>

<nav>
    <a href="#">Inicio</a>
    <a href="#">Productos</a>
    <a href="#contacto">Contacto</a>
</nav>

<main>
    <h2 style="text-align: center;">Nuestros Productos</h2>
    <div class="productos">
        <div class="producto">
            <img src="https://via.placeholder.com/200x150?text=Café+Molido" alt="Café Molido">
            <h3>Café Molido 250g</h3>
            <p>$5.000</p>
            <button>Comprar</button>
        </div>
        <div class="producto">
            <img src="https://via.placeholder.com/200x150?text=Café+en+Grano" alt="Café en Grano">
            <h3>Café en Grano 500g</h3>
            <p>$9.000</p>
            <button>Comprar</button>
        </div>
        <div class="producto">
            <img src="https://via.placeholder.com/200x150?text=Café+Orgánico" alt="Café Orgánico">
            <h3>Café Orgánico 1Kg</h3>
            <p>$15.000</p>
            <button>Comprar</button>
        </div>
    </div>

    <h2 id="contacto" style="text-align: center; margin-top: 50px;">Contáctanos</h2>
    <form>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

        <button type="submit">Enviar mensaje</button>
    </form>
</main>

<footer>
    &copy; 2025 Café del Bosque. Todos los derechos reservados.
</footer>

</body>
</html>
