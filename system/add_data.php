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
    /*
    $name="";
    $pref="";
    $gender="";
    $age="";
    $section="";
    $grade="";
*/
    //SQL文
    $query_str = "INSERT INTO `member` (member.member_ID, member.name, member.pref, member.seibetu, member.age, member.section_ID, member.grade_ID) VALUES (NULL";
    $add_sql = ");";
    //入力判定
    if(isset($_POST['namae'])&& !empty($_POST['namae'])){
        $name_flag=1;
        //$name = $_POST['namae'];
        $query_str .= ", '". $_POST['namae'] ."'";
    }
    if(isset($_POST['pref']) && !empty($_POST['pref'])){
        $pref_flag=1;
        $query_str .= ", '". $_POST['pref'] ."'";
    }
    if(isset($_POST['gender']) && !empty($_POST['gender'])){
        $gender_flag=1;
        $query_str .= ", '". $_POST['gender'] ."'";
    }
    if(isset($_POST['age']) && !empty($_POST['age'])){
        $age_flag=1;
        $query_str .= ", '". $_POST['age'] ."'";
    }
    if(isset($_POST['section']) && !empty($_POST['section'])){
        $section_flag=1;
        $query_str .= ", '". $_POST['section'] ."'";
    }
    if(isset($_POST['grade']) && !empty($_POST['grade'])){
        $grade_flag=1;
        $query_str .= ", '". $_POST['grade'] ."'";
    }

    //入力が揃っていればSQL文を実行
    if(($name_flag==1) && ($pref_flag==1) && ($gender_flag==1) && ($age_flag==1) && ($section_flag==1) && ($grade_flag==1)){
        //SQL文
        
        $query_str .= $add_sql;
        echo $query_str;
        //echo $name;
        try{
            $sql = $pdo->prepare($query_str);
            $sql->execute();

            $id = $pdo->lastInsertId('member_ID');
            header('Location:detail01.php?member_ID='.$id);

        }catch(PDOException $e){
            header('Location:../include/error.php');
        }

    }else{
        header('Location:../include/error.php');
    }
?>
