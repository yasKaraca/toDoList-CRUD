<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovideddelete');
    exit;
}
require_once "connexion.php";
$requete = "SELECT
    `id`,
    `titre`,
    `resume`,
    `date`
    FROM
    `list`
    WHERE 
    `id` = :id
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supprimer To Do List </title>
    <link rel="stylesheet" type="text/css" href="./styles/main.css">
</head>
<body>
    <header>
        <h1><a href="index.php">To Do List</a></h1>
        <div class="trait"></div>
        <div class="trait"></div>
    </header>
    <main>
        <form action="dodelete.php" method="post">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <label for="">Êtes-vous sûr de vouloir supprimer <span style="color: deepskyblue;"><?=$row['titre']?></span> ?</label><br>
            <input class="form-delete" type="submit" value="Supprimer">
        </form>
    </main>
</body>
</html>
