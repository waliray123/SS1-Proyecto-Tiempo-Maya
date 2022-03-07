<?php session_start(); ?>
<?php 
$conn = include "conexion/conexion.php";

if(isset($_GET['fecha'])){
$fecha_consultar = $_GET['fecha'];
}else{
date_default_timezone_set('US/Central');  
$fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual." ". strval($energia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">
            <br><br><br>
                <div id='formulario'>
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>" >
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>
                </div>
                <?php
                if(isset($haab)){
                    $palabraHaab = preg_replace('/[0-9 ]+/', '', $haab);                    
                    $palabraCholquij = preg_replace('/[0-9 ]+/', '', $cholquij);
                    
                }
                ?>
                <br>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="card mb-3 border-dark text-center " >
                                <div class="card-header" style="background-color: #cebebc;">
                                    <h2>Calendario Haab</h2>
                                </div>
                                <div class="card-body" style="background-color: #3f4042;">
                                    <img width="200" height="200" src="imgs/uinal/<?php echo isset($palabraHaab) ? $palabraHaab : ''; ?>.png">                                            
                                    <h4>Fecha</h4>
                                    <h5><?php echo isset($haab) ? $haab : ''; ?></h5>
                                    <button type="button" class="btn btn-success">Mas Info</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3 border-dark text-center " >
                                <div class="card-header" style="background-color: #cebebc;">
                                    <h2>Calendario Haab</h2>
                                </div>
                                <div class="card-body" style="background-color: #3f4042;">
                                <img width="200" height="200" src="imgs/nahual/<?php echo isset($palabraCholquij) ? $palabraCholquij : ''; ?>.png">
                                    <h4>Fecha</h4>
                                    <h5><?php echo isset($cholquij) ? $cholquij : ''; ?></h5>
                                    <button type="button" class="btn btn-success">Mas Info</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <th scope="row">Cuenta Larga</th>
                                    <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                </div>

            </div>
    </div>
    </section>
    </div>

    <br><br><br><br><br>
    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>