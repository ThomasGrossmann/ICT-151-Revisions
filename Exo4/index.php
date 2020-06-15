<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

require_once "database.php";

if (isset($_POST['selectEleve'])) {
    $Eleve = $_POST['Eleve'];
}

$allEleves = selectMany("SELECT * FROM person WHERE role = 0 ORDER by personLastName", []);
$allCours = selectMany("SELECT * FROM person INNER JOIN balance ON inPerson = fkPerson INNER JOIN quarter ON idQuarter = fkQuarter INNER JOIN moduleInstance ON idQuarter = fkQuarter INNER JOIN module ON idModule = fkModule WHERE idPerson =:person", ["person" => $Eleve]);
var_dump($allCours);
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
        <input type="submit" name="selectEleve">
    </form>
    <h1>Liste des cours de l'élève</h1>
    <ul>

    </ul>
</body>
</html>