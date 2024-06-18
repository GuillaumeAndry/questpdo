<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

// $query = "SELECT * FROM friend";
// $statement = $pdo->query($query);
// $friends = $statement->fetchAll();


// $query = "INSERT INTO friend (firstname, lastname) VALUES ('Chandler', 'Bing')";
// $statement = $pdo->exec($query);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);


// On veut afficher notre résultat via un tableau associatif (PDO::FETCH_ASSOC)
$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
// foreach ($friendsArray as $friend) {
//     echo $friend['firstname'] . ' ' . $friend['lastname'];
// }


// On veut afficher notre résultat via un tableau d'objets (PDO::FETCH_OBJ)
// $friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);
// foreach($friendsObject as $friend) {
//     echo $friend->firstname . ' ' . $friend->lastname;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
    <?php foreach ($friendsArray as $friend) : ?>
       <?= "<li>" . $friend['firstname'] . ' ' . $friend['lastname'] . "</li>" ?>
    <?php endforeach ?>
    <ul>

    <form id="myForm" action="treatment.php" method="post">
                <label for="firstname">
                    <h3>Name</h3>
                    <input type="text" id="name" name="firstname" required="true" maxlength="44">
                </label>

                <label for="lastname">
                    <h3>Lastname</h3>
                    <input type="text" id="lastName" name="lastname" required="true" maxlength="44">
                </label>
                <input type="submit" name="" id="" value="Send">
            </form>
</body>
</html>