<?php

    class userLogin{

        public static function validateUser($userName, $passWord){

            $env = include "enviroment.php";
            $mysqli = include "database.php";
            $jwt = include "../Autenticacion/jwtHelper.php";
            $json = ['status'=>false, 'jwt'=>null, 'Rol'=>null];

            $query = $mysqli->prepare
            ('SELECT count(*) AS existe, usr.UsuarioID as id, Rol
            FROM Usuario AS usr
            INNER JOIN Estudiante AS std
            INNER JOIN Docente AS dct
            INNER JOIN Coordinador AS cdr
            WHERE (std.CorreoInstitucional = ? AND std.contrasenia = ?)
            GROUP BY usr.UsuarioID, ROL');

            $query->bind_param('ss', $userName, $passWord);

            $query->execute();
            $result = $query->get_result();
            $row = $result->fetch_assoc();

            if ($row['existe'] == 1){
                
                $json['status'] = true;
                $json['jwt'] = $jwt->create($row['id'], $userName, $env['SECRET_WORD']);
                $json['Rol'] = $row['Rol'];
            }
            
            $json = json_encode($json);

            return $json;
        }


    }

?>