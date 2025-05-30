/*estilo de index*/

  document.getElementById("contactForm").addEventListener("submit", function (event) {
    const nombre = document.getElementById("nombre");
    const email = document.getElementById("email");
    const mensaje = document.getElementById("mensaje");

    let errores = [];

    if (!nombre.value.trim().match(/^[a-zA-Z\s]{3,}$/)) {
      errores.push("Nombre inválido. Usa solo letras y al menos 3 caracteres.");
    }

    if (!email.value.trim().match(/^[\w.-]+@[\w.-]+\.\w{2,}$/)) {
      errores.push("Correo electrónico inválido.");
    }

    if (mensaje.value.trim().length < 10) {
      errores.push("El mensaje debe tener al menos 10 caracteres.");
    }

    if (errores.length > 0) {
      event.preventDefault();
      alert(errores.join("\n"));
    }
  });



// Seleccionamos el contenedor donde irán las flores

const flowersContainer = document.getElementById("flowers");



// Función para crear una flor animada y agregarla al contenedor
function createFlower() {
  const flower = document.createElement("div");
  flower.classList.add("flower");

  // Posición horizontal aleatoria (usamos viewport width)
  flower.style.left = Math.random() * 100 + "vw";

  // Duración aleatoria para que no caigan todas igual
  flower.style.animationDuration = (5 + Math.random() * 5) + "s";

  // Tamaño aleatorio para variar un poco (opcional)
  const size = 30 + Math.random() * 20;
  flower.style.width = size + "px";
  flower.style.height = size + "px";

  flowersContainer.appendChild(flower);

  // Después de que termine la animación la eliminamos para no saturar el DOM
  setTimeout(() => {
    flower.remove();
  }, 10000);
}

// Crear una flor cada 400 milisegundos
setInterval(createFlower, 400);

/*estilo de apartados
-
-
-
-
*/