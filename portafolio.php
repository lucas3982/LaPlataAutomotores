<?php
include("admin/bd.php");

// Obtener el ID de la unidad desde la URL
$id_unidad = isset($_GET['codigo']) ? $_GET['codigo'] : null;

// Consulta para obtener las imágenes de la unidad desde tb_portafolio
$sentencia = $conexion->prepare("SELECT * FROM tb_portafolio WHERE id_unidad = :id_unidad");
$sentencia->bindParam(":id_unidad", $id_unidad);
$sentencia->execute();
$imagenes_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    

    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1a529e2a65.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <title>La Plata Automotores</title>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@700&family=Edu+SA+Beginner:wght@500&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@700&family=Edu+SA+Beginner:wght@500&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Pompiere&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">

  <!--swiper css-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    
</head>
<body>

  <!--boton whatsapp-->

  <div class="container-boton">
    <a href="https://wa.me/+5492212280828?text=Quiero%20consultar%20por%20un%20vehiculo." target="_blank">
        <img class="boton" src="img/whatsapp-873316_640.webp" alt="">
    </a>
</div>

<!--boton whatsapp-->

<!-- Section unidades start -->
<div class="title1">
<?php foreach ($imagenes_portafolio as $imagen) { ?>
  <h2><?php echo $imagen['Descripcion'];?></h2>
</div>
<?php }?>

<!--styles -->
<style>
  html,
  body {
    position: relative;
    height: 100%;
  }

  body {
    background: #2c2c2c;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #000;
    margin: 0;
    padding: 0;
  }

  .title1 h2{
    font-size: 50px;
    font-weight: normal;
    color: white;
    margin-bottom: 10px;
    text-align: center;
    margin-top: 30px;
    padding: 20px 0;
}

  .swiper {
    width: 100%;
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .swiper-slide {
    background-position: center;
    background-size: cover;
    width: 400px;
    height: 400px;
  }

  .swiper-slide img {
    display: block;
    width: 120%;
  }

  /* Estilos para la sección de descripción del vehículo */
.descripcion-vehiculo {
  max-width: 1200px;
  margin: 20px auto;
  padding: 20px;
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.descripcion-vehiculo h2 {
  color: #333;
  margin-top: 5px;
}

.descripcion-vehiculo p {
  color: #555;
}

/* Estilos para el botón de volver */
/* Estilos para el botón de volver */
.button-link {
  display: inline-block;
  margin: 20px 10px;
  padding: 10px 20px;
  background-color: #007bff; /* Color de fondo del botón */
  color: #fff; /* Color del texto del botón */
  text-decoration: none; /* Quita la subrayado del enlace */
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease; /* Agrega una transición suave al color de fondo */
 
}

.button-link:hover {
  background-color: #0056b3; /* Cambia el color de fondo al pasar el ratón por encima */
}
</style>


<body>
<!-- Swiper -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
  <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img1']; ?>" />
      </div>
    <?php } ?>
    <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img2']; ?>" />
      </div>
    <?php } ?>
    <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img3']; ?>" />
      </div>
    <?php } ?>
    <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img4']; ?>" />
      </div>
    <?php } ?>
    <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img5']; ?>" />
      </div>
    <?php } ?>
    <?php foreach ($imagenes_portafolio as $imagen) { ?>
      <div class="swiper-slide">
        <img src="img/<?php echo $imagen['img6']; ?>" />
      </div>
    <?php } ?>
    
  </div>
  <div class="swiper-pagination"></div>
</div>

<!-- Botón de Volver -->
<div style="text-align: center;">
<a href="index.php" class="button-link" onclick="volver()">Volver</a>
</div>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
      rotate: 100,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>


    <script src="https://kit.fontawesome.com/1a529e2a65.js" crossorigin="anonymous"></script>
<script src="script.js"></script>

</body>
</html>