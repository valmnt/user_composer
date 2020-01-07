<?php
require_once __DIR__ . "/src/connection/connection.php";

$connection = new  MysqlConnection('root', 'user');
$rows = $connection->select('SELECT * from users');

#insertion massive dans la table 'users'
#$connection->insert();

#suppression massive dans la table 'users'
#$connection->delete("users");
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


<form action="form.php" method="post">
    <div>
        <label for="name">Name :</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="firstname">Firstname :</label>
        <input type="text" id="mail" name="firstname">
    </div>
    <div>
        <label for="age">Age :</label>
        <input id="text" name="age"></input>
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
    </div>
</form>


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