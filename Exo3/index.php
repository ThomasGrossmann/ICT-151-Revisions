<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

require_once "database.php";

if (isset($_POST['bouton'])){
    $Eleve = $_POST['Eleve'];
    $notes = selectMany("SELECT * FROM person INNER JOIN grade ON idPerson=fkStudent WHERE role = 0 AND gradeValue < 4 AND idPerson =:person", ["person" => $Eleve]);
}

$allEleves = selectMany("SELECT * FROM person WHERE role = 0 ORDER by personLastName", []);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
    <select name="Eleve">
        <?php foreach ($allEleves as $allEleve) { ?>
            <option value="<?= $allEleve['idPerson'] ?>"><?= $allEleve['personLastName'] ?> <?= $allEleve['personFirstName'] ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="bouton" value="Sélectionner">
</form>

<h1>Liste des notes en dessous de la moyenne pour l'élève</h1>
<ul>
    <?php foreach ($notes as $note) { ?>
        <li><?= $note['gradeValue'] ?></li>
    <?php } ?>
</ul>
</body>
</html>