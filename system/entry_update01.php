<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報詳細画面</title>
    </head>
    <body>
        <?php
        include("staticdatas.php");
        include("DB_access.php");
        include("header.html");
        ?>
        <table border="1">
            <tr>
                <th>社員ID</th>
                <td>turara</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>山田</td>
            </tr>
            <tr>
                <th>出身地</th>
                <td></td>
            </tr>
            <tr>
                <th>性別</th>
                <td>♂</td>
            </tr>
            <tr>
                <th>年齢</th>
                <td>21</td>
            </tr>
            <tr>
                <th>所属部署</th>
                <td></td>
            </tr>
            <tr>
                <th>役職</th>
                <td></td>
        </table>

        <a href="./detail01.php"> <input type=submit value=" 完了 "></a>
        <input type=reset value=" 削除 ">

    </body>
</html>
