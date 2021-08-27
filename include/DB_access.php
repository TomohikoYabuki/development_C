<?php
    #DBアクセスする処理のみ部品化
    $DB_DSN = "mysql:host=localhost; dbname=sishii; charset=utf8";
    $DB_USER = "webaccess";
    $DB_PW = "toMeu4rH";
    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

    $section_sql = "SELECT * FROM grade_master";

    $sql = $pdo->prepare($section_sql);
    $sql->execute();
    $section_res = $sql->fetchAll();

    $grade_sql = "SELECT * FROM section1_master";

    $sql = $pdo->prepare($grade_sql);
    $sql->execute();
    $grade_res = $sql->fetchAll();
?>
