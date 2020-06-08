<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

require("database.php");

$evaluation = $_POST['evaluation'];
$eleve = $_POST['eleve'];
$note = $_POST['note'];
var_dump($evaluation, $eleve, $note);

function InsertNoteEleve()
{
    try {
        $dbh = getPDO();
        $query = "INSERT INTO grade ()";
        $statement = $dbh->prepare($query);//prepare query
        $statement->execute();//execute query
        $queryResult = $statement->fetch(PDO::FETCH_ASSOC);//prepare result for client
        $dbh = null;
        return $queryResult;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        return null;
    }
}

$allEleves = selectMany("SELECT * FROM person WHERE role = 0 ORDER by personLastName", []);
$allEvals = selectMany("SELECT * FROM evaluation INNER JOIN moduleinstance ON fkModuleInstance = idModuleInstance INNER JOIN module on fkModule = idModule", []);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post">
        <label>Évaluation :</label>
        <select name="evaluation">
            <?php foreach ($allEvals as $allEval){?>
            <option value="<?= $allEval['idEvaluation'] ?>">Module <?= $allEval['moduleShortName'] . " // " . $allEval['testDescription']?></option><?php } ?>
        </select><br><br>
        <label>Élève :</label>
        <select name="eleve">
            <?php foreach ($allEleves as $allEleve){?>
            <option value="<?= $allEleve['idPerson'] ?>"><?= $allEleve['personLastName'] . " " . $allEleve['personFirstName'] ?></option><?php } ?>
        </select><br><br>
        <label>Note :</label>
        <input type="text" name="note"><br><br>
        <input type="submit">
    </form>
</body>
</html>