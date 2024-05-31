<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Usuario</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.sidebar {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 200px;
  background-color: #007bff;
  color: #fff;
}

.sidebar ul {
  list-style-type: none;
  padding: 0;
}

.sidebar li {
  padding: 10px 0;
}

.sidebar a {
  color: #fff;
  text-decoration: none;
  display: block;
  padding: 10px;
  transition: background-color 0.3s ease;
}

.sidebar a:hover {
  background-color: #0056b3;
}

.content {
  margin-left: 200px; /* Ancho de la barra lateral */
  padding: 20px;
}

  </style>
</head>
<body>
  <div class="sidebar">
    <ul>
      <li><a href="#gestionar-usuarios">Gestionar Usuarios</a></li>
      <li><a href="#gestionar-inventario">Gestionar Inventario</a></li>
      <li><a href="#gestionar-citas">Gestionar Citas</a></li>
    </ul>
  </div>
  <div class="content">
    <!-- Contenido de la página -->
    <button type="button"> <a href="registro">añadir nuevo</a></button>
  </div>
</body>
</html>
