<?php
    require_once("connections/connection.php"); //requiere que se conecte a...
?>

<?php
    $control = "SELECT * From tip_user WHERE id_tip_user >=2";
    $query=mysqli_query($mysqli, $control);
    $fila=mysqli_fetch_assoc($query);
?>

<?php
    if ((isset($_GET["MM_insert"]))&&($_GET["MM_insert"]=="formreg"))  //isset que "escucha" cuando
    {
        $cedula= $_GET['doc'];
        $nombre= $_GET['nom'];
        $usuario= $_GET['user'];
        $clave= $_GET['pass'];
        $idusu= $_GET['idusu'];

        $validar ="SELECT * FROM user WHERE cedula='$cedula' or user= '$usuario'";
        $queryi=mysqli_query($mysqli, $validar);
        $fila1=mysqli_fetch_assoc($queryi);

        if($fila1)
        {
            echo '<script>alert ("DOCUMENTO O USUARIO EXISTEN //CAMBIELOS//");</script>';
            echo '<script>windows.location="registrousu.php"</script>';
        }

        else{
        $indatos = "INSERT INTO user (cedula, nombres, user, password, id_tip_user) 
            VALUES ('$cedula', '$nombre', '$usuario', '$clave', '$idusu')";
        $queryj=mysqli_query($mysqli, $indatos);
        $fila2=mysqli_fetch_assoc($queryj); 
        }        
    }      
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprendiendo PHP</title>
</head>
<body>
    <div class= "login_box">
        <form method ="GET" name = "formreg" autocomplete = "off">
            <label for="usuario">REGISTRO DE USUARIOS</label> <br><br>
            <input type="number" name = "doc" placeholder = "Ingrese Documento" required> <br><br>
            <input type="text" name = "nom" placeholder = "Ingrese nombre" required> <br><br>
            <input type="text" name = "user" placeholder = "Ingrese un usuario" required> <br><br>
            <input type="password" name = "pass" placeholder = "Ingrese contraseña" required> <br><br>
            
            <select name = "idusu">
                <?php
                    do {                    
                ?>
                    <option value="<?php echo($fila['id_tip_user'])?>"><?php echo ($fila['tip_user'])?>

                <?php
                    }while($fila=mysqli_fetch_assoc($query));
                
                ?>
            </select>
            <input type="submit" name="validar" value="Registrarme">
            <input type="hidden" name="MM_insert" value="formreg">
        </form>    
    </div>
   
</body>
</html>



