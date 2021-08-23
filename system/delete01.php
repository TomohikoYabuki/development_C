<?php
    include("../include/DB_access.php");
    $id = $_GET['member_ID'];
    $delete_str="DELETE FROM member WHERE member_ID='$id'";
    //本番ではコメントアウト外す
    /*
    $sql = $pdo->prepare($delete_str);
    $sql->execute();
    */
    #echo $delete_str;
    //トップ画面へ遷移
    header('Location:index.php');
?>
