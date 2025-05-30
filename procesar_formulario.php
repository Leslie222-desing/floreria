<?php
$errores = [];
$exito = "";

// Validación
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
  <title>Respuesta</title>
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

<?php if (!empty($errores)): ?>
  <div class="mensaje error" id="msg">
    <?php foreach ($errores as $e) echo "<p>$e</p>"; ?>
  </div>
<?php elseif (!empty($exito)): ?>
  <div class="mensaje success" id="msg">
    <p><?php echo $exito; ?></p>
  </div>
<?php endif; ?>

<a href="index.php">Volver al formulario</a>

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
