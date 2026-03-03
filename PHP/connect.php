<?php
// koble til database å sjekke om det fungerer

$server = "localhost";
$username = "root";
$password = "";
$database = "CRM_GR4";

try
{
    $pdo = new PDO("mysql:host$dbname=$database" , $brukernavn, $passord);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo"database is connected";
}
catch(PDOException $e)
{
    die("oppkoblingsfeil til MYSQL: " .$e->getMessage()."<br>");
}