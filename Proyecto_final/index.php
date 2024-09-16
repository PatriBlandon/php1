<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css" media="screen,projection"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/home.jpg" id="vidFondo" autoplay loop muted></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
    </div>
    <div class="colFiltros">
      <form action="buscador.php" method="post" id="formulario">
          <div class="filtrosContenido">
              <div class="tituloFiltros">
              <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">
            <label for="selectCiudad">Ciudad:</label>
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
              <?php foreach ($ciudades as $ciudad): ?>
                <option value="<?php echo htmlspecialchars($ciudad); ?>"><?php echo htmlspecialchars($ciudad); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <label for="selectTipo">Tipo:</label>
            <select name="tipo" id="selectTipo">
              <option value="" selected>Elige un tipo</option>
              <?php foreach ($tipos as $tipo): ?>
                  <option value="<?php echo htmlspecialchars($tipo); ?>"><?php echo htmlspecialchars($tipo); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
            <input type="submit" name="todos" class="btn white" value="Mostrar Todos" id="mostrarTodos">
          </div>
      </form>
        </div>
    </div>

    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <div class="divider"></div>
        <?php if (!empty($resultados)): ?>
            <ul>
                <?php foreach ($resultados as $propiedad): ?>
                  <img src="<?php echo htmlspecialchars($propiedad['imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($propiedad['direccion']); ?>" style="width: 50%; height: auto; margin-right: 15px; border radius: 3px;">
                  <li>
                        <strong>Dirección:</strong> <?php echo htmlspecialchars($propiedad['direccion']); ?><br>
                        <strong>Ciudad:</strong> <?php echo htmlspecialchars($propiedad['ciudad']); ?><br>
                        <strong>Teléfono:</strong> <?php echo htmlspecialchars($propiedad['telefono']); ?><br>
                        <strong>Código postal:</strong> <?php echo htmlspecialchars($propiedad['codigo_postal']); ?><br>
                        <strong>Tipo:</strong> <?php echo htmlspecialchars($propiedad['tipo']); ?><br>
                        <strong>Precio:</strong> $<?php echo number_format((float)$propiedad['precio'], 2); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>