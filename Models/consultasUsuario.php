
<?php


class ConsultaUsuario{
    
    public function emailExiste($email) {
        $objConexion = new Conexion();
        $conexion = $objConexion->get_conexion();

        $query = "SELECT COUNT(*) FROM usuarios WHERE usu_correo = :email";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0;
    }

    public function registrarUsuario($apellido, $nombre, $email, $telefono, $contrasenaMD, $rol, $estado, $fecha_creacion, $documento, $tipoDocumento){
        $objConexion = new Conexion();
        $conexion =  $objConexion->get_conexion();

        $insert = "INSERT INTO usuarios (rol_id,usu_apellido,usu_contrasena,usu_correo,usu_nombre,usu_telefono,usu_estado,usu_fecha_creacion,usu_documento,usu_tipodoc)
                    VALUES  (:rol,:apellido,:contrasena,:email,:nombre,:telefono,:estado,:fecha_creacion,:documento,:tipoDocumento)";

        $result = $conexion->prepare($insert);

        $result->bindParam(":rol", $rol);
        $result->bindParam(":apellido", $apellido);
        $result->bindParam(":contrasena", $contrasenaMD);
        $result->bindParam(":email", $email);
        $result->bindParam(":nombre", $nombre);
        $result->bindParam(":telefono", $telefono);
        $result->bindParam(":estado", $estado);
        $result->bindParam(":fecha_creacion", $fecha_creacion);
        $result->bindParam(":documento", $documento);
        $result->bindParam(":tipoDocumento", $tipoDocumento);

        $result->execute();
        echo '<script>alert("Bienvenido a la familia michidogs")</script> '; 
        $_SESSION['mostrarModalInicioSesion'] = true;
        echo "<script> location.href='../../index.php'</script> ";


    }
    public function validarSesion($usuario, $contrasena){
        //Conectamos la base de datos
        //A partir de su email
        $objconexion = new Conexion();
        $conexion = $objconexion->get_conexion(); 
        //Consultamos toda la informacion del usuario
        $select= "SELECT * FROM usuarios WHERE usu_correo=:usuario";
        $result = $conexion->prepare($select);
    
        $result ->bindParam(":usuario",$usuario);
    
        $result->execute();
        //Validar si existe un usario con este email
    
        if($f = $result->fetch()) { 
        
            //Validamos la contraseña
            if($contrasena == $f['usu_contrasena']){
    
                if('Activo' == $f['usu_estado']){
                    //Se inicia la sesión
                    session_start();
                    //Creamos variables de sesión global para usar más adelante
                    $_SESSION['id'] = $f['id'];
                    $_SESSION['rol'] = $f['rol_id'];
                    $_SESSION['email'] = $f['usu_correo'];
                    $_SESSION['contrasena'] = $f['usu_contrasena'];
                    $_SESSION['Autenticado'] = "Si";
                    //Validamos el rol para el redireccionamiento
                    switch($f['rol_id']){
                        case"1":
                            echo "<script> location.href='../../views/administrador/dashboard.php'</script> ";
                            break;
                        case"2":
                            echo "<script> location.href='../../views/clientes/home.php'</script> ";
                            break;
                        case"3":
                            echo "<script> location.href='../../views/proveedor/dashboard.php'</script> ";
                            break;
                    } 
                }
    
                else{
                    echo '<script>alert("Su cuenta esta inactiva")</script> ';
                    echo "<script> location.href='../../index.php'</script> ";
                }
    
            }
            else{
                echo '<script>alert("La contraseña es incorrecta")</script> '; 
                $_SESSION['mostrarModalInicioSesion'] = true;
                echo "<script> location.href='../../index.php'</script> ";
            }
    
        }
    
        else{
            echo '<script>alert("No se encontro el usuario")</script> ';
            echo "<script> location.href='../../index.php'</script> ";
        }
    
    }
    public function cerrarSesion(){

            $objConexion = new Conexion();
            $conexion = $objConexion->get_conexion();
    
            session_start();
            session_destroy();
    
            echo "<script>location.href='../../index.php'</script>";
        }
}
?>