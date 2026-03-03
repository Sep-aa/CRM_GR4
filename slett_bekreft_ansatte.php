<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-03 11:00:17
 */


//Henter oppkoblingen til databasen
include 'connect.php';

if(isset($_GET['slett_ansatte']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $ansatt_id = $_GET['ansatt_id'];
    

    // Oppdaterer aktuell ansatt
    $sql = "DELETE FROM ansatte WHERE ansatt_id = :ansatt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":ansatt_id", $ansatt_id);
    $stmt->execute();
    }
else
    {
    $stmt = 0;
    
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
        <p>SLETT ANSATT</p>
    </header>
    
    <main>
        <?php
        if ($stmt)
            {
            echo '<p> En bil er blitt slettet </p>';    
            }
        else
            {
            echo '<p id="slett"> Det oppsto en feil! Bil ble ikke slettet </p>';
            }        

        ?>


    </main>
    
</body>
</html>

