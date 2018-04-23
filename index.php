<?php
require_once "connexion.php";
$requete = "SELECT
    `id`,
    `titre`,
    `resume`,
    `date`
    FROM
    `list`
    ;";
$stmt = $conn->prepare($requete);
$stmt->execute();
$todos = $stmt->fetchAll();
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
<?php
if (isset($_GET['error'])) {
?>
    <div style="color: red"><?=$_GET['error']?></div>
<?php
}
?>
    <header>
        <h1>To Do List</h1>
        <div class="trait"></div>
        <div class="trait"></div>
    </header>
    <main>
        <a class="button-style" href="add.php">Ajouter une nouvelle tache</a>
        <div class="todo-container">
            <?php
                foreach ($todos as $todo) {
                    echo '<div class="todo">';
                    echo '<h4>'.$todo['titre'].'</h4>';
                    echo '<p>'.$todo['resume'].'</p>';
                    echo '<p>'.$todo['date'].'</p>';
                    echo '<div class="todotrait"></div>';
                    echo '<div class="todo-link"><a href="edit.php?id='.$todo['id'].'">Modifier</a></div>';
                    echo '<a href="delete.php?id='.$todo['id'].'">Supprimer</a>';
                    echo '</div>';
                }
             ?>
        </div>
    </main>

</body>
</html>
