<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-06 13:43:15
 */


//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['kontakt_id']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $kontakt_id = $_GET['kontakt_id'];
    
    // Ser om kontakt_id finnes fra før
    $sql = "SELECT * FROM kontaktperson WHERE kontakt_id = :kontakt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":kontakt_id",$kontakt_id);
    $stmt->execute();

    $bil = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($bil);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>TITTEL</title>
</head>
<body>
    <?php include 'meny.php'; ?>

    <header>
        <p>Slett kontakt</p>
    </header>

    <main>
        <form action="slett_bekreft.php" method="get">

        <label for="kontakt_id">kontakt ID</label> <br>
        <input type="text" name="kontakt_id" id="kontakt_id" value="<?php echo htmlspecialchars($bil['kontakt_id']); ?>" readonly required> <br><br>

        <label for="navn">Navn</label> <br>
        <input type="text" name="navn" id="navn" value="<?php echo htmlspecialchars($bil['navn']); ?>" readonly required> <br><br>

        <label for="etternavn">Etternavn</label> <br>
        <input type="text" name="etternavn" id="etternavn" value="<?php echo htmlspecialchars($bil['etternavn']); ?>" readonly required> <br><br>

        <label for="telefonnummer">Telefonnummer</label> <br>
        <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($bil['telefonnummer']); ?>" readonly required> <br><br>

        <label for="epost">E-post</label> <br>
        <input type="email" name="epost" id="epost" value="<?php echo htmlspecialchars($bil['epost']); ?>" readonly required> <br><br>

        <label for="kunde_id">kunde_id</label> <br>
        <input type="text" name="kunde_id" id="kunde_id" value="<?php echo htmlspecialchars($bil['kunde_id']); ?>" readonly required> <br><br>

        <input type="submit" name="slett_bil" id="slett" value="Slett">

        </form>




    </main>
    
</body>
</html>