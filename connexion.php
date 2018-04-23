<?php
try {
    $conn = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', 'root');
} catch(PDOException $exception) {
    die("Echec connection BDD");
}