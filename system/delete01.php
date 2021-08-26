<?php
    include("../include/DB_access.php");
    
    /*URLに載せて渡されたidはGETで取得できる*/
    $id = $_GET['member_ID'];

    $delete_str="DELETE FROM member WHERE member_ID='$id'";
    /*SQL文実行*/
    $sql = $pdo->prepare($delete_str);
    $sql->execute();

    #echo $delete_str;
    //トップ画面へ遷移
    header('Location:index.php');
?>
