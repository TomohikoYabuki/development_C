<?php
    //ファイル読み込み
    include("../include/staticdatas.php");
    include("../include/DB_access.php");
    //$id = $_POST['member_ID'];
    $id = "60";
    $query_str="UPDATE member SET ";
    $add_sql=" WHERE member.member_ID= $id";

    $where_str = "";
    $name = "";
    $gender = "";
    $section = "";
    $grade = "";

    if (isset($_POST['namae']) && !empty($_POST['namae'])) {
        $where_str .= "name = '" . $_POST['namae'] ."'";
    }
    if (isset($_POST['pref']) && !empty($_POST['pref'])) {
        $where_str .= ", pref = '" . $_POST['pref'] ."'";
    }
    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $where_str .= ", seibetu = '" . $_POST['gender'] . "'";
    }
    if (isset($_POST['age']) && !empty($_POST['age'])) {
        $where_str .= ", age = '" . $_POST['age'] . "'";
    }
    if (isset($_POST['section_ID']) && !empty($_POST['section_ID'])) {
        $where_str .= ", section_ID = '" . $_POST['section'] . "'";
    }
    if (isset($_POST['grade']) && !empty($_POST['grade'])) {
        $where_str .= ", grade_ID = '" . $_POST['grade'] . "'";
    }

    $where_str .= $add_sql;
    $query_str .= $where_str;

    echo $query_str;

    $sql = $pdo->prepare($query_str);
    $sql->execute();
    $result = $sql->fetchAll();

?>
