<?php
if(!isset($_POST['titre'])){
    header('Location: index.php?error=nopostdatacreate');
}
require_once "connexion.php";
$requete = "INSERT INTO
`list`
(`titre`, `resume`, `date`)
VALUES
(:titre, :resume, :date)
;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':titre', $_POST['titre']);
$stmt->bindValue(':resume', $_POST['resume']);
$stmt->bindValue(':date', $_POST['date']);
$stmt->execute();
header('Location: details.php?id='.$conn->lastInsertId()); // R