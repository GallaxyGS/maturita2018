<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'knihovna_mares');

$connection = @mysqli_connect(
                DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME
);
mysqli_set_charset($connection, "utf8");

if ($connection == FALSE) {
    echo "Nastala chyba připojení k databázi";
    echo mysqli_connect_error();
}
?>
