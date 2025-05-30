<?php
$errores = [];
$exito = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim(htmlspecialchars($_POST["nombre"]));
    $email = trim(htmlspecialchars($_POST["email"]));
    $mensaje = trim(htmlspecialchars($_POST["mensaje"]));

    if (empty($nombre) || strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo electrónico inválido.";
    }

    if (strlen($mensaje) < 10) {
        $errores[] = "El mensaje debe tener al menos 10 caracteres.";
    }

    if (empty($errores)) {
        $exito = "¡Formulario enviado correctamente!";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Flores Online</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .mensaje {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 1em 1.5em;
      border-radius: 10px;
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      color: white;
      animation: slideFade 0.5s ease forwards;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      z-index: 9999;
    }

    .error { background-color: #e53935; }
    .success { background-color: #43a047; }

    @keyframes slideFade {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<!-- ✅ Mensajes dinámicos en la misma página -->
<?php if (!empty($errores)): ?>
  <div class="mensaje error" id="msg">
    <?php foreach ($errores as $e) echo "<p>$e</p>"; ?>
  </div>
<?php elseif (!empty($exito)): ?>
  <div class="mensaje success" id="msg">
    <p><?php echo $exito; ?></p>
  </div>
<?php endif; ?>

<!-- Tu contenido normal (como ya lo tenías) -->
<header>
   <h1>Tubicitas</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="Flores.html">Flores</a>
      <a href="Regalos.html">Regalos</a>
      <a href="Cartas.html">Cartas</a>
      <a href="Nosotros.html">Nosotros</a>
    </nav>
  </header>

<div class="banner">
  <div class="flowers-container" id="flowers"></div>
  <h2>Envía flores con amor</h2>
</div>



  <section class="categories">
    <div class="category">
      <a href="Flores.html"><img src="img/rosas.jpg" alt="Rosas" /></a>
      <h3>Rosas Rojas</h3>
    </div>
    <div class="category">
      <a href="Flores.html"><img src="img/tulipanes.jpg" alt="Tulipanes" /></a>
      <h3>Tulipanes</h3>
    </div>
    <div class="category">
      <a href="Flores.html"><img src="img/girasoles.jpg" alt="Girasoles" /></a>
      <h3>Girasoles</h3>
    </div>
 
  </section>

   <section class="categories">
    <div class="category">
      <a href="Regalos.html"><img src="img/R1.jpg" alt="Rosas" /></a>
      <h3>Cajas</h3>
    </div>
    <div class="category">
      <a href="Regalos.html"><img src="img/R2.jpg" alt="Tulipanes" /></a>
      <h3>Ramos</h3>
    </div>
    <div class="category">
      <a href="Regalos.html"><img src="img/R3.jpg" alt="Girasoles" /></a>
      <h3>Peluches</h3>
    </div>
 
  </section>

   </section>

   <section class="categories">
    <div class="category">
      <a href="Cartas.html"><img src="img/a.jpg" alt="Rosas" /></a>
      <h3>Cartas de Amor</h3>
    </div>
    <div class="category">
      <a href="Cartas.html"><img src="img/b.jpg" alt="Tulipanes" /></a>
      <h3>Cartas de Cumpleaños</h3>
    </div>

 
  </section>
</header>

<!-- Formulario -->
<footer>
  <section class="contact-section" id="contacto">
    <h2>Contáctanos</h2>
    <form method="POST" action="index.php">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

      <button type="submit">Enviar</button>
    </form>
  </section>

  &copy; 2025 Flores Online. Todos los derechos reservados.
</footer>

<script>
  // Ocultar el mensaje después de 4 segundos
  setTimeout(() => {
    const msg = document.getElementById('msg');
    if (msg) {
      msg.style.transition = "opacity 0.5s ease";
      msg.style.opacity = 0;
      setTimeout(() => msg.remove(), 500);
    }
  }, 4000);
</script>

</body>
</html>
