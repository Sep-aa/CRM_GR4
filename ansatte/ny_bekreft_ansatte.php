<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 10:05:24
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['ny_ansatte']) AND ($_SERVER['REQUEST_METHOD'] == 'GET')) // Sjekker om knappen "ny_ansatt" er trykket og at formen er sendt med GET-metoden
    {
    // $ansatt_id = $_GET['ansatt_id'];
    $navn = $_GET['navn'];
    $etternavn = $_GET['etternavn'];
    $telefonnummer = $_GET['telefonnummer'];
    $epost = $_GET['epost'];
    $rolle = $_GET['rolle'];

    // Ser om ansatt_id finnes fra før
    $sql = "SELECT * FROM ansatte WHERE ansatt_id = :ansatt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":ansatt_id",$ansatt_id);
    $stmt->execute();

    $ansatt = $stmt->fetch(PDO::FETCH_ASSOC); // Henter ut en ansatt som har samme ansatt_id som den som er skrevet inn i formen, og legger det i $ansatt som en assosiativ array

    // print_r($ansatt);

    if (!$ansatt)
        {

        $sql = "INSERT INTO ansatte (ansatt_id, navn, etternavn, telefonnummer, epost, rolle)
                VALUES (:ansatt_id, :navn, :etternavn, :telefonnummer, :epost, :rolle)"; // SQL-kode for å sette inn en ny ansatt i tabellen "ansatte" med verdiene som er skrevet inn i formen

        $stmt = $pdo->prepare($sql); // Forbereder SQL-koden for kjøring
        $stmt->bindParam(":ansatt_id",$ansatt_id);
        $stmt->bindParam(":navn",$navn);
        $stmt->bindParam(":etternavn",$etternavn);
        $stmt->bindParam(":telefonnummer",$telefonnummer);
        $stmt->bindParam(":epost",$epost);
        $stmt->bindParam(":rolle",$rolle);
        $stmt->execute(); // Kjører SQL-koden og legger resultatet i $stmt
        }
    else
        {
        $stmt = 0;    
        }
    }    
else
    {
    $stmt = 0;    
    }            


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Min ansatt</title>
</head>
<body>
    <?php include '../meny.php'; ?>

    <header>
        <p>REGISTRER NY ansatt</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En ny ansatt er blitt registrert </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! ansatt ble ikke registrert </p>';
            }        

        ?>


    </main>
    
</body>
</html>

