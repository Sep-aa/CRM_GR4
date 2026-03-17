<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 10:17:25
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['ny_kontaktperson']) AND ($_SERVER['REQUEST_METHOD'] == 'GET')) // Sjekker om knappen "ny_kontakt" er trykket og at formen er sendt med GET-metoden
    {
    // $kontakt_id = $_GET['kontakt_id'];
    $navn = $_GET['navn'];
    $etternavn = $_GET['etternavn'];
    $stilling = $_GET['stilling'];
    $telefonnummer = $_GET['telefonnummer'];
    $epost = $_GET['epost'];
    // $kunde_id = $_GET['kunde_id'];

    // Ser om kontakt_id finnes fra før
    $sql = "SELECT * FROM kontaktperson WHERE kontakt_id = :kontakt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kontakt_id",$kontakt_id);
    $stmt->execute();

    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC); // Henter ut en kontakt som har samme kontakt_id som den som er skrevet inn i formen, og legger det i $kontakt som en assosiativ array

    print_r($kontakt);

    if (!$kontakt)
        {

        $sql = "INSERT INTO kontaktperson (navn, etternavn, stilling, telefonnummer, epost)
                VALUES (:navn, :etternavn, :stilling, :telefonnummer, :epost)"; // SQL-kode for å sette inn en ny kontakt i tabellen "kontaktperson" med verdiene som er skrevet inn i formen

        $stmt = $pdo->prepare($sql); // Forbereder SQL-koden for kjøring
        // $stmt->bindParam(":kontakt_id",$kontakt_id);
        $stmt->bindParam(":navn",$navn);
        $stmt->bindParam(":etternavn",$etternavn);
        $stmt->bindParam(":stilling",$stilling);
        $stmt->bindParam(":telefonnummer",$telefonnummer);
        $stmt->bindParam(":epost",$epost);
        // $stmt->bindParam(":kunde_id",$kunde_id);
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
    <title>Min kontakt</title>
</head>
<body>
    <?php include '../meny.php'; ?>

    <header>
        <p>REGISTRER NY KONTAKT</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En ny kontakt er blitt registrert </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! kontakt ble ikke registrert </p>';
            }        

        ?>


    </main>
    
</body>
</html>

