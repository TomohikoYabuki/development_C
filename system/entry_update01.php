<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報編集画面</title>
        <script type="text/javascript">
            function disp(){
            	if(window.confirm('編集を終了しますか？')){
            		location.href = "detail01.php";
            	}else{
            		window.alert('キャンセルされました');
            	}
                }
        </script>
    </head>

    <body>
        <?php
        //ファイル読み込み
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <?php
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
                $name = $each['name'];
                $pref = $each['pref'];
                $gender = $each['seibetu'];
                $age = $each['age'];
                $grade = $each['grade_name'];
                $section = $each['section_name'];
            }
        ?>
        <form method='post' action='update02.php'>
            <table border="1" style="border-collapse:collapse;">
                <tr>
                    <th>社員ID</th>
                    <td><?php echo $id;?></td>
                </tr>
                <!--名前-->
                <tr>
                    <td>名前</td>
                    <td><input type="text" name="namae" size="30"></td>
                </tr>
                <!--出身地-->
                <tr>
                    <th>出身地</th>
                    <td></td>
                </tr>
            </table>
        </form>

        <pre>
        <?php
        var_dump($result);
        ?>
        </pre>
        <a href="./detail01.php"> <input type=submit value=" 完了 "></a>
        <input type=reset value=" リセット ">
    </body>
</html>
