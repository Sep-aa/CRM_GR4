<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-17 09:57:00
 */

// Inkluderer database-tilkoblingsfilen for å koble til databasen
include "../connect.php";

// Utfører en SQL-spørring for å hente alle kunder fra tabellen 'kunder'
$sql = "SELECT * FROM kunder";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Henter alle resultater som en assosiativ array
$kunde = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Skriver ut rådata for debugging (kan fjernes i produksjon)
// print_r($kunde);

// Løkke gjennom hver kunde og skriver ut detaljer
// foreach($kunde as $kunder)
//     {
//         echo "kunde ID: " . $kunder['kunde_id'] . "<br>";
//         echo "Bedrift navn: " . $kunder['bedriftnavn'] . "<br>";
//         echo "Telefonnummer: " . $kunder['telefonnummer'] . "<br>";
//         echo "Email: " . $kunder['epost'] . "<br>";
//         echo "Adresse: " . $kunder['adresse'] . "<br><br>";
//         echo "Postnummer: " . $kunder['postnummer'] . "<br>";
//         echo "city: " . $kunder['city'] . "<br><br>";
//     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>kunder</title>
</head>
<body>

    <!-- Inkluderer meny-filen for navigasjon -->
    <?php include '../meny.php'?>

    <!-- Header-seksjon med beskrivelse av siden -->
    <header>
        <p>Her kan du se alle kundene i databasen</p>
    </header>

    <!-- Hovedinnhold med tabell for å vise kundeliste -->
    <main>
        <table>
            <thead>
                <tr>
                    <th>Kunde-ID</th>
                    <th>Bedriftsnavn</th>
                    <th>Telefonnummer</th>
                    <th>E-post</th>
                    <th>Adresse</th>
                    <th>Postnummer</th>
                    <th>By</th>
                    <th>Rediger</th>
                    <th>Slett</th>
                </tr>
            </thead>
            <tbody>
                <!-- Løkke gjennom hver kunde og viser data i tabellrader -->
                <?php foreach($kunde as $kunder)
                    {?>
                    <tr>
                        <td><?php echo $kunder['kunde_id']; ?></td>
                        <td><?php echo $kunder['bedriftnavn']; ?></td>
                        <td><?php echo $kunder['telefonnummer']; ?></td>
                        <td><?php echo $kunder['epost']; ?></td>
                        <td><?php echo $kunder['adresse']; ?></td>
                        <td><?php echo $kunder['postnummer']; ?></td>
                        <td><?php echo $kunder['city']; ?></td>
                        <td><a id="rediger" href="rediger_kunde.php?kunde_id=<?php echo htmlspecialchars($kunder['kunde_id']); ?> ">Rediger</a></td>
                        <td><a id="slett" href="slett_kunde.php?kunde_id=<?php echo htmlspecialchars($kunder['kunde_id']); ?> ">Slett</a></td>
                    </tr>
                <?php } ?>


                
            </tbody>
        </table>
    </main>
</body>
</html>