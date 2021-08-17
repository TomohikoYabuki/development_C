<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員名簿システム</title>
    </head>
    <body>
        <?php
        include("staticdatas.php");
        include("DB_access.php");
        include("header.html");
        ?>
        <br>
        <form method='post' action='index.php'>
            名前:<input type="text" name="namae"><br>
        <input type="submit" value="検索" />　
        <input type="reset" value="リセットする" />
        </form>
        <br>
      <table border="3" style="border-collapse:collapse;">
          <tr><th bgcolor='#add8e6'>社員ID</th><th bgcolor='#add8e6'>名前</th><th bgcolor='#add8e6'>部署</th><th bgcolor='#add8e6'>役職</th><th></tr>
          <?php
              $DB_DSN = "mysql:host=localhost; dbname=sishii; charset=utf8";
              $DB_USER = "webaccess";
              $DB_PW = "toMeu4rH";
              $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

              $query_str = "SELECT * FROM `member` LEFT JOIN grade_master ON grade_master.ID=member.grade_ID LEFT JOIN section1_master ON section1_master.ID=member.section_ID WHERE 1";

              $sql = $pdo->prepare($query_str);
              $sql->execute();
              $result = $sql->fetchAll();

              foreach ($result as $x) {
                  echo "<tr><td>" . $x['member_ID'] . "</td>";
                  echo "<td>" . $x['name'] . "</td>";
                  echo "<td>" . $x['section_name'] . "</td>";
                  echo "<td>" . $x['grade_name'] . "</td></tr>";
              }
          ?>
      </table>
  </body>
</html>
