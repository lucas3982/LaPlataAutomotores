
<?php
include("admin/bd.php");  //con este me estoy conectando a la base de datos 

//con este selecciono toda la tabla de servicios el asterisco representa los campos(slect*from)seleccioname todos los campos de la tb_unidades
$sentencia=$conexion->prepare("SELECT * FROM `tb_unidades`");
$sentencia->execute();
$lista_unidades=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/1a529e2a65.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <title>La Plata Automotores</title>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@700&family=Edu+SA+Beginner:wght@500&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Dancing+Script:wght@700&family=Edu+SA+Beginner:wght@500&family=Edu+VIC+WA+NT+Beginner:wght@500&family=Gentium+Book+Plus:ital@1&family=Inter:wght@300&family=Open+Sans:ital@0;1&family=Playfair+Display&family=Pompiere&family=Raleway:wght@300&family=Roboto+Mono:wght@300&family=Satisfy&family=Ubuntu&display=swap" rel="stylesheet">

    <!--swiper css-->
    
    
</head>
<body>
<!--boton whatsapp-->

  <div class="container-boton">
    <a href="https://wa.me/+5492212280828?text=Quiero%20consultar%20por%20un%20vehiculo." target="_blank">
        <img class="boton" src="img/whatsapp-873316_640.webp" alt="">
    </a>
</div>

<!--boton whatsapp-->

<!--ir arriba-->
<div class="go-top">
  <span><i class="fas fa-angle-up"></i></span>
</div>

<!--Menu de navegacion -->
<div class="barra-superior">
  <div class="informacion-contacto">
    <p class="direccion">Dirección: Av 32 n° 1066 e/ 16 y 17 La Plata</p>
  </div>
  <div class="informacion-contacto">
    <p class="telefono">Telefono: 221-4247953 // 221-2280828</p>
  </div>

  

  <div class="redes-sociales">
    <a href="https://www.facebook.com/FabianLaPlataAutomotores/" target="_blank"><i class="fab fa-facebook"></i></a>
    <a href="https://www.instagram.com/la_plata_automotores/" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
</div>
<header id="header">



  
    <nav class="menu">
        <img src="img/La Plata Automotores (3).png" alt="">
        <div class="logo-box">          
            <span class="btn-menu"><i class="fas fa-bars"></i></span>
        </div>

        <div class="list-container">
            <ul class="lists">
                <li><a href="#Home" class="seleccionado">Inicio</a></li>
                <li><a href="#Nosotros">Nosotros</a></li>
                <li><a href="#unidades">Unidades</a></li>
                <li><a href="#contacto">Contacto</a></li>                   
            </ul>
            
        </div>
    </nav> 
    
    
 <!-- Imgagen header-->
    <div class="img-header" id="Home">
        
       
    </div>  

</header> 

<!--Menu de navegacion-->

<main>
  <!-- Contador de visitas -->
<a href="https://websmultimedia.com/contador-de-visitas-gratis" title="Contador De Visitas Gratis">
<img style="border: 0px solid; display: inline; margin-top: 10px; margin-right: 200px;"  alt="contador de visitas" src="https://websmultimedia.com/contador-de-visitas.php?id=15116">
</a><br><p>VISTAS DEL SITIO</p>
<!-- Fin Contador de visitas -->

<!--section unites start-->
<h1>Unidades Disponibles</h1>
<hr>
<section class="productos-section">
  <ul class="unidades" id="unidades">
  <?php foreach ($lista_unidades as $registros) { ?>
      <li >
          <img src="img/<?php echo $registros["imagen"] ?>" >
          <div class="descripcion">
              <h3><?php echo $registros["Marca"] ?></h3>
              <p><?php echo $registros["Año"] ?></p> 
              <p><?php echo $registros["Km"] ?></p> <br>
              <h3><?php echo $registros["precio"] ?></h3>
              <a href="portafolio.php?codigo=<?php echo $registros['id']; ?>" class="ver-mas">Ver más</a>
          </div>
      </li>
      <?php }?>
    


      <!-- Puedes agregar más elementos de la lista siguiendo el mismo patrón -->

  </ul>
</section>

<br>

<!--slider de marcas-->
  <div class="slider">
    <div class="slider-track">
      <div class="slide">
        <img src="img/logos/audi.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/bmw.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/chery.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/chevrolet.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/citroen-removebg-preview (1).png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/dodge.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/fiat.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/audi.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/ford.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/honda.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/jeep-removebg-preview (1).png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/kia.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/mercedes.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/mini.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/Mitsubishi_.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/nissan-removebg-preview.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/peugeot.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/renault.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/smart-removebg-preview.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/toyota.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/vw.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/audi.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/bmw.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/chery.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/chevrolet.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/citroen-removebg-preview (1).png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/dodge.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/fiat.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/audi.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/ford.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/honda.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/jeep.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/kia.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/mercedes.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/mini.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/Mitsubishi_.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/nissan.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/peugeot.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/renault.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/smart.jpg" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/toyota.png" alt="">
      </div>
      <div class="slide">
        <img src="img/logos/vw.png" alt="">
      </div>
    </div>
  </div>
<!--slider de marcas-->


<!--servicios-->
<div class="servicios">
  <h1 class="subtitle">Servicios que hacen la diferencia</h1>
  <hr>
</div>


<div class="about__main">

  <article class="about__icons credito">
    <img src="img/4646044.png" class="about__icon">
    <h3 class="about__title">Credito</h3>
    <p class="about__paragrah">Contamos con creditos prendarios sistema frances por diferentes Bancos, financieras y Creditos personales. <br>
•	Tasa Fijas y en Pesos. <br>
•	Financiacion hasta un 80% del valor de la unidad. <br>
•	Un maximo de 60 cuotas. <br>
•	Requisitos solamente DNI y buen Veraz. <br>
•	El anticipo lo podes conformar con tu USADO y/o Efectivo.</p>
  </article>

  <article class="about__icons permuta">
    <img src="img/519848.png" class="about__icon">
    <h3 class="about__title">Permuta</h3>
    <p class="about__paragrah">Tomamos tu usado al mejor precio, en buen estado general y hasta una maximo de 130000km.
        <br>La unidad debera estar al dia y con la documentacion legal correspondiente.
        <br>Solamente se tasa en el local para una mejor valuación.
        <br>No se da precio estimado de toma sin ver la unidad.
    </p>
  </article>

  <article class="about__icons consignacion">
    <img src="img/1345669.png" class="about__icon">
    <h3 class="about__title">Consignación</h3>
    <p class="about__paragrah">Con una tasación se evalua el estado general e historial del vehiculo para lograr
        un precio acorde al mercado.
        <br>Se requiere toda la documentación legal para una optima venta de la unidad.</p>
  </article>


  
</div>
<!--servicios-->

<br><br>

<!--Sobre Nosotros-->

<section class="acerca-de" id="Nosotros">

    <div class="info-container">
        <h1>Nosotros...</h1>
        <hr>
        <p>La Plata Automotores es una empresa dedicada a la compra, 
          venta y consignación de vehículos, incluyendo unidades 0 km y Usadas, 
          con una amplia trayectoria y solidez en el mercado automotriz. 
          Garantizamos los procesos de venta y gestión de unidades previamente seleccionadas.
        </p>
            <div class="about-gallery">
                <img src="img/img1.jpeg" alt="">
                <img src="img/frente4.jpeg" alt="">
                <img src="img/img6.jpeg" alt="">
            </div>

          <p>Su dueño, Fabián Chedreuy, cuenta con una experiencia de 28 años en la industria.
            Trabajó en la fábrica automotriz de Fiat y Peugeot, posteriormente en ventas de unidades 0km a través de modalidades como ventas especiales, 
            plan de ahorro y salón, representando marcas como Fiat, Renault, Chevrolet y Volkswagen. Además, 
            ha desempeñado funciones de Gerente en Concesionarios de Fiat y Volkswagen.
          </p>
             
    </div>
  </div>
</section> 


<!--Sobre Nosotros-->



<!--Galeria de imagenes

<h1>Unidades Destacadas</h1>
<div class="hr"><hr></div>
<section class="galeria" id="Galeria">
  <a href="#image1"><img src="img/img1.jpeg" alt=""></a>
  <a href="#image2"><img src="img/img2.jpeg" alt=""></a>
  <a href="#image3"><img src="img/img3.jpeg" alt=""></a>
  <a href="#image4"><img src="img/img4.jpeg" alt=""></a>
  <a href="#image5"><img src="img/img5.jpeg" alt=""></a>
  <a href="#image6"><img src="img/img6.jpeg" alt=""></a>
  
</section>

<article class="light-box" id="image1">
  <a href="#image6" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img1.jpeg" alt="">
  <a href="#image2" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>
<article class="light-box" id="image2">
  <a href="#image1" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img2.jpeg" alt="">
  <a href="#image3" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>
<article class="light-box" id="image3">
  <a href="#image2" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img3.jpeg" alt="">
  <a href="#image4" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>

<article class="light-box" id="image4">
  <a href="#image3" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img4.jpeg" alt="">
  <a href="#image5" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>

<article class="light-box" id="image5">
  <a href="#image4" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img5.jpeg" alt="">
  <a href="#image6" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>

<article class="light-box" id="image6">
  <a href="#image5" class="next"><i class="fas fa-arrow-left"></i></a>
  <img src="img/img6.jpeg" alt="">
  <a href="#image7" class="next"><i class="fas fa-arrow-right"></i></a>
  <a href="#" class="close">X</a>

</article>


-->

</main>


<!-- contacto -->

<section class="contact" id="contacto">
  <h1 class="heading"><span>Contacto</span></h1>
  <hr>
  <br>

  <div class="row">

    <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.881613242699!2d-57.980048003411405!3d-34.90942035295609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a2e7a8bc632ebd%3A0x347089f5fc9e688e!2sLa%20Plata%20Automotores!5e0!3m2!1ses-419!2sar!4v1701126159813!5m2!1ses-419!2sar"
     width="600" height="470"  allowfullscreen="" loading="lazy" 
     referrerpolicy="no-referrer-when-downgrade"></iframe>

     <form action="https://formspree.io/f/mjvnkeor"
  method="POST">
      <h3>Formulario</h3>
      <input type="text" placeholder="Nombre" class="box">
      <input type="email" placeholder="email" name="email" class="box">
      <input type="number" placeholder="Telefono" class="box">
      <textarea class="box" cols="30" rows="10" placeholder="Mensaje" name="message"></textarea>
      <input type="submit" value="Enviar" class="btn">
     </form>

  </div>
</section>
    
 

    <!-- Footer -->
    <div class="footer-text">
      <p>&copy; La Plata Automotores - 2023 | Todos los derechos reservados. | Creado por <a href="https://techandwave.com/">techandwave</a></p>
    </div>
   
   </div>
 </div>
  </footer>

<script src="script.js"></script>
</body>
</html>