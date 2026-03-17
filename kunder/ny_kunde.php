<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 09:02:46
 */

// Inkluderer database-tilkoblingsfilen for å koble til databasen
include "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Registrer</title>
</head>
<body>
<!-- Inkluderer meny-filen for navigasjon -->
    <?php include '../menu.php'?>

<!-- Header-seksjon med beskrivelse av siden -->
    <header>
    <p>Registrer nye kunder</p>
    </header>

<!-- Hovedinnhold med skjema for å legge til ny kunde -->
    <main>
        <form action="ny_bekreft_kunder.php" method="get">

        <!-- <label for="kunde_id">Kunde ID:</label><br>
        <input type="text" id="kunde_id" name="kunde_id" readonly><br> -->

        <label for="bedriftnavn">Bedrift navn:</label><br>
        <input type="text" name="bedriftnavn"id="bedriftnavn" required><br>

        <label for="telefonnummer">Telefonnummer:</label><br>
        <input type="text" name="telefonnummer" id="telefonnummer" required><br>

        <label for="epost">E-post/mail:</label><br>
        <input type="text" name="epost" id="epost" required><br>

        <label for="adresse">Adresse:</label><br>
        <input type="text" name="adresse" id="adresse" required><br>

        <label for="postnummer">Postnummer:</label><br>
        <input type="text" name="postnummer" id="postnummer" required><br>

        <label for="by">By:</label><br>
        <input type="text" name="by" id="by" required><br><br>

        <input type="submit" name="ny_kunde" id="ny_kunde" value="Registrer">

</form>

</main>

</body>
</html>