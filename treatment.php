<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$firstname = trim(htmlentities($_POST['firstname']));
$lastname = trim(htmlentities($_POST['lastname']));
$errors = [];

if ((empty($firstname)) || (strlen($firstname) >= 45)) {
    $errors[] = "Plus de 0 caractères, et moins de 45 </br>";
}

if ((empty($lastname)) || (strlen($lastname) >= 45)) {
    $errors[] = "Plus de 0 caractères, et moins de 45 </br>";
}

if (empty($errors)) {
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->execute();

    $friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

    require 'result.php';
    die();
} else {
    foreach ($errors as $error) {
        echo $error;
    }
}

// $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
// $statement = $pdo->prepare($query);

// $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
// $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

// $statement->execute();


// $friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);
// foreach ($friendsArray as $friend) {
//     echo $friend['firstname'] . ' ' . $friend['lastname'];
// }