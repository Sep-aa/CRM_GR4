<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 08:42:12
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['rediger_kontaktperson']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $kontakt_id = $_GET['kontakt_id'];
    $navn = $_GET['navn'];
    $etternavn = $_GET['etternavn'];
    $stilling = $_GET['stilling'];
    $telefonnummer = $_GET['telefonnummer'];
    $epost = $_GET['epost'];
    $kunde_id = $_GET['kunde_id'];

    // Oppdaterer aktuell kontakt
    $sql = "UPDATE kontaktperson SET navn = :navn, etternavn = :etternavn, stilling = :stilling, telefonnummer = :telefonnummer, epost = :epost, kunde_id = :kunde_id
            WHERE kontakt_id = :kontakt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kontakt_id",$kontakt_id);
    $stmt->bindParam(":navn",$navn);
    $stmt->bindParam(":etternavn",$etternavn);
    $stmt->bindParam(":stilling",$stilling);
    $stmt->bindParam(":telefonnummer",$telefonnummer);
    $stmt->bindParam(":epost",$epost);
    $stmt->bindParam(":kunde_id",$kunde_id);
    $stmt->execute();
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
    <title>Tittel</title>
</head>
<body>
    <?php include '../meny.php'; ?>

    <header>
        <p>REDIGER KONTAKTPERSON</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En kontakt er blitt oppdatert </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! kontakt ble ikke oppdatert </p>';
            }        

        ?>


    </main>
    
</body>
</html>

