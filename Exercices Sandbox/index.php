<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

require_once "database.php";

if (isset($_POST['btnInsert'])) {
    $evaluation = $_POST['evaluation'];
    $eleve = $_POST['eleve'];
    $note = $_POST['note'];
    $nouvelleNote = insert("Insert into grade (gradeValue,fkStudent,fkEval) values (:grade,:student,:eval)",
        [
            "grade" => $note,
            "student" => $eleve,
            "eval" => $evaluation
        ]);
}

$allEleves = selectMany("SELECT * FROM person WHERE role = 0 ORDER by personLastName", []);
$allEvals = selectMany("SELECT testDescription, moduleShortName FROM evaluation INNER JOIN moduleinstance ON fkModuleInstance = idModuleInstance INNER JOIN module on fkModule = idModule", []);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post">
    <label>Évaluation :</label>
    <select name="evaluation">
        <?php foreach ($allEvals as $allEval) { ?>
        <option value="<?= $allEval['idEvaluation'] ?>">Module <?= $allEval['moduleShortName'] . " // " . $allEval['testDescription'] ?></option><?php } ?>
    </select><br><br>
    <label>Élève :</label>
    <select name="eleve">
        <?php foreach ($allEleves as $allEleve) { ?>
            <option value="<?= $allEleve['idPerson'] ?>"><?= $allEleve['personLastName'] . " " . $allEleve['personFirstName'] ?></option><?php } ?>
    </select><br><br>
    <label>Note :</label>
    <input type="text" name="note"><br><br>
    <input type="submit" name="btnInsert" value="Enregistrer">
</form>
</body>
</html>