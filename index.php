<?php

include('./db.php');
include('./models/users.php');


$db_init = Database::initialize();
$db = $db_init->connect();


$user_model = new UserModel($db);

$users_list = $user_model->getUsers();

?>

<link rel="stylesheet" type="text/css" href="./assets/styles.css">
<table class="users-table">
    <thead class="table-row header">
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Departamento</th>
        <th>País</th>
    </thead>
    <tbody>
        <?php

        foreach ($users_list as $user) {

        ?>
            <tr class="table-row">
                <td class="table-col"><?php echo $user['name'] ?></td>
                <td class="table-col"><?php echo $user['city'] ?></td>
                <td class="table-col"><?php echo $user['province'] ?></td>
                <td class="table-col"><?php echo $user['country'] ?></td>
            </tr>

        <?php
        }
        ?>
    </tbody>
</table>