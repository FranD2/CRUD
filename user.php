<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon"  href="img/icon.jpg">
    <title>PHP MySQL CRUD</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
        function validarform() {
            var x = document.forms["form"]["id"].value;
            if (x == "") {
                alert("El campo de id no puede ir vacio");
                return false;
            }
        }
    </script>
</head>
<body>
        </nav>
        <header>
        <section>
            <h1> Proyecto Sistemas de Información</h1>
            <div class="conte">
                <p>PHP MySQL CRUD</p>
                <p>Bienvenido</p>
            </div>
        </section>
    </header>
        <div class="container p-4">
            <?php include("conexion.php");
                        if(isset($_SESSION['message'])){?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?=  $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); }?> 
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="create.php">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="Ingresa ID"
                                    autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ingresa nombre"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Ingresa direccion"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Ingresa telefono"
                                    autocomplete="off" required>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="send" value="Agregar">
                            <input type="reset" class="btn btn-secondary btn-block" value="Limpiar">
                        </form>
                    </div>
                </div> <!--End col-md-4-->
                <div class="col-md-8 mx-auto">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $query = "SELECT * FROM datos";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['dirrecion'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div>
    <aside></aside>
    <footer>
        <div id="redes">
            <img src="img/YouTube2.jpg">
            <img src="img/facebook.jpg">
            <img src="img/Discordlogo.jpg">

        </div>
    </footer>
            <div class="conte">
</body>

</html>
