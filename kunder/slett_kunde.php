<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 08:37:23
 */

// Inkluderer database-tilkoblingsfilen
include '../connect.php';

// Sjekker om kunde_id er sendt via GET
if(isset($_GET['kunde_id']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $kunde_id = $_GET['kunde_id'];
    
    // Henter kunde-data for å vise før sletting
    $sql = "SELECT * FROM kunder WHERE kunde_id = :kunde_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kunde_id",$kunde_id);
    $stmt->execute();

    $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Slett kunde</title>
</head>
<body>
    <!-- Inkluderer meny-filen -->
    <?php include '../menu.php'; ?>

    <!-- Header-seksjon -->
    <header>
        <p>Slett kunde</p>
    </header>

    <!-- Hovedinnhold med skjema for bekreftelse av sletting -->
    <main>
        <form action="slett_bekreft_kunde.php" method="get">

        <label for="kunde_id">Kunde ID</label> <br>
        <input type="text" name="kunde_id" id="kunde_id" value="<?php echo htmlspecialchars($kunde['kunde_id']); ?>" readonly required> <br><br>

        <label for="bedriftnavn">Bedriftsnavn</label> <br>
        <input type="text" name="bedriftnavn" id="bedriftnavn" value="<?php echo htmlspecialchars($kunde['bedriftnavn']); ?>" readonly required> <br><br>

        <label for="telefonnummer">Telefonnummer</label> <br>
        <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($kunde['telefonnummer']); ?>" readonly required> <br><br>

        <label for="epost">E-post</label> <br>
        <input type="email" name="epost" id="epost" value="<?php echo htmlspecialchars($kunde['epost']); ?>" readonly required> <br><br>

        <label for="adresse">Adresse</label> <br>
        <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($kunde['adresse']); ?>" readonly required> <br><br>

        <label for="postnummer">Postnummer</label> <br>
        <input type="text" name="postnummer" id="postnummer" value="<?php echo htmlspecialchars($kunde['postnummer']); ?>" readonly required> <br><br>

        <label for="by">By</label> <br>
        <input type="text" name="by" id="by" value="<?php echo htmlspecialchars($kunde['by']); ?>" readonly required> <br><br>

        <input type="submit" name="slett_kunde" id="slett" value="Slett">

        </form>




    </main>
    
</body>
</html>