#!/bin/bash

DB_NAME="BD_UNI"
DB_USER="root"
SQL_FILE="database.sql"

echo "Creando base de datos..."
mysql -u $DB_USER -p$DB_PASS -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

echo "Ejecutando script SQL..."
mysql -u $DB_USER -p$DB_PASS $DB_NAME < $SQL_FILE

echo "Script ejecutado correctamente."
