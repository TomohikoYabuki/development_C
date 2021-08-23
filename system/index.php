<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員名簿システム</title>
    </head>
    <body>
        <?php
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <hr>
        <!--フォーム-->
        <form method='get' action='index.php'>
            <table border="1" style="border-collapse:collapse;">
                <!--名前検索フォーム-->
                <tr>
                    <td>名前</td>
                    <td><input type="text" name="namae" size="30"></td>
                </tr>
                <!--性別検索フォーム-->
                <tr>
                    <td>性別</td>
                    <td>
                        <select name="gender">
                            <option value="0">すべて</option>
                            <option value="1">男</option>
                            <option value="2">女</
                    </td>
                </tr>
                <tr>
                <!--部署検索フォーム-->
                    <td>部署</td>
                    <td>
                        <select name="section">
                            <option value="0">すべて</option>
                            <option value="1">第一事業部</option>
                            <option value="2">第二事業部</option>
                            <option value="3">営業</option>
                            <option value="4">総務</option>
                            <option value="5">人事</option>
                    </td>
                </tr>
                <!--役職検索フォーム-->
                <tr>
                    <td>役職</td>
                    <td>
                        <select name="grade">
                        <option value="0">すべて
                        <option value="1">事業部長
                        <option value="2">部長
                        <option value="3">チームリーダー
                        <option value="4">リーダー
                        <option value="5">メンバー
                    </td>
                </tr>
            </table><br>
            <!--基本ボタン-->
            <input type="submit" value="検索">　
            <input type="reset" value="リセットする" />
        </form>
        <hr>

        <!--php_DB-->
        <?php
            $query_str="SELECT member.member_ID, member.name, member.seibetu, grade_master.grade_name, section1_master.section_name
                        FROM member
                        LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                        LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                        WHERE 1=1";

            $where_str = "";
            $name = "";
            $gender = "";
            $section = "";
            $grade = "";

            if (isset($_GET['namae']) && !empty($_GET['namae'])) {
                $where_str .= " AND member.name LIKE '%" . $_GET['namae'] . "%'";
                //$name = $_POST['namae'];
            }
            if (isset($_GET['gender']) && !empty($_GET['gender'])) {
                $where_str .= " AND member.seibetu = '" . $_GET['gender'] . "'";
                //$gender = $_POST['gender'];
            }
            if (isset($_GET['section']) && !empty($_GET['section'])) {
                $where_str .= " AND member.section_ID = '" . $_GET['section'] . "'";
                //$gender = $_POST['section'];
            }
            if (isset($_GET['grade']) && !empty($_GET['grade'])) {
                $where_str .= " AND member.grade_ID = '" . $_GET['grade'] . "'";
                //$grade = $_POST['grade'];
            }

            //$query_str = "SELECT * FROM member WHERE 1";

            $query_str .= $where_str;

            //echo $query_str;

            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result = $sql->fetchAll();
            //$count_res=0;
            $count_res=count($result);

            echo "検索結果：" . $count_res . "件";
            ?>
            <!--テーブル-->
            <table border="3" style="border-collapse:collapse;">
            <tr>
                <th bgcolor='#add8e6'>社員ID</th>
                <th bgcolor='#add8e6'>名前</th>
                <th bgcolor='#add8e6'>部署</th>
                <th bgcolor='#add8e6'>役職</th>
            </tr>

            <?php
            if($count_res==0){
                echo "<tr><td colspan='4' style='text-align: center;'>検索結果なし</td></tr>";
            }else{
                foreach($result as $each){
                    echo "<tr><td>" . $each['member_ID'] . "</td>";
                    echo "<td><a href='detail01.php?member_ID=" . $each['member_ID'] . "'>" . $each['name'] . "</a></td>";
                    echo "<td>" . $each['section_name'] . "</td>";
                    echo "<td>" . $each['grade_name'] . "</td></tr>";
                }
            }
          echo "</table>";
        ?>

        </table>
  </body>
</html>
