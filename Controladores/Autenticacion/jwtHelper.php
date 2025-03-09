
<?php

    include 'createJwt.php';
    include 'validateJwt.php';

/** Manejador de token jwt
     *
     * @author Gerardo Antonio Rodriguez Contreras .
     * @version 1.0.0.
     *
     */
class Helper{

    /** Llama a la funcion create del arhivo createJwt.php para generar un token de autenticacion.
     *
     * @param string $idUser recibe el id del usuario .
     * @param string $userName recibe el nombre de usuario.
     * @param string $passWord recibe la contrasenia del usuario.
     * @return string retorna un token jwt.
     *
     * @author Gerardo Antonio Rodriguez Contreras .
     * @version 1.0.0.
     *
     */
    public static function create($idUser,$userName ,$passWord ){
        
        $jwt_create = new create();
        $payload = [
            'user_id' => $idUser
            ,'username' => $userName
            ,'exp' => time() + 3600
        ];
    
        $passWord;
    
        $jwt = $jwt_create->create($passWord, $payload);
    
        return $jwt;
    }

    /** Llama a la funcion validate del arhivo validateJwt.php para verificar la autenticacion del token.
     *
     * @param string $jwt recibe un token jwt.
     * @param string $secretKey recibe una llave secreta
     * @return string retorna un valor booleano segun la validez.
     *
     * @author Gerardo Antonio Rodriguez Contreras .
     * @version 1.1.0.
     *
     */
    public static function validate($jwt, $secretKey){
        
        $jwt_validate = new validate();

        $payload = $jwt_validate->validate($jwt, $secretKey);

        if($payload){
            return true;
            
        }
        
        return false;
    
    }

}

$helper = new Helper();

return $helper;

 ?>
