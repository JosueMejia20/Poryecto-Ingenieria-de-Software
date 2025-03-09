<?php

try {
    $mysqli = new mysqli(
        $env['SERVER']
        ,$env['USER']
        ,$env['PASSWORD']
        ,$env['DB_NAME']

    );
} catch (\Throwable $th) {
    exit('ERROR: no se pudo conectar con la base de datos');
}

return $mysqli;

?>
