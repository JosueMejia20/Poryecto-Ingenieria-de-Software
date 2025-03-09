<?php

    include "../includes/userLogin.class.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $input = json_decode(file_get_contents("php://input"), true) ?? $_POST;
        if (isset($_POST['email']) & isset($_POST['pass'])){

            userLogin::validateUser(
                $_POST['email'],
                $_POST['pass']
            );

        }
    }

?>
