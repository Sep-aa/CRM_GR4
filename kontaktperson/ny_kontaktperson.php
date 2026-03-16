<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:35
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:25:09
 */



//Henter oppkoblingen til databasen
include '../connect.php';

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
        <p>Register ny kontakt</p>
    </header>

    <main>
        <form action="ny_bekreft_kontaktperson.php" method="get">
<!-- 
        <label for="kontakt_id">kontakt-ID</label> <br>
        <input type="text" name="kontakt_id" id="kontakt_id" readonly> <br><br> -->

        <label for="navn">Navn</label> <br>
        <input type="text" name="navn" id="navn" required> <br><br>

        <label for="etternavn">Etternavn</label> <br>
        <input type="text" name="etternavn" id="etternavn" required> <br><br>

        <label for="stilling">Stilling</label> <br>
        <input type="text" name="stilling" id="stilling" required> <br><br>
        
        <label for="telefonnummer">Telefonnummer</label> <br>
        <input type="number" name="telefonnummer" id="telefonnummer" required> <br><br>

        <label for="e-post">E-post</label> <br>
        <input type="email" name="epost" id="epost" required> <br><br>

        <label for="kunde_id">kunde_id</label> <br>
        <input type="text" name="kunde_id" id="kunde_id" readonly> <br><br>

        <input type="submit" name="ny_kontaktperson" id="ny_kontaktperson" value="Registrer"> <!-- submiter til ny_bekreft_kontaktperson.php -->

        </form>




    </main>
    
</body>
</html>