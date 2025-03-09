<?php

    class userLogin{

        public static function validateUser($userName, $passWord){

            $env = include "enviroment.php";
            $mysqli = include "database.php";
            $jwt = include "../Autenticacion/jwtHelper.php";
            $json = ['status'=>false, 'jwt'=>null, 'Rol'=>null];

            $query = $mysqli->prepare
            ('SELECT usr.UsuarioID as id, Rol
            FROM Usuario AS usr
            INNER JOIN Estudiante AS std
            ON usr.UsuarioID = std.UsuarioID
            INNER JOIN Docente AS dct
            ON usr.UsuarioID = dct.UsuarioID
            INNER JOIN Coordinador AS cdr
            ON usr.UsuarioID = cdr.UsuarioID
            WHERE (std.CorreoInstitucional = ? AND std.contrasenia = ?)
            OR (dct.CorreoInstitucional = ? AND dct.contrasenia = ?)
            OR (cdr.CorreoInstitucional = ? AND cdr.contrasenia = ?)
            GROUP BY usr.UsuarioID, ROL');

            $query->bind_param('ssssss', $userName, $passWord,$userName, $passWord,$userName, $passWord);

            $query->execute();
            $result = $query->get_result();
            $row = $result->fetch_assoc();

            if ($result->nums_rows > 1){
                $json['status'] = true;
                $json['jwt'] = $jwt->create($row['id'], $userName, $env['SECRET_WORD']);
                $json['Rol'] = $row['Rol'];
            }
            
            $json = json_encode($json);

            return $json;
        }

        public static function validateJwt($idUser){

            $jwt = include "../Autenticacion/jwtHelper.php";
            $env = include "enviroment.php";


            return $jwt->validateJwt($idUser, $env['SECRET_WORD']);
        }
    }

?>