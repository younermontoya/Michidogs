<?php
session_start();
if(!isset ($_SESSION['Autenticado'])){
    echo '<script>alert("Por favor inicia sesion") </script>';
    echo "<script>location.href='../../index.php'</script>";
}
?>