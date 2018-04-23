<?php
if(!isset($_GET['id'])) {
    header('Locaction:index.php?error=noidprovidededit');
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
$stmt->bindValue(':id',$_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" type="text/css" href="./styles/main.css">
</head>
<body>
    <header>
        <h1><a href="index.php">To Do List</a></h1>
        <div class="trait"></div>
        <div class="trait"></div>
    </header>
    <main>
        <form action="doedit.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <div class="form-item titre"><label for="titre">Titre</label><input type="text" name="titre" value="<?=$row['titre']?>"></div>
            <div class="form-item resume"><label for="resume">Description</label><textarea name="resume"><?=$row['resume']?></textarea></div>
            <div class="form-item date"><label for="date">Date</label><input type="date" name="date" value="<?=$row['date']?>"></div>
            <input class="form-send" type="submit" value="Modifier">
        </form>
    </main>


</body>
</html>
