<?php
if (!isset($_POST['id']) || !isset($_POST['titre'])) {
    header('Location: index.php?error=nopostdataedit');
    exit;
}
require_once "connexion.php";
$requete = "UPDATE
    `list`
    SET
    `titre` = :titre,
    `resume` = :resume,
    `date` = :date
    WHERE
    id = :id
    ;";
$stmt = $conn->prepare($requete);
$stmt->bindValue(':titre', $_POST['titre']);
$stmt->bindValue(':resume', $_POST['resume']);
$stmt->bindValue(':date', $_POST['date']);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: details.php?id='.$_POST['id']);