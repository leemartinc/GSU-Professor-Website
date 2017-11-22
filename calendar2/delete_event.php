<?php
$id = $_POST['id'];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=zodiac', 'root', 'password');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
$sql = "DELETE from events WHERE id=" . $id;
$q = $bdd->prepare($sql);
$q->execute();
?>
