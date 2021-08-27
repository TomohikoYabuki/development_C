<?php
    include("../include/DB_access.php");

    $id = $_GET['member_ID'];
    if(isset($id) && !empty($id)){
        $delete_str="DELETE FROM member WHERE member_ID='$id'";

        try{
            $sql = $pdo->prepare($delete_str);
            $sql->execute();

            //トップ画面へ遷移
            header('Location:index.php');

        }catch(PDOException $e){
            header('Location:../include/error.php');
        }
    }else{
        header('Location:../include/error.php');
    }
?>
