<?php

// override core en language system validation or define your own en language validation message
return [
        // Validación de errores
        'required'      => 'El campo {field} es obligatorio.',
        'valid_email'   => 'El campo {field} debe contener una dirección de email válida.',
        'numeric' => 'El campo {field} debe ser numérico.',
        'regex_match' => 'El campo {field} debe tener el formato correcto.',
        'exact_length' => 'El campo {field} debe tener exactamente {param} dígitos.',
        'uploaded' => "El campo {field} no contiene un archivo válido subido.",
        'is_image' => "El campo {field} debe contener una imagen.",
        'max_size' => "El campo {field} no debe exceder de {param} kilobytes.",

];
