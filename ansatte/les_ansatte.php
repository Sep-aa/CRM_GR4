<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:35
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:19:25
 */


//Henter oppkoblingen til databasen
include '../connect.php';

//Prosedyre for å lese fra databasen
$sql = "SELECT * FROM ansatte"; //SQL-kode for å hente ut alle ansatte fra tabellen "ansatte"
$stmt = $pdo->prepare($sql); //Forbereder SQL-koden for kjøring
$stmt->execute(); //Kjører SQL-koden og legger resultatet i $stmt

$ansatte = $stmt->fetchAll(PDO::FETCH_ASSOC); //Henter ut alle rader fra $stmt og legger det i $ansatte som en assosiativ array

//print_r($ansatte);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Ansatte</title>
</head>
<body>
    <?php include '../meny.php'; ?>

    <header>
        <p>VIS ALLE ANSATTE</p>
    </header>    

    <main>
        <table>
            <thead>
                <th>Ansatt-ID</th>
                <th>Navn</th>
                <th>Etternavn</th>
                <th>Telefonnummer</th>
                <th>E-post/mail</th>
                <th>Rolle</th>
                <th>Rediger</th>
                <th>Slett</th>
            </thead>
            <tbody>
                <?php foreach($ansatte as $ansatt)
                    {?>
                    <tr>
                        <td><?php echo htmlspecialchars($ansatt['ansatt_id']); ?> </td>
                        <td><?php echo htmlspecialchars($ansatt['navn']); ?> </td>
                        <td><?php echo htmlspecialchars($ansatt['etternavn']); ?> </td>
                        <td><?php echo htmlspecialchars($ansatt['telefonnummer']); ?> </td>
                        <td><?php echo htmlspecialchars($ansatt['epost']); ?> </td>
                        <td><?php echo htmlspecialchars($ansatt['rolle']); ?> </td>
                        <td><a id="rediger" href="rediger_ansatte.php?ansatt_id=<?php echo htmlspecialchars($ansatt['ansatt_id']); ?> ">Rediger</a></td>
                        <td><a id="slett" href="slett_ansatte.php?ansatt_id=<?php echo htmlspecialchars($ansatt['ansatt_id']); ?> ">Slett</a></td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </main>
</body>
</html>
