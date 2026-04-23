<?PHP
    require_once('../../Models/conexion_db.php');
    require_once('../../Models/consultasCliente.php');
    require_once('../../Models/consultasUsuario.php');

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   if (empty($_POST['aContrasena']) || empty($_POST['nContrasena'])) {
       echo "<script> alert('Por favor, digite los datos correspondientes en cada campo.') </script>";
       echo "<script> location.href='../../views/clientes/editarPerfil.php' </script>";
       exit();
   }

   $aContrasena = trim($_POST['aContrasena']);
   $nContrasena = trim($_POST['nContrasena']);

}

 $validarContrasena=$_SESSION['contrasena'];
 $id=$_SESSION['id'] ;
 $antiguaC=md5($_POST['aContrasena']);
 $nuevaC=md5($_POST['nContrasena']);

 if($validarContrasena==$antiguaC){
    $objConsultas= new consultasCliente();
    $result=$objConsultas->cambiarContrasena($id,$nuevaC);
 }else{
    echo '<script> alert("la contraseña antigua es incorrecta") </script>';
    echo "<script> location.href='../../views/clientes/editarPerfil.php' </script>";

 }

?>