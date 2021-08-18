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
                <?php
                    $DB_DSN = "mysql:host=localhost; dbname=sishii; charset=utf8";
                    $DB_USER = "webaccess";
                    $DB_PW = "toMeu4rH";
                    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);
                ?>
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
        </table>
        </div>
            <a href="./entry_update01.php"> <input type=submit value=" 編集 "></a>
            <input type="button" value="削除" onclick="goDel(ID);">
    </body>
</html>
