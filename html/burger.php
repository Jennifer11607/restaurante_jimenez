

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jersey+25&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Restaurante BurguerGirl</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

body {
    background-image: url('/restaurante_jimenez/images/burger.jpg');
   background-size: cover;
   background-position: center center;
   height: calc(100vh - 80px);
   font-family: "Nunito", sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;

}

header {
    
    color: white;
    padding: 20px;
    width: 100%;
}

header h1 {
    margin: 0;
    font-size: 2.5em;
    font-family: "Nunito", sans-serif;
}

header p {
    margin: 10px 0 0;
    font-size: 1.2em;
    font-family: "Nunito", sans-serif;
}

main {
    max-width: 800px;
    margin: 20px;
    padding: 20px;
    
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.todo{
    position: absolute;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%);


    border-radius: 10px;
    font-family: "Nunito", sans-serif;
}

.description {
    margin-bottom: 20px;
}

.description h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

.description p {
    font-size: 1.2em;
}

.buttons {
    margin-bottom: 20px;
}

.buttons h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

button {
    padding: 10px 20px;
    margin: 5px;
    font-size: 1em;
    color: white;
    background-color: #ff6347;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #e5533d;
}

.social-media {
    margin-bottom: 20px;
}

.social-media h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
}

.social-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.social-button {
    padding: 10px 20px;
    font-size: 1em;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.social-button.facebook {
    background-color: #3b5998;
}

.social-button.facebook:hover {
    background-color: #2d4373;
}

.social-button.twitter {
    background-color: #1da1f2;
}

social-button.twitter:hover {
    background-color: #0c85d0;
}

.social-button.instagram {
    background-color: #e1306c;
}

.social-button.instagram:hover {
    background-color: #b92557;
}

footer {
    background-color: #ff6347;
    color: white;
    padding: 10px;
    width: 100%;
    position: fixed;
    bottom: 0;
    text-align: center;
}

h1 {
            color: white;
            transition: all 0.3s ease;
            font-family: fantasy;
            text-align: right;
            margin:auto;
        }
        h1:hover {
            color: orange;
            font-size: 2.5rem; /* Aumenta el tamaño de la fuente al pasar el mouse */
        }
        h2 {
            color: white;
            transition: all 0.3s ease;
            font-family: "Nunito", sans-serif;
        }
        h2:hover {
            color: orange;
            font-size: 2.5rem; /* Aumenta el tamaño de la fuente al pasar el mouse */
        }

        p {
            font-family: "Nunito", sans-serif;
            color: white;
            text-align: right;
        }
        .parrafo{
            text-align: center;
        }

        button {
            color: white;
            transition: all 0.3s ease;
            font-family: "Nunito", sans-serif;
            text-align: right;
            margin:auto;
        }
        button:hover {
            color: orange;
            font-size: 2.5rem; /* Aumenta el tamaño de la fuente al pasar el mouse */
        }
</style>
<body>

    <header>
        <h1>Bienvenido a Restaurante BurgesGirl</h1>
        <p>Deliciosas Hamburguesas, excelente ambiente y servicio de primera</p>
    </header>
    <main class="todo">
        <section class="description">
            <h2>Sobre Nosotros</h2>
            <p class="parrafo">En Restaurante El Sabor, nos dedicamos a ofrecer la mejor experiencia culinaria con ingredientes frescos y recetas tradicionales. ¡Visítanos y descubre nuestro menú exquisito!</p>
        </section>
        <section class="buttons">
            <h2>Explora Nuestra Página</h2>
            <button onclick="window.location.href='/restaurante_jimenez/vistas/clientes/index.php'">Clientes</button>
            <button onclick="window.location.href='/restaurante_jimenez/vistas/mesa/index.php'">Mesa</button>
            <button onclick="window.location.href='/restaurante_jimenez/vistas/reservaciones/index.php'">Reservaciones</button>
            <button onclick="window.location.href='/restaurante_jimenez/html/usuario.php'">Registrarse</button><br>
            <button onclick="window.location.href='/restaurante_jimenez/vistas/detalles/index.php'">ver Reservacion</button>


        </section>
        <section class="social-media">
            <h2>Síguenos en Redes Sociales</h2>
            <div class="social-buttons">
                <a href="https://www.facebook.com" target="_blank" class="social-button facebook">Facebook</a>
                <a href="https://www.twitter.com" target="_blank" class="social-button twitter">Twitter</a>
                <a href="https://www.instagram.com" target="_blank" class="social-button instagram">Instagram</a>
            </div>
        </section>
    </main>
    <footer>
        <p class="parrafo">&copy; 2024 Restaurante El Sabor. Todos los derechos reservados Jennifer Jimenez.</p>
    </footer>
</body>
</html>
