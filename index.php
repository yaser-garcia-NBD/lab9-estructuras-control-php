<?php
/*
 * LABORATORIO #9 · Estructuras de control en PHP
 * Sigue el documento del estudiante. Escribe tu código SOLO en las zonas marcadas con TODO.
 * Recuerda: un commit por ejercicio (ej0, ej1, ... css, final).
 */
 
// ---------- PARTE 0 · TUS DATOS ----------
const SEMILLA = 940;
const NOMBRE = "yaser";
const APELLIDO = "garcia";
 
$nombreCompleto = NOMBRE . " " . APELLIDO;
$edad = 8 + (SEMILLA % 70);
$dia = (SEMILLA % 7) + 1;
$mes = (SEMILLA % 12) + 1;
$nota1 = 40 + (SEMILLA % 61);
$nota2 = 40 + ((SEMILLA * 3) % 61);
$nota3 = 40 + ((SEMILLA * 7) % 61);
$monto = 20 + (SEMILLA % 181);
$esMiembro = (SEMILLA % 2) == 0;
$hora = SEMILLA % 24;
$huella = (SEMILLA * 13 + 91) % 1000;
$descuento = SEMILLA * 0.001;
$vacio = null;
 
// ---------- EJERCICIO 1 · Boleto de cine (if / elseif / else) ----------
// TODO 1
 
const PRECIO_NINO = 3.00;
const PRECIO_JOVEN = 4.50;
const PRECIO_ADULTO = 7.00;
const PRECIO_JUBILADO = 3.50;

if ($edad < 12) {
    $categoria = "Niño";
    $precioBase = PRECIO_NINO;
} elseif ($edad < 18) {
    $categoria = "Joven";
    $precioBase = PRECIO_JOVEN;
} elseif ($edad < 60) {
    $categoria = "Adulto";
    $precioBase = PRECIO_ADULTO;
} else {
    $categoria = "Jubilado";
    $precioBase = PRECIO_JUBILADO;
}

$esMiercoles = ($dia === 3);
$precioFinal = $precioBase;

if ($esMiercoles) {
    $precioFinal = $precioBase * 0.50;
}

// ---------- EJERCICIO 2 · Notas (elseif, ternario, &&) ----------
// TODO 2
 
$promedio = ($nota1 + $nota2 + $nota3) / 3;

if ($promedio >= 90) {
    $letra = "A";
} elseif ($promedio >= 80) {
    $letra = "B";
} elseif ($promedio >= 70) {
    $letra = "C";
} elseif ($promedio >= 60) {
    $letra = "D";
} else {
    $letra = "F";
}

$estado = ($promedio >= 70) ? "Aprobado" : "Reprobado";

$cuadroHonor = (
    $promedio >= 90 &&
    $nota1 >= 80 &&
    $nota2 >= 80 &&
    $nota3 >= 80
);

$honorTexto = $cuadroHonor ? "Sí" : "No";

// ---------- EJERCICIO 3 · Día de la semana (switch) ----------
// TODO 3
 
switch ($dia) {
    case 1:
        $nombreDia = "Lunes";
        break;
    case 2:
        $nombreDia = "Martes";
        break;
    case 3:
        $nombreDia = "Miércoles";
        break;
    case 4:
        $nombreDia = "Jueves";
        break;
    case 5:
        $nombreDia = "Viernes";
        break;
    case 6:
        $nombreDia = "Sábado";
        break;
    case 7:
        $nombreDia = "Domingo";
        break;
    default:
        $nombreDia = "Día inválido";
        break;
}

switch ($dia) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        $tipoDia = "Laboral";
        break;
    case 6:
    case 7:
        $tipoDia = "Fin de semana";
        break;
    default:
        $tipoDia = "No válido";
        break;
}

// ---------- EJERCICIO 4 · Mes y estación (match) ----------
// TODO 4
 
$nombreMes = match ($mes) {
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre",
    default => "Mes inválido"
};

$estacion = match ($mes) {
    12, 1, 2, 3, 4 => "Seca",
    5, 6, 7, 8, 9, 10, 11 => "Lluviosa",
    default => "No válida"
};

// ---------- EJERCICIO 5 · Caja de la tienda (reto integrador) ----------
// TODO 5

const ITBMS = 0.07;

if ($monto >= 150) {
    $pct = 15;
} elseif ($monto >= 100) {
    $pct = 10;
} elseif ($monto >= 50) {
    $pct = 5;
} else {
    $pct = 0;
}

if ($esMiembro) {
    $pct += 5;
}

$base = $monto - ($monto * $pct / 100);

$recargoNoche = ($hora >= 22 || $hora < 6);

if ($recargoNoche) {
    $base = $base * 1.03;
}

$total = $base + ($base * ITBMS);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="lab9-huella" content="<?php echo $huella; ?>">
  <title>Lab 9 · Estructuras de control</title>

  <!-- CSS externo -->
  <link rel="stylesheet" href="css/estilos.css">

  <!-- CSS interno: mínimo 2 reglas -->
  <style>
    h2 {
      margin-top: 16px;
    }

    .resultado {
      border: 1px solid #ddd;
    }
  </style>
</head>
<body>
  <header>
    <h1 style="color: #ffffff;">Laboratorio #9 · Estructuras de control</h1>
    <p id="autor">Autor: <?php echo $nombreCompleto; ?></p>
  </header>


  <main id="lab9-garcia">
  

    <section id="ej0">
      <h2>Ejercicio 0 · Tipos de datos</h2>
      <table id="ej0-tipos">
        <thead>
          <tr><th>Variable</th><th>Tipo</th></tr>
        </thead>
        <tbody>
         <tr>
    <td>$nombreCompleto</td>
    <td><?php echo gettype($nombreCompleto); ?></td>
</tr>
<tr>
    <td>$edad</td>
    <td><?php echo gettype($edad); ?></td>
</tr>
<tr>
    <td>$esMiembro</td>
    <td><?php echo gettype($esMiembro); ?></td>
</tr>
<tr>
    <td>$descuento</td>
    <td><?php echo gettype($descuento); ?></td>
</tr>
<tr>
    <td>$vacio</td>
    <td><?php echo gettype($vacio); ?></td>
</tr>
        </tbody>
      </table>
    </section>

    <section id="ej1">
      <h2>Ejercicio 1 · Boleto de cine</h2>
      
<p id="ej1-res">
    Categoría: <?php echo $categoria; ?> |
    Precio final: B/. <?php echo number_format($precioFinal, 2); ?> |
    Miércoles 50%: <?php echo $esMiercoles ? "Sí" : "No"; ?>
</p>

    </section>

    <section id="ej2">
      <h2>Ejercicio 2 · Notas</h2>
      
<p id="ej2-res" class="resultado <?php echo $promedio >= 70 ? 'ok' : 'error'; ?>">
    Promedio: <?php echo number_format($promedio, 2); ?> |
    Letra: <?php echo $letra; ?> |
    Estado: <?php echo $estado; ?> |
    Cuadro de honor: <?php echo $honorTexto; ?>
</p>

    </section>

    <section id="ej3">
      <h2>Ejercicio 3 · Día de la semana</h2>
      
<p id="ej3-res">
    Día: <?php echo $nombreDia; ?> |
    Tipo: <?php echo $tipoDia; ?>
</p>

    </section>

    <section id="ej4">
      <h2>Ejercicio 4 · Mes y estación</h2>
      
<p id="ej4-res">
    Mes: <?php echo $nombreMes; ?> |
    Estación: <?php echo $estacion; ?>
</p>

    </section>

  <section id="ej5">
    <h2>Ejercicio 5 · Caja de la tienda</h2>

    <p id="ej5-monto">
        Monto de compra: B/. <?php echo number_format($monto, 2); ?>
    </p>

    <p id="ej5-descuento">
        Descuento aplicado: <?php echo $pct; ?>%
    </p>

    <p id="ej5-recargo">
        Recargo nocturno: <?php echo $recargoNoche ? "Sí" : "No"; ?>
    </p>

    <p id="ej5-total">
        Total a pagar: B/. <?php echo number_format($total, 2); ?>
    </p>
</section>

  </main>

  <footer id="firma">
    Lab 9 · <?php echo $nombreCompleto; ?> · Semilla <?php echo SEMILLA; ?>
</footer>
</body>
</html>
