<?php
    //ファイル読み込み
    include("../include/staticdatas.php");
    include("../include/DB_access.php");
    /*hiddenで変数を送信＆POSTで取得*/
    $id = $_POST['member_id'];

    /*DB編集SQL文
    UPDATE member SET name = 'なまえ', pref = '出身地', seibetu = '性別', age = '年齢', section_ID = '所属部署', grade_ID = 'グレード' WHERE member.member_ID = ”ID”;
    ①UPDATE member SET
    ②name = 'なまえ', pref = '出身地', seibetu = '性別', age = '年齢', section_ID = '所属部署', grade_ID = 'グレード'
    ③WHERE member.member_ID = ”ID”
    三つに分解して後から合体する
    */
    /*①*/$query_str="UPDATE member SET ";
    /*②*/$where_str = "";
    /*③*/$add_sql=" WHERE member.member_ID= $id";

    /*

    /*SQL文合体*/
    $where_str .= $add_sql;
    $query_str .= $where_str;

    //echo $query_str;

    /*SQL文実行*/
    try{
        $sql = $pdo->prepare($query_str);
        $sql->execute();
    }catch(PDOException $e){
            header('Location:error.php');
        }
    /*detail01.phpにmember_IDを渡して遷移する*/
    header('Location:detail01.php?member_ID='.$id);
?>
