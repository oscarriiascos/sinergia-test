<?php

include('./db.php');
$db = Database::initialize();
$connection = $db->connect();

var_dump($connection);
