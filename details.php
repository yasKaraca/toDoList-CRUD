<?php
if (!isset($_GET['id'])){
    header('Location: index.php?error=noidprovideddetails');
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
$row = $stmt->fetch(PDO::FETCH_ASSOC); // R
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
        <div class="details">
            <h2><?=$row['titre']?></h2>
            <p><?=$row['resume']?></p>
            <p><?=$row['date']?></p>
            <a href="edit.php?id=<?=$row['id']?>">Modifier</a><br>
            <a href="delete.php?id=<?=$row['id']?>">Supprimer</a>
        </div>
    </main>
</body>
</html>
