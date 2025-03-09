
<?php

class create{

    private static function base64Url_enconde($data){
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    
    /** Crear un token jwt encriptando la informacion, generando sus diferentes componentes para conformar el token
     *
     * @param string $passWord recibe una contrasenia
     * @param string $payload array[id, username, expiracion]
     * @return string retorna un token jwt.
     *
     * @author Gerardo Antonio Rodriguez Contreras .
     * @version 1.0.0.
     *
     */
    public static function create($passWord, $payload){

        $header = json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256'
        ]
        );
    
        $payload = json_encode($payload);
    
        $base64Header = self::base64Url_enconde($header);
        $base64Payload = self::base64Url_enconde($payload);
    
        $signature = hash_hmac('sha256', $base64Header . "." . $base64Payload, $passWord, true);
        $base64Signature = self::base64Url_enconde($signature);
    
        $jwt = $base64Header . "." . $base64Payload . "." . $base64Signature;
    
        return $jwt;
    
    }
    
}
?>
