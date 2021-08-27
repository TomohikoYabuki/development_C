<?php
    //ファイル読み込み
    //include("../include/header.html");
    include("../include/staticdatas.php");
    include("../include/DB_access.php");

    //判定用変数
    $name_flag=0;
    $pref_flag=0;
    $gender_flag=0;
    $age_flag=0;
    $section_flag=0;
    $grade_flag=0;

    //代入用変数
    $name=0;
    $pref=0;
    $gender=0;
    $age=0;
    $section=0;
    $grade=0;

    //入力判定
    if(isset($_POST['namae'])&& !empty($_POST['namae'])){
        $name_flag=1;
        $name = $_POST['namae'];
    }
    if(isset($_POST['pref']) && !empty($_POST['pref'])){
        $pref_flag=1;
        $pref = $_POST['pref'];
    }
    if(isset($_POST['gender']) && !empty($_POST['gender'])){
        $gender_flag=1;
        $gender = $_POST['gender'];
    }
    if(isset($_POST['age']) && !empty($_POST['age'])){
        $age_flag=1;
        $age = $_POST['age'];
    }
    if(isset($_POST['section']) && !empty($_POST['section'])){
        $section_flag=1;
        $section = $_POST['section'];
    }
    if(isset($_POST['grade']) && !empty($_POST['grade'])){
        $grade_flag=1;
        $grade = $_POST['grade'];
    }

    //入力が揃っていればSQL文を実行
    if(($name_flag==1) && ($pref_flag==1) && ($gender_flag==1) && ($age_flag==1) && ($section_flag==1) && ($grade_flag==1)){
        //SQL文
        $query_str = "INSERT INTO `member` (`member_ID`, `name`, `pref`, `seibetu`, `age`, `section_ID`, `grade_ID`) VALUES (NULL, '$name','$pref','$gender','$age', '$section','$grade');";
        #echo $query_str . "<br>";

        //実際に使う際はコメントアウトを消す

        $sql = $pdo->prepare($query_str);
        $sql->execute();

        //var_dump($pdo->lastInsertId());
        $id = $pdo->lastInsertId();

        //ID検索で詳細を表示
        $query_str_02 = "SELECT member.member_ID, member.name, member.pref, member.seibetu, member.age, grade_master.grade_name, section1_master.section_name FROM member LEFT JOIN grade_master ON grade_master.ID = member.grade_ID LEFT JOIN section1_master ON section1_master.ID = member.section_ID WHERE member.member_ID= '$id'";
        #echo $query_str_02;

        $sql = $pdo->prepare($query_str_02);                // PDOオブジェクトにSQLを渡す
        $sql->execute();                                    // SQLを実行する
        $result = $sql->fetchAll();
/*
        foreach($result as $each){
            $id = $each['member_ID'];
        }
*/
        header('Location:detail01.php?member_ID='.$id);

        exit();
    }else{
        echo "新規登録に失敗しました。";
    }
?>
