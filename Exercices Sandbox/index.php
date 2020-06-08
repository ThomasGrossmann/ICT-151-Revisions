<?php
/*
 * Programme : Exo Php
 * Auteur : Thomas Grossmann
 * Date : 08.06.2020
 */

function getPDO()
{
    require ".const.php";
    $dbh = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $user, $pass);
    return $dbh;
}

$evaluation = $_POST['evaluation'];
$eleve = $_POST['eleve'];
$note = $_POST['note'];

function getAllEleves()
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM person WHERE role = 0";
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


function getAllEvals()
{
    try {
        $dbh = getPDO();
        $query = "SELECT * FROM evaluation ";
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

function InsertNoteEleve()
{
    try {
        $dbh = getPDO();
        $query = "INSERT ";
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

$allEleves = getAllEleves();
$allEvals = getAllEvals()
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post">
        <label>Evaluation</label>
        <select>
            <?php foreach ($allEleves as $allEleve){?>
            <option><? $allEleve[''] ?></option>
        </select>
    </form>
</body>
</html>
