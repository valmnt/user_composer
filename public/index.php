<?php

// on charge le fichier autolaod.php qui va tout require
require "../vendor/autoload.php";
// on importe notre classe MysqlConnection en utilisant notre namespace créé précédemment
use App\Service\UserService;

$userService = new UserService();
var_dump($userService->findAll());

//$rows = $connection->select('SELECT * from users');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Users</title>
</head>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['age'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>

</html>