<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:39:01
 */

// Inkluderer database-tilkoblingsfilen for å koble til databasen
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legg til kunde</title>
</head>
<body>

<!-- Inkluderer meny-filen for navigasjon -->
<?php include 'menu.php'?>

<!-- Header-seksjon med beskrivelse av siden -->
<header>
<p>Her kan du legge til nye kunder</p>
</header>

<!-- Hovedinnhold med skjema for å legge til ny kunde -->
<main>
<form action="kunder_ny_bekreft.php" method="get">

<label for="kunde_id">Kunde ID:</label><br>
<input type="text" id="kunde_id" name="kunde_id"><br>

<label for="bedriftnavn">Bedrift navn:</label><br>
<input type="text" id="bedriftnavn" name="bedriftnavn"><br>

<label for="telefonnummer">Telefonnummer:</label><br>
<input type="text" id="telefonnummer" name="telefonnummer"><br>

<label for="epost">E-post/mail:</label><br>
<input type="text" id="epost" name="epost"><br>

<label for="adresse">Adresse:</label><br>
<input type="text" id="adresse" name="adresse"><br>

<label for="postnummer">Postnummer:</label><br>
<input type="text" id="postnummer" name="postnummer"><br>

<label for="by">By:</label><br>
<input type="text" id="by" name="by"><br><br>

<input type="submit" name="kunder_new" id="kunder_new" value="Legg til kunde">

</form>

</main>

</body>
</html>