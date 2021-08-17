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
        <a href="./entry_update01.php"> <input type=submit value=" 編集 "></a>
        <a href="./index.php"> <input type=submit value=" 消去 "></a>

    </body>
</html>
