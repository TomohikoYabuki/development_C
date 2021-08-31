<!DOCTYPE html>
<link rel="stylesheet" href="../include/style.css">
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>情報詳細画面</title>
        <script type="text/javascript">
            function goDel(id){
                if(window.confirm('削徐を行います。よろしいですか？')){
                    location.href = "./delete01.php?member_ID=" + id;
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
            //index.phpから受け取ったidを変数に入れる

            if(isset($_GET['member_ID']) && !empty($_GET['member_ID'])){
                $id = $_GET['member_ID'];
                //名前検索で詳細を表示
                $query_str_02 = "SELECT member.member_ID, member.name, member.pref, member.seibetu, member.age, grade_master.grade_name, section1_master.section_name
                                 FROM member LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                                 LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                                 WHERE member_ID = '$id'";

                try{
                    $sql = $pdo->prepare($query_str_02);                // PDOオブジェクトにSQLを渡す
                    $sql->execute();                                    // SQLを実行する
                    $result = $sql->fetchAll();
                }catch(PDOException $e){
                    header('Location:../include/error.php');
                }
                ?>

            <pre>
                <?php //var_dump($result);?>
            </pre>

            <?php
                //echo $result['name'];

                if(isset($result) && !empty($result)){
                      $pref = $result[0]['pref'];
                      $gender = $result[0]['seibetu'];?>
                      <div class="output" id="tbl-bdr">
                          <?php include("../include/output.php");?>
                      </div><?php
                }else{
                    header('Location:../include/error.php');
                }
          }else{
              header('Location:../include/error.php');
          }
        ?>

        <div class="btn">
            <a href="./entry_update01.php?member_ID=<?php echo $id;?>"><input class="btn_style" type=submit value="編集"></a>
            <input class="btn_style" type="button" value="削除" onclick="goDel(<?php echo $id;?>)">
        </div>
    </body>
</html>
