<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

require_once "database.php";

$Profs = selectMany("SELECT * FROM person WHERE role = 1 ORDER by personLastName", []);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Liste de tous les profs</h1>
<ul>
    <?php foreach ($Profs as $prof) { ?>
        <li><?= $prof['personLastName'] ?> <?= $prof['personFirstName'] ?></li><?php } ?>
</ul>
</body>
</html>