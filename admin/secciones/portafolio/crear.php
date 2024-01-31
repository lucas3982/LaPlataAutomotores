<!--crear portafolio-->



<?php 

include("../../bd.php");

function obtener_id_unidad_recien_agregada($conexion) {
    try {
        $sentencia = $conexion->prepare("SELECT MAX(id) AS id FROM tb_unidades");
        $sentencia->execute();
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

        return $resultado['id'];
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error al obtener el id de la unidad recién agregada: " . $e->getMessage();
        return null;
    }
}

if ($_POST) {
    
    // Recepcionamos los valores del formulario
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";

    if (!empty($descripcion)) {

    // Manejo de hasta 6 imágenes
    $imagenes = array();
    for ($i = 1; $i <= 6; $i++) {
        $imagen_key = "img" . $i;
        $imagen_nombre = isset($_FILES[$imagen_key]["name"]) ? $_FILES[$imagen_key]["name"] : "";
        $fecha_img = new DateTime();
        $nombre_archivo_img = ($imagen_nombre != "") ? $fecha_img->getTimestamp() . "_" . $imagen_nombre : "";
        $tmp_imagen = $_FILES[$imagen_key]["tmp_name"];

        if ($tmp_imagen != "") {
            move_uploaded_file($tmp_imagen, "../../../img/" . $nombre_archivo_img);
            $imagenes[$imagen_key] = $nombre_archivo_img;
        } else {
            $imagenes[$imagen_key] = "";
        }
    }
    }


     // Obtén el id de la unidad recién agregada en tb_unidades
    $id_unidad_recien_agregada = obtener_id_unidad_recien_agregada($conexion); // Puedes ajustar esta función según tus necesidades

    //hago una ejecucion de insercion
    $sentencia=$conexion->prepare("INSERT INTO `tb_portafolio` (`id_unidad`, `Descripcion`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) 
    VALUES (:id_unidad, :Descripcion, :img1, :img2, :img3, :img4, :img5, :img6);");

$sentencia->bindParam(":id_unidad", $id_unidad_recien_agregada);
$sentencia->bindParam(":Descripcion", $descripcion);
$sentencia->bindParam(":img1", $imagenes["img1"]);
$sentencia->bindParam(":img2", $imagenes["img2"]);
$sentencia->bindParam(":img3", $imagenes["img3"]);
$sentencia->bindParam(":img4", $imagenes["img4"]);
$sentencia->bindParam(":img5", $imagenes["img5"]);
$sentencia->bindParam(":img6", $imagenes["img6"]);


$sentencia->execute();
} else {
    echo "La descripción no puede ser nula o vacía.";
}



include("../../templates/header.php");

?>

<div class="card">
        <div class="card-header">
            Unidades del Portafolio
        </div>
        <div class="card-body">

        <form method="post" enctype="multipart/form-data" action="">

        <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
                    
            </div>

<div class="mb-3">
    <label for="img1" class="form-label">Img1:</label>
    <input type="file" class="form-control" name="img1" id="img1" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img2" class="form-label">Img2:</label>
    <input type="file" class="form-control" name="img2" id="img2" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img3" class="form-label">Img3:</label>
    <input type="file" class="form-control" name="img3" id="img3" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img4" class="form-label">Img4:</label>
    <input type="file" class="form-control" name="img4" id="img4" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img5" class="form-label">Img5:</label>
    <input type="file" class="form-control" name="img5" id="img5" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img6" class="form-label">Img6:</label>
    <input type="file" class="form-control" name="img6" id="img6" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<button type="submit" class="btn btn-success">Agregar</button> <!--tipo submit se utiliza para cuando queremos enviar información-->
            <a name="" id="" href="index.php" role="button" class="btn btn-primary">Cancelar</a>    <!--con la etiqueta a nos permite cancelar-->
    
</form>
        </div>
        <div class="card-footer text-muted">

        </div>
</div>


<?php include("../../templates/footer.php");