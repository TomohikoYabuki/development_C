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
        <form method='post' action='index.php'>
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
                        <input type="radio" name="gender" value="1" checked>男
                        <input type="radio" name="gender" value="2">女
                    </td>
                </tr>
                <tr>
                <!--部署検索フォーム-->
                    <td>部署</td>
                    <td>
                        <select name="section">
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
                        <option hidden>選択してください
                        <option value="1">事業部長
                        <option value="2">部長
                        <option value="3">チームリーダー
                        <option value="4">リーダー
                        <option value="5">メンバー
                    </td>
                </tr>
            </table>
            <!--基本ボタン-->
            <input type="submit" value="検索" />　
            <input type="reset" value="リセットする" />
        </form>
        <hr>

        <!--テーブル-->
        <table border="3" style="border-collapse:collapse;">
     <tr><th bgcolor='#add8e6'>社員ID</th><th bgcolor='#add8e6'>名前</th><th bgcolor='#add8e6'>部署</th><th bgcolor='#add8e6'>役職</th><th></tr>
        <!--php_DB-->
        <?php
            $where_str = "";
            $name = "";
            $gender = "";
            $section = "";
            $grade = "";

            if (isset($_POST['namae']) && !empty($_POST['namae'])) {
                $where_str .= " AND namae LIKE '%" . $_POST['namae'] . "%'";
                //$name = $_POST['namae'];
            }
            if (isset($_POST['gender']) && !empty($_POST['gender'])) {
                $where_str .= " AND gender = '" . $_POST['gender'] . "'";
                //$gender = $_POST['gender'];
            }
            if (isset($_POST['section']) && !empty($_POST['section'])) {
                $where_str .= " AND section = '" . $_POST['section'] . "'";
                //$gender = $_POST['section'];
            }
            if (isset($_POST['grade']) && !empty($_POST['grade'])) {
                $where_str .= " AND grade = '" . $_POST['grade'] . "'";
                //$grade = $_POST['grade'];
            }


            $query_str = "SELECT * FROM member WHERE 1";

            $query_str .= $where_str;

            echo $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            $result = $sql->fetchAll();
        ?>
          <!--ishii_test-->
        </table>
  </body>
</html>
