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
        <form action="doadd.php" method="post">
            <div class="form-item titre"><label for="titre">Titre</label><input type="text" name="titre"></div>
            <div class="form-item resume"><label for="resume">Description</label><textarea name="resume"></textarea></div>
            <div class="form-item date"><label for="date">Date</label><input type="date" name="date" value="<?= date('Y-m-d')?>"></div>
            <input class="form-send" type="submit" value="Ajouter">
        </form>
    </main>
</body>
</html>