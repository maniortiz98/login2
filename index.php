

<?php
$alert = '';
session_start();
if(!empty( $_SESSION['active'])){
    header('location: sistema/');
}else{

if(!empty($_POST)){
    if(empty($_POST['usuario']) || empty($_POST['clave'])){
        $alert = 'ingrese usuario y clave';
    }else{
        require_once "conexion.php";
        $user = $_POST['usuario'];
        $pass = $_POST['clave'];

        $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$user' AND clave ='$pass'");
        $result = mysqli_num_rows($query);

        if($result > 0){
            $data = mysqli_fetch_array($query);
            
            $_SESSION['active'] = true;
            $_SESSION['iduser'] = $data['idusuario'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['user'] = $data['usuario'];
            $_SESSION['rol'] = $data['rol'];

            header('location: sistema/');

        }else{
            $alert = 'Usuario y clave son incorrecto.';
            session_destroy();
                }

    }

    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
    <title>SISTEMA</title>
  </head>
  <body>
    
<div class="container">
    <div class="tomas">
  <form action="" method="post">
  <div class="form-group">
      <h1>Inicio de sesion</h1>
    <label for=""  >Usuario</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Usuario" name="usuario">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="clave">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <br>
  <p class="alert"><?php echo isset($alert)? $alert :''; ?></p>
  <button type="submit" class="btn btn-primary" value="INGRESAR">Ingresar</button>
</form>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>