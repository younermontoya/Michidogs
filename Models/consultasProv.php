<?php
class ConsultaProv{
    public function cargarUsuario($id){
        $f = null;

        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $consultar = "SELECT * FROM usuarios WHERE id =:id";

        $result = $conexion->prepare($consultar);

        $result-> bindParam(':id', $id);

        $result->execute();

        //Siempre al hacer una consulta para mostrar informacion necesitamos convertir 
        //el resultado en un arreglo para poder segmentar dato por dato

        while($resultado = $result->fetch()) {
            $f[] = $resultado;
        }
        return $f;
    }   

    public function modificarPerfil($id,$nombre,$apellido,$telefono,$email){
        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $actualizar = "UPDATE usuarios SET usu_nombre=:nombre,usu_apellido=:apellido,usu_telefono=:telefono,usu_correo=:email WHERE id=:id";

        $result = $conexion -> prepare($actualizar);

        $result ->bindParam(":id",$id);
        $result->bindParam (":nombre", $nombre);
        $result->bindParam (":apellido", $apellido);
        $result->bindParam (":telefono", $telefono);
        $result->bindParam (":email", $email);


        $result->execute();

        echo "<script> alert('El usuario ha sido actualizado exitosamente') </script>";
        echo "<script> location.href='../../views/proveedor/editUser.php' </script>";

    }

    public function cambiarContrasena($id,$nuevaC){
        $objconexion =new Conexion();

        $conexion = $objconexion->get_conexion();

        $actualizar = "UPDATE usuarios SET usu_contrasena=:nuevaC WHERE id=:id";

        $result=$conexion->prepare($actualizar);
        $result->bindParam (":nuevaC",$nuevaC);
        $result ->bindParam(":id",$id);
        $result->execute();
        echo "<script> alert('la contraseña se a actualizado') </script>";
        echo "<script> location.href='../../views/proveedor/editUser.php' </script>";
        //echo "<script> location.href='../../Views/Administrador/perfil.php' </script>";
       
    }

    public function editarEstado($pro_id, $pro_dispo){
        $objconexion = new Conexion();

        $conexion = $objconexion -> get_conexion();

        $editarEstado = "UPDATE productos SET pro_dispo=:pro_dispo WHERE pro_id=:pro_id";

        $result= $conexion->prepare($editarEstado);

        $result->bindParam(":pro_dispo",$pro_dispo);
        $result->bindParam(":pro_id",$pro_id);
        $result->execute();
        echo "<script> alert('El estado del producto se ha editado') </script>";
        echo "<script> location.href='../../views/administrador/productosAdmin.php.php' </script>";
    }
}

?>