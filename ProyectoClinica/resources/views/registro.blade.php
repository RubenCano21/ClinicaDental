<!DOCTYPE html>
<html lang="es">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Registro de Persona</title>
      <link rel="stylesheet" href="styles.css">
  </head>

  <body>
      <div class="container">
          <h2>Registro de Persona</h2>

          <form action="{{ route('registro.store') }}" method="post">
              @csrf
              <div class="input-group">
                  <label for="ci">CI</label>
                  <input type="text" id="ci" name="ci" required>
              </div>
              <div class="input-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" id="nombre" name="nombre" required>
              </div>
              <div class="input-group">
                  <label for="apellido">Apellido:</label>
                  <input type="text" id="apellido" name="apellido" required>
              </div>
              <div class="input-group">
                  <label for="email">Correo Electrónico:</label>
                  <input type="email" id="email" name="email" required>
              </div>
              <div class="input-group">
                  <label for="sexo">Sexo:</label>
                  <select id="sexo" name="sexo" required>
                      <option value="masculino">Masculino</option>
                      <option value="femenino">Femenino</option>
                  </select>
              </div>
              <div class="input-group">
                  <label for="direccion">Dirección:</label>
                  <input type="text" id="direccion" name="direccion" required>
              </div>
              <div class="input-group">
                  <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                  <input type="date" id="fecha-nacimiento" name="fecha_nacimiento" required>
              </div>
              <button type="submit">Registrar</button>
          </form>
      </div>
  </body>

</html>
