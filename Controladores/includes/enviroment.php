<?php

    class Environment{

        public static function read($path = "../../.env"): array{

            $result = [];

            $lines = file($path);

            foreach ($lines as $line) {

                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);

                $result[$key] = $value;
            }

            return $result;

        }

    }

    return Environment::read();

?>
