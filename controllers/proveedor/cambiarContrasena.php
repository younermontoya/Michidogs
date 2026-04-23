<?PHP
    require_once('../../Models/conexion_db.php');
    require_once('../../Models/consultasProv.php');
    require_once('../../Models/consultasUsuario.php');

session_start();
 $validarContrasena=$_SESSION['contrasena'];
 $id=$_SESSION['id'] ;
 $antiguaC=md5($_POST['aContrasena']);
 $nuevaC=md5($_POST['nContrasena']);

 if($validarContrasena==$antiguaC){
    $objConsultas= new ConsultaProv();
    $result=$objConsultas->cambiarContrasena($id,$nuevaC);
 }else{
    echo '<script> alert("la contraseña antigua es incorrecta") </script>';
    echo "<script> location.href='../../views/proveedor/editUser.php' </script>";

 }





?>