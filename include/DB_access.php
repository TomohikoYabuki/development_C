<?php
    #DBアクセス
    $DB_DSN = "mysql:host=localhost; dbname=sishii; charset=utf8";
    $DB_USER = "webaccess";
    $DB_PW = "toMeu4rH";
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);
?>
