<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:40:04
 */

// Inkluderer database-tilkoblingsfilen
include 'connect.php';

// Sjekker om skjemaet for sletting er sendt
if(isset($_GET['slett_kunde']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $kunde_id = $_GET['kunde_id'];
    
    // Sletter kunden fra databasen
    $sql = "DELETE FROM kunder WHERE kunde_id = :kunde_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kunde_id", $kunde_id);
    $stmt->execute();
    }
else
    {
    $stmt = 0; // Setter stmt til 0 hvis ikke sendt
    
    }    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>Bekreftelse</title>
</head>
<body>
    <!-- Inkluderer meny-filen -->
    <?php include 'menu.php'; ?>

    <!-- Header-seksjon -->
    <header>
        <p>SLETT KUNDE</p>
    </header>
    
    <!-- Hovedinnhold med bekreftelsesmelding -->
    <main>
        <?php
        // Viser melding basert på om slettingen lyktes
        if ($stmt)
            {
            echo '<p> En kunde er blitt slettet </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! Kunde ble ikke slettet </p>';
            }        

        ?>


    </main>
    
</body>
</html>