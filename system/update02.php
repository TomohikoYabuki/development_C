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
    三つに分解して後から合体
    */
    /*①*/$query_str="UPDATE member SET ";
    /*②*/$where_str = "";
    /*③*/$add_sql=" WHERE member.member_ID= $id";

    /*
        検索フォームのSQL文追加都同じ方法で、入力されたら編集の要素に追加していくスタイル
        ②に追加していく
    */
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

    /*SQL文合体*/
    $where_str .= $add_sql;
    $query_str .= $where_str;

    //echo $query_str;

    /*SQL文実行*/
    $sql = $pdo->prepare($query_str);
    $sql->execute();
    $result = $sql->fetchAll();

    /*detail01.phpにmember_IDを渡して遷移する*/
    header('Location:detail01.php?member_ID='.$id);
?>
