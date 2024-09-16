<?php
// Cargar datos desde el archivo JSON
$data = json_decode(file_get_contents('data-1.json'), true);

// Obtener todas las ciudades y tipos de vivienda
$ciudades = array_unique(array_column($data, 'ciudad'));
$tipos = array_unique(array_column($data, 'tipo'));

// Inicializar resultados
$resultados = [];

// Mostrar todos
if (isset($_POST['todos'])) {
    $resultados = $data;
} else {
    // Filtrar resultados según los parámetros de búsqueda
    $ciudad = $_POST['ciudad'] ?? '';
    $tipo = $_POST['tipo'] ?? '';
    $rangoPrecio = $_POST['precio'] ?? '';

    // Separar rango de precios
    if ($rangoPrecio) {
        list($min_price, $max_price) = explode(';', $rangoPrecio);
    } else {
        $min_price = 0;
        $max_price = PHP_INT_MAX;
    }

    foreach ($data as $propiedad) {
        if (
            ($ciudad === '' || $propiedad['ciudad'] === $ciudad) &&
            ($tipo === '' || $propiedad['tipo'] === $tipo) &&
            ($propiedad['precio'] >= $min_price && $propiedad['precio'] <= $max_price)
        ) {
            $resultados[] = $propiedad;
        }
    }
}

// Incluir el archivo HTML
include 'index.php';