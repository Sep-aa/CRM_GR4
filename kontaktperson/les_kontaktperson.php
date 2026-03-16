<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:35
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:22:28
 */


//Henter oppkoblingen til databasen
include '../connect.php';

//Prosedyre for å lese fra databasen
$sql = "SELECT * FROM kontaktperson"; //SQL-kode for å hente ut alle kontaktperson fra tabellen "kontaktperson"
$stmt = $pdo->prepare($sql); //Forbereder SQL-koden for kjøring
$stmt->execute(); //Kjører SQL-koden og legger resultatet i $stmt

$kontaktperson = $stmt->fetchAll(PDO::FETCH_ASSOC); //Henter ut alle rader fra $stmt og legger det i $kontaktperson som en assosiativ array

//print_r($kontaktperson);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>kontaktperson</title>
</head>
<body>
    <?php include '../meny.php'; ?>

    <header>
        <p>VIS ALLE KONTAKTPERSONER</p>
    </header>    

    <main>
        <table>
            <thead>
                <th>Kontakt-ID</th>
                <th>Navn</th>
                <th>Etternavn</th>
                <th>Stilling</th>
                <th>Telefonnummer</th>
                <th>E-post/mail</th>
                <th>Kunde_id</th>
                <th>Rediger</th>
                <th>Slett</th>
            </thead>
            <tbody>
                <?php foreach($kontaktperson as $kontakt)
                    {?>
                    <tr>
                        <td><?php echo htmlspecialchars($kontakt['kontakt_id']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['navn']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['etternavn']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['stilling']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['telefonnummer']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['epost']); ?> </td>
                        <td><?php echo htmlspecialchars($kontakt['kunde_id']); ?> </td>
                        <td><a id="rediger" href="rediger_kontaktperson.php?kontakt_id=<?php echo htmlspecialchars($kontakt['kontakt_id']); ?> ">Rediger</a></td>
                        <td><a id="slett" href="slett_kontaktperson.php?kontakt_id=<?php echo htmlspecialchars($kontakt['kontakt_id']); ?> ">Slett</a></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </main>
</body>
</html>
