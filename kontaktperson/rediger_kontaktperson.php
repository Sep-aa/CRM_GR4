<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-06 13:43:10
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

    $kontakt = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($bil);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>Tittel</title>
</head>
<body>
    <?php include 'meny.php'; ?>

    <header>
        <p>Rediger kontaktperson</p>
    </header>

    <main>
        <form action="rediger_bekreft_kontaktperson.php" method="get">

        <label for="kontakt_id">kontakt-ID</label> <br>
        <input type="text" name="kontakt_id" id="kontakt_id" value="<?php echo htmlspecialchars($kontakt['kontakt_id']); ?>" readonly required> <br><br>

        <label for="navn">Navn</label> <br>
        <input type="text" name="navn" id="navn" value="<?php echo htmlspecialchars($kontakt['navn']); ?>" required> <br><br>

        <label for="etternavn">Etternavn</label> <br>
        <input type="text" name="etternavn" id="etternavn" value="<?php echo htmlspecialchars($kontakt['etternavn']); ?>" required> <br><br>

        <label for="telefonnummer">Telefonnummer</label> <br>
        <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($kontakt['telefonnummer']); ?>" required> <br><br>

        <label for="epost">E-post/mail</label> <br>
        <input type="text" name="epost" id="epost" value="<?php echo htmlspecialchars($kontakt['epost']); ?>" required> <br><br>

        <label for="kunde_id">kunde_id</label> <br>
        <input type="text" name="kunde_id" id="kunde_id" value="<?php echo htmlspecialchars($kontakt['kunde_id']); ?>" required> <br><br>

        <input type="submit" name="rediger_kontaktperson" id="rediger_kontaktperson" value="Lagre">

        </form>




    </main>
    
</body>
</html>