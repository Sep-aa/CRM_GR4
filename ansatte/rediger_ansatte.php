<?php
/**
 * @Author: Sep-aa
 * @Date:   2026-03-03 10:19:36
 * @Last Modified by:   Sep-aa
 * @Last Modified time: 2026-03-13 13:16:13
 */


//Henter oppkoblingen til databasen
include '../connect.php';

if(isset($_GET['ansatt_id']) AND ($_SERVER['REQUEST_METHOD'] == 'GET'))
    {
    $ansatt_id = $_GET['ansatt_id'];
    
    // Ser om ansatt_id finnes fra før
    $sql = "SELECT * FROM ansatte WHERE ansatt_id = :ansatt_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":ansatt_id",$ansatt_id);
    $stmt->execute();

    $ansatt = $stmt->fetch(PDO::FETCH_ASSOC);

    //print_r($bil);
    }

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
        <p>Rediger ansatte</p>
    </header>

    <main>
        <form action="rediger_bekreft_ansatte.php" method="get">

        <label for="ansatt_id">Ansatt-ID</label> <br>
        <input type="text" name="ansatt_id" id="ansatt_id" value="<?php echo htmlspecialchars($ansatt['ansatt_id']); ?>" readonly required> <br><br>

        <label for="navn">Navn</label> <br>
        <input type="text" name="navn" id="navn" value="<?php echo htmlspecialchars($ansatt['navn']); ?>" required> <br><br>

        <label for="etternavn">Etternavn</label> <br>
        <input type="text" name="etternavn" id="etternavn" value="<?php echo htmlspecialchars($ansatt['etternavn']); ?>" required> <br><br>

        <label for="telefonnummer">Telefonnummer</label> <br>
        <input type="text" name="telefonnummer" id="telefonnummer" value="<?php echo htmlspecialchars($ansatt['telefonnummer']); ?>" required> <br><br>

        <label for="epost">E-post/mail</label> <br>
        <input type="text" name="epost" id="epost" value="<?php echo htmlspecialchars($ansatt['epost']); ?>" required> <br><br>

        <label for="rolle">Rolle</label> <br>
        <input type="text" name="rolle" id="rolle" value="<?php echo htmlspecialchars($ansatt['rolle']); ?>" required> <br><br>

        <input type="submit" name="rediger_ansatte" id="rediger_ansatte" value="Lagre">

        </form>




    </main>
    
</body>
</html>