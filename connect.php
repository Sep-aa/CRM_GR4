<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:35
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-03 11:17:53
 */


// Dette fila kobler til rett database

//Parametere for tilkobling
$host = "localhost";
$brukernavn = "root";
$passord = "";
$database = "crm_gr4";

// Sett opp forbindelsen med try ... catch
try
    {
    $pdo = new PDO("mysql:host=$host;dbname=$database",$brukernavn, $passord);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Oppkobling til databasen er OK!";
    }
catch(PDOExeption $e)
    {
    die("Oppkonlingsfeil til MYSQL: ".$e->getMessage()."<br>");    
    }    

    




