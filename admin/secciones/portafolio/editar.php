<!--editar portafolio-->

<?php 
include("../../bd.php");

if (isset($_GET['txtid'])) {
    $txtid = (isset($_GET['txtid'])) ? $_GET['txtid'] : "";
    
    $sentencia = $conexion->prepare("SELECT * FROM tb_portafolio WHERE id_unidad=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();

    // Almacenamos los datos en una variable
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $descripcion = $registro['Descripcion'] ?? "";
    $img1 = $registro['img1'] ?? "";
    $img2 = $registro['img2'] ?? "";
    $img3 = $registro['img3'] ?? "";
    $img4 = $registro['img4'] ?? "";
    $img5 = $registro['img5'] ?? "";
    $img6 = $registro['img6'] ?? "";
}

if ($_POST) {
    // Recepcionamos los valores de formulario
    $txtid = (isset($_POST['txtid'])) ? $_POST['txtid'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    // Manejo de hasta 6 imágenes
    for ($i = 1; $i <= 6; $i++) {
        $imagen_key = "img" . $i;
        $imagen_nombre = isset($_FILES[$imagen_key]["name"]) ? $_FILES[$imagen_key]["name"] : "";
        $fecha_img = new DateTime();
        $nombre_archivo_img = ($imagen_nombre != "") ? $fecha_img->getTimestamp() . "_" . $imagen_nombre : "";
        $tmp_imagen = $_FILES[$imagen_key]["tmp_name"];

        // Si hay nueva imagen, subirla y actualizar en la base de datos
        if ($tmp_imagen != "") {
            // Eliminar imagen antigua
            $sentencia = $conexion->prepare("SELECT $imagen_key FROM tb_portafolio WHERE id_unidad=:id");
            $sentencia->bindParam(":id", $txtid);
            $sentencia->execute();
            $imagen_existente = $sentencia->fetchColumn();

            if (!empty($imagen_existente)) {
                unlink("../../../img/" . $imagen_existente);
            }

            move_uploaded_file($tmp_imagen, "../../../img/" . $nombre_archivo_img);
            $sentencia = $conexion->prepare("UPDATE tb_portafolio SET $imagen_key=:imagen WHERE id_unidad=:id");
            $sentencia->bindParam(":imagen", $nombre_archivo_img);
            $sentencia->bindParam(":id", $txtid);
            $sentencia->execute();
        }
    }

    // Ejecución de la actualización de la descripción
    $sentencia = $conexion->prepare("UPDATE tb_portafolio 
        SET descripcion=:descripcion  
        WHERE id_unidad=:id ");
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();


//con esto regreso a la edicion a la tabla original
$mensaje="Modificación Exitosa";
header("location:index.php?mensaje=$mensaje");


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
                <label for="" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtid;?>" type="text" class="form-control" name="txtid" id="txtid" 
                aria-describedby="helpId" placeholder="ID">
            </div>

        <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                    <input type="text" class="form-control" value="<?php echo $descripcion;?>"  name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
                    
            </div>

<div class="mb-3">
    <label for="img1" class="form-label">Img1:</label>
    <img width="50" src="../../../img/<?php echo $registro['img1'];?>" />
    <input type="file" class="form-control"  name="img1" id="img1" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img2" class="form-label">Img2:</label>
    <img width="50" src="../../../img/<?php echo $registro['img2'];?>" />
    <input type="file" class="form-control"  name="img2" id="img2" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img3" class="form-label">Img3:</label>
    <img width="50" src="../../../img/<?php echo $registro['img3'];?>" />
    <input type="file" class="form-control"  name="img3" id="img3" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img4" class="form-label">Img4:</label>
    <img width="50" src="../../../img/<?php echo $registro['img4'];?>" />
    <input type="file" class="form-control"  name="img4" id="img4" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img5" class="form-label">Img5:</label>
    <img width="50" src="../../../img/<?php echo $registro['img5'];?>" />
    <input type="file" class="form-control"  name="img5" id="img5" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<div class="mb-3">
    <label for="img6" class="form-label">Img6:</label>
    <img width="50" src="../../../img/<?php echo $registro['img6'];?>" />
    <input type="file" class="form-control"  name="img6" id="img6" placeholder="Imagen" aria-decsribedby="helpId">
</div>

<button type="submit" class="btn btn-success">Actualizar</button> <!--tipo submit se utiliza para cuando queremos enviar información-->
            <a name="" id="" href="index.php" role="button" class="btn btn-primary">Cancelar</a>    <!--con la etiqueta a nos permite cancelar-->
    
</form>
        </div>
        <div class="card-footer text-muted">

        </div>
</div>

<?php include("../../templates/footer.php");?>