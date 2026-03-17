<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 08:38:23
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['slett_kontaktperson']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $kontakt_id = $_GET['kontakt_id'];
    

    // Oppdaterer aktuell kontakt
    $sql = "DELETE FROM kontaktperson WHERE kontakt_id = :kontakt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kontakt_id", $kontakt_id);
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
        <p>SLETT KONTAKT</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En kontaktperson er blitt slettet </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! Kontaktperson ble ikke slettet </p>';
            }        

        ?>


    </main>
    
</body>
</html>

