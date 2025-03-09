<?php
class validate {

    private static function base64Url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (3 + strlen($data)) % 4));
    }

    private static function hash_encode($header, $payload, $secretKey) {
        return hash_hmac('sha256', $header . "." . $payload, $secretKey, true);
    }

    private static function base64Url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /** Valida token jwt segun su algoritmo, sus componentes (header, payload, signature) y el tiempo de expiracion
     *
     * @param string $jwt recibe un token jwt.
     * @return string $secretKey recibe una contrasenia.
     *
     * @author Gerardo Antonio Rodriguez Contreras .
     * @version 1.0.0.
     *
     */
    public static function validate($jwt, $secretKey) {

        $tokenParts = explode(".", $jwt);

        if (count($tokenParts) !== 3) {
            return false;
        }

        list($header, $payload, $signature) = $tokenParts;

        
        $decodedHeader = json_decode(self::base64Url_decode($header), true);
        $decodedPayload = json_decode(self::base64Url_decode($payload), true);

        
        if ($decodedHeader['alg'] !== 'HS256') {
            return false;
        }

        
        if (isset($decodedPayload['exp']) && time() > $decodedPayload['exp']) {
            return false;
        }

        
        $expectedSignature = self::base64Url_encode(self::hash_encode($header, $payload, $secretKey));

        
        if ($expectedSignature !== $signature) {
            return false;
        }

        return $decodedPayload;
    }
}
?>
