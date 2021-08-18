<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>登録情報</title>
  </head>
  <body>
      <?php
          //ファイル読み込み
          include("header.html");
          include("staticdatas.php");
          include("DB_access.php");

          //データ格納
          $name = $_POST['namae'];
          $pref = $_POST['pref'];
          $gender = $_POST['gender'];
          $age = $_POST['age'];
          $section = $_POST['section'];
          $grade = $_POST['grade'];

          //SQL文
          $query_str = "INSERT INTO `member` (`member_ID`, `name`, `pref`, `seibetu`, `age`, `section_ID`, `grade_ID`) VALUES (NULL, '$name','$pref','$gender','$age', '$section','$grade');";
          echo $query_str;
          /*
          $sql = $pdo->prepare($query_str_01);
          $sql->execute();
          */
      ?>
  </body>
 </html>
