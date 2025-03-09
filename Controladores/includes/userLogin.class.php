<?php

    class userLogin{

        public static function validateUser($userName, $passWord){

            $env = include "enviroment.php";
            $mysqli = include "database.php";
            $jwt = include "../Autenticacion/jwtHelper.php";
            $json = ['status'=>false, 'jwt'=>null, 'Rol'=>null];

            $query = $mysqli->prepare
            ('SELECT usr.UsuarioID AS id
            FROM Usuario AS usr
            LEFT JOIN Estudiante AS std
            ON usr.UsuarioID = std.UsuarioID
            LEFT JOIN Docente AS dct
            ON usr.UsuarioID = dct.UsuarioID
            WHERE usr.Correo = ? AND usr.Pass = ?');

            $query->bind_param('ss', $userName, $passWord);

            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows !== 0){
                $row = $result->fetch_assoc();

                $json['status'] = true;
                $json['jwt'] = $jwt->create($row['id'], $userName, $env['SECRET_KEY']);
                #$json['Rol'] = $row['Rol'];
            }
            
            $json = json_encode($json);

            print $json;
            return $json;
        }

        public static function validateJwt($jwt_tk){

            $jwt = include "../Autenticacion/jwtHelper.php";
            $env = include "enviroment.php";

            $response = $jwt->validate($jwt_tk, $env['SECRET_KEY']);;

            return $response;
        }
    }

?>
