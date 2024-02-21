<!--creao las referencia para editar, crear y demas infomracion del portafolio y unidades-->
<?php
$url_base="http://localhost:8080/LaPlataAutomotores/admin/";//esto lo tengo que cambiar al hosting que se vaya a subir, esta es la url de la aplicacion
?>
<!--creao las referencia para editar, crear y demas infomracion del portafolio y unidades-->

<!---->

<!--https://www.laplataautomotores.com.ar/admin/   http://localhost:8080/LaPlataAutomotores/admin/-->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del sitio web</title>

<!--bootstrap css-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
<!--menu de navegacion-->
<header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a href="#" class="nav-item nav-link active" aria-current="page">Administrador</a>
            <a href="<?php echo $url_base?>secciones/unidades/" class="nav-item nav-link active" aria-current="page">Unidades</a>
            <a href="<?php echo $url_base?>secciones/portafolio/" class="nav-item nav-link active" aria-current="page">Portafolio</a>
            <a href="<?php echo $url_base?>secciones/usuarios/" class="nav-item nav-link active" aria-current="page">Usuarios</a>
            <a href="<?php echo $url_base?>login.php" class="nav-item nav-link active" aria-current="page">Cerrar Sesión</a>

        </div>
   

    </nav>
</header>
<!--menu de navegacion-->

<main class="container">

<br>