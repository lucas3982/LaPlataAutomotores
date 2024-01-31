<?php include("./bd.php");?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<header>

</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese Usuario">
                        </div>

                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Ingrese Contraseña">
                        </div>


                        <a href="index.php" name="" id="" class="btn btn-primary" role="button">Ingresar</a>

                    </form>
                        
                    </div>
                    <div class="card-footer text-muted">

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>





<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>