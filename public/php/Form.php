<?php
require "../../vendor/autoload.php";

use App\Service\FormService;

$formService = new FormService;
$formService->sendMail();
$formService->deleteByID();
$rows = $formService->findAllMail();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Newsletter</title>
</head>

<body>
    <div class="contain" style="width: 80%; padding-left: 25%;">
        <form action="Form.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <button type="button" class="btn btn-primary"><a href="../index.php" style="color: white; text-decoration: none;">Home</a></button>
                <input name="mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Nombre :
                        <?php
                        $i = 0;
                        foreach ($rows as $row) {
                            $i += 1;
                        }
                        echo $i;
                        ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?php echo $row['mail'] ?><button type="button" class="btn btn-danger"><a style="color: white;" href="Form.php?delete_id=<?php echo $row['id']; ?>">Delete</a></button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>