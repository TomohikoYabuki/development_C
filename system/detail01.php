<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報詳細画面</title>
    </head>
    <script type="text/javascript">
        function goDel(ID){
            if(window.confirm('削徐を行います。よろしいですか？')){
                location.href = "./delete01.php?member_ID=" + id;
            }
        }
    </script>
    <body>
        <?php
            //ファイル読み込み
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <?php
            //index.phpから受け取ったidを変数に入れる
            $id = $_GET['member_ID'];

            //名前検索で詳細を表示
            $query_str_02 = "SELECT member.member_ID, member.name, member.pref, member.seibetu, member.age, grade_master.grade_name, section1_master.section_name
                             FROM member LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                             LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                             WHERE member_ID = '$id'";
            #echo $query_str_02;
            $sql = $pdo->prepare($query_str_02);                // PDOオブジェクトにSQLを渡す
            $sql->execute();                                    // SQLを実行する
            $result = $sql->fetchAll();

            foreach($result as $each){
              $pref = $each['pref'];
              $gender = $each['seibetu'];
          }
          //出力ファイル読み込み
            include("../include/output.php");

        ?>

            <a href="./entry_update01.php?member_ID=<?php echo $id;?>"><input type=submit value="編集"></a>
            <input type="button" value="削除" onclick="goDel(ID);">
    </body>
</html>
=======
<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報詳細画面</title>
    </head>
    <script type="text/javascript">
        function goDel(ID){
            if(window.confirm('削徐を行います。よろしいですか？')){
                location.href = "./delete01.php?member_ID=" + id;
        }
        }
        function goEdit(ID){
            location.href = "./entry_update01.php?member_ID=" + id;
        }
    </script>
    <body>
        <?php
                include("../include/staticdatas.php");
                include("../include/DB_access.php");
                include("../include/header.html");
                ?>
                $sql  = 'SELECT * FROM 'index.php'';
        <form method='GET' action='add_data.php' name="entryform">
        <table border="3" style="width:50%""border-collapse:collapse "border="0">
            <tr>
                <th style="width:30%"bgcolor="#add8e6">社員ID</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%" bgcolor="#add8e6">名前</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">出身地</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">性別</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">年齢</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">所属部署</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">役職</th>
                <td></td>
            </tr>
        </form>
            <?php
        </table>
        </div>
            <a href="./entry_update01.php"> <input type=submit value=" 編集 "></a>
            <input type="button" value="削除" onclick="goDel(ID);">
    </body>
</html>
=======
<!DOCTYPE html>
<html>
    <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報詳細画面</title>
    </head>
    <script type="text/javascript">
        function goDel(ID){
            if(window.confirm('削徐を行います。よろしいですか？')){
                location.href = "./delete01.php?member_ID=" + id;
        }
        }
        function goEdit(ID){
            location.href = "./entry_update01.php?member_ID=" + id;
        }
    </script>
    <body>
        <?php
            //ファイル読み込み
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <?php
            //index.phpから受け取ったidを変数に入れる
            $id = $_GET['member_ID'];

            //名前検索で詳細を表示
            $query_str_02 = "SELECT member.member_ID, member.name, member.pref, member.seibetu, member.age, grade_master.grade_name, section1_master.section_name
                             FROM member LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                             LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                             WHERE member_ID = '$id'";
            #echo $query_str_02;
            $sql = $pdo->prepare($query_str_02);                // PDOオブジェクトにSQLを渡す
            $sql->execute();                                    // SQLを実行する
            $result = $sql->fetchAll();

            foreach($result as $each){
              $pref = $each['pref'];
              $gender = $each['seibetu'];
          }
          //出力ファイル読み込み
            include("../include/output.php");

        ?>

            <a href="./entry_update01.php?member_ID=<?php echo $id;?>"><input type=submit value="編集"></a>
            <input type="button" value="削除" onclick="goDel(ID);">
    </body>
</html>
>>>>>>> 9e8e18e0f875d77330b54372093f86937a8d4e3a
>>>>>>> 8b62a6c11d3b76de2539925d8e7f4643224d41a0
