<?php
$host = "host = 127.0.0.1";
$port = "port = 5432";
$dbname = "dbname = schooldb";
$credentials = "user = postgres password = aji1234";
$db = pg_connect("$host $port $dbname $credentials");
if(!$db){
    echo "Error";
}

?>