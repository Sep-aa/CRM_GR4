<?php
// Inkluderer database-tilkoblingsfilen
include 'connect.php';

// Sjekker om skjemaet for redigering er sendt
if(isset($_GET['kunder_edit']) && ($_SERVER['REQUEST_METHOD'] === 'GET'))
    {
        // Henter data fra GET-parametere
        $kunde_id = $_GET['kunde_id'];
        $bedrift_navn = $_GET['bedrift_navn'];
        $telefonnummer = $_GET['telefonnummer'];
        $epost = $_GET['epost'];
        $adresse = $_GET['adresse'];
        $postnummer = $_GET['postnummer'];
        $by = $_GET['by'];

        // Oppdaterer kunde-data i databasen
    $sql = "UPDATE Kunder SET bedrift_navn = :bedrift_navn, telefonnummer = :telefonnummer, epost = :epost, adresse = :adresse, postnummer = :postnummer, by = :by
            WHERE kunde_id = :kunde_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kunde_id",$kunde_id);
    $stmt->bindParam(":bedrift_navn",$bedrift_navn);
    $stmt->bindParam(":telefonnummer",$telefonnummer);
    $stmt->bindParam(":epost",$epost);
    $stmt->bindParam(":adresse",$adresse);
    $stmt->bindParam(":postnummer",$postnummer);
    $stmt->bindParam(":by",$by);
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
        <p>REDIGER KUNDE</p>
    </header>
    
    <!-- Hovedinnhold med bekreftelsesmelding -->
    <main>
        <?php
        // Viser melding basert på om oppdateringen lyktes
        if ($stmt)
            {
            echo '<p> En kunde er blitt oppdatert </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! Kunde ble ikke oppdatert </p>';
            }        

        ?>


    </main>
    
</body>
</html>