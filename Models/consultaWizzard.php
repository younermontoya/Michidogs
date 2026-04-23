<?php

class validarFormulario{

    function validateAddressForm($ciudad, $nombre, $telefono, $direccion) {
        $errors = [];
    
        // Validar selección de ciudad
        if ($ciudad == "1") {
            $errors[] = "Debe seleccionar una ciudad.";
        }
    
        // Validar campo de nombre
        if (empty(trim($nombre))) {
            $errors[] = "El campo 'Nombre completo' no puede estar vacío.";
        }
    
        // Validar campo de teléfono
        if (empty(trim($telefono))) {
            $errors[] = "El campo 'Número de teléfono' no puede estar vacío.";
        }
    
        // Validar campo de dirección
        if (empty(trim($direccion))) {
            $errors[] = "El campo 'Dirección' no puede estar vacío.";
        }
    
        // Devolver errores si existen, si no, retorna true
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<script>alert('$error');</script>";
            }
            return false;
        }
    
        return true;
    }

    // Ejemplo de uso: validando datos del formulario
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $ciudad = $_POST['ciudad'] ?? '';
    //     $nombre = $_POST['nombre'] ?? '';
    //     $telefono = $_POST['telefono'] ?? '';
    //     $direccion = $_POST['direccion'] ?? '';

    //     if (validateAddressForm($ciudad, $nombre, $telefono, $direccion)) {
    //         // Proceder con la lógica si la validación es exitosa
    //         echo "<script>alert('Validación exitosa.');</script>";
    //     } else {
    //         // Manejo de error si la validación falla
    //         echo "<script>alert('Por favor, corrija los errores en el formulario.');</script>";
    //     }
    // }
}

?>