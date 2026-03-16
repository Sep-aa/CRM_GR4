<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-13 13:35:14
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:39:59
 */

// Inkluderer database-tilkoblingsfilen
include "connect.php";

// Sjekker om skjemaet er sendt og metoden er GET
if(isset($_GET['kunder_new']) && ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
        // Henter data fra GET-parametere
        $kunde_id = $_GET['kunde_id'];
        $bedriftnavn = $_GET['bedriftnavn'];
        $telefonnummer = $_GET['telefonnummer'];
        $epost = $_GET['epost'];
        $adresse = $_GET['adresse'];
        $postnummer = $_GET['postnummer'];
        $by = $_GET['by'];

        // Sjekker om kunden allerede finnes
        $sql = "Select * From kunder where kunde_id = :kunde_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':kunde_id', $kunde_id);
        $stmt->execute();

        $kunde = $stmt->fetch(PDO::FETCH_ASSOC);

        // Skriver ut rådata for debugging
        print_r($kunde);

        // Hvis kunden ikke finnes, legg til ny
        if(!$kunde)
            {
            $sql = "INSERT INTO kunder (kunde_id, bedriftnavn, telefonnummer, epost, adresse, postnummer, by)
            VALUES (:kunde_id, :bedriftnavn, :telefonnummer, :epost, :adresse, :postnummer, :by)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':kunde_id', $kunde_id);
            $stmt->bindParam(':bedriftnavn', $bedriftnavn);
            $stmt->bindParam(':telefonnummer', $telefonnummer);
            $stmt->bindParam(':epost', $epost);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->bindParam(':postnummer', $postnummer);
            $stmt->bindParam(':by', $by);
            $stmt->execute();
            }

        else
            {
                $stmt =0; // Setter stmt til 0 hvis kunden finnes
            }
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
        <title>Bekreftelse</title>
    </head>
    <body>
        <!-- Inkluderer meny-filen -->
        <?php include 'menu.php'?>

        <!-- Header-seksjon -->
        <header>
           <p>Her kan du legge til nye kunder</p>
        </header>

        <!-- Hovedinnhold med bekreftelsesmelding -->
        <main>
            <?php
            // Viser melding basert på om innsettingen lyktes
            if($stmt)
                {
                    echo "Kunden er lagt til i databasen";
                }
            else
                {
                    echo "Kunden kunne ikke legges til i databasen";
                }
            ?>
        </main>

    </body>
    </html>