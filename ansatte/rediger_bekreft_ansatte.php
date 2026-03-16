<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-06 12:45:08
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['rediger_ansatte']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $ansatt_id = $_GET['ansatt_id'];
    $navn = $_GET['navn'];
    $etternavn = $_GET['etternavn'];
    $telefonnummer = $_GET['telefonnummer'];
    $epost = $_GET['epost'];
    $rolle = $_GET['rolle'];

    // Oppdaterer aktuell ansatt
    $sql = "UPDATE ansatte SET navn = :navn, etternavn = :etternavn, telefonnummer = :telefonnummer, epost = :epost, rolle = :rolle
            WHERE ansatt_id = :ansatt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":ansatt_id",$ansatt_id);
    $stmt->bindParam(":navn",$navn);
    $stmt->bindParam(":etternavn",$etternavn);
    $stmt->bindParam(":telefonnummer",$telefonnummer);
    $stmt->bindParam(":epost",$epost);
    $stmt->bindParam(":rolle",$rolle);
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
        <p>REDIGER ANSATTE</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En ansatt er blitt oppdatert </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! Ansatt ble ikke oppdatert </p>';
            }        

        ?>


    </main>
    
</body>
</html>

