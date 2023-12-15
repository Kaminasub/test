<?php

if(!empty($_POST["btningresar"])){
    if (empty($_POST["usuario"]) and empty($_POST["password"])) {
        echo '<div class="alert alert-danger">usuario y contraseña son requeridos</div>';
    } else {
        $user=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$connection->query(" SELECT * FROM `users` where user='$user' and password='$password' ");
        if ($datos=$sql->fetch_object()) {
            header("location:inicio.php");
        } else {
            echo '<div class="alert alert-danger">USUARIO NO EXISTE</div>';
        }
        
    }
    
}

?>

<?php

if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["mail"]) and empty($_POST["usuario"]) and empty($_POST["password"])) {
        echo '<div class="alert alert-danger">Email, usuario y contraseña son requeridos</div>';
    } else {
        $mail=$_POST["mail"];
        $user=$_POST["usuario"];
        $password=$_POST["password"];

        $sql = "INSERT INTO `users` (mail, user, password)
        VALUES ('$mail', '$user', '$password')";
        }

        if (mysqli_query($connection, $sql)) {
            echo "New record created successfully";
            header("location:login.php");
            
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
                 
  }

?>
