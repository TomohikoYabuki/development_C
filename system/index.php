<!DOCTYPE html>
<link rel="stylesheet" href="../include/style.css">
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員名簿システム</title>
        <script type="text/javascript">
          // フォームリセット
          function FormReset(){
            document.searchform.namae.value = "";
            document.searchform.gender.value = "0";
            document.searchform.section.value = "0";
            document.searchform.grade.value = "0";
          }
        </script>
    </head>
    <body>
        <?php
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <?php
        //初期値判定用
        if(isset($_GET['gender']) && !empty($_GET['gender'])){
            $gender_flag=$_GET['gender'];
        }else{
            $gender_flag="0";
        }

        if(isset($_GET['section']) && !empty($_GET['section'])){
            $section_flag=$_GET['section'];
        }else{
            $section_flag="0";
        }

        if(isset($_GET['grade']) && !empty($_GET['grade'])){
            $grade_flag=$_GET['grade'];
        }else{
            $grade_flag="0";
        }

        ?>
        <!--<div class="search">-->
            <!--フォーム-->
            <form method='get' action='index.php' name='searchform'>
                <div class="table">
                    <table border="0" style="border-collapse:collapse;" class="search">
                        <!--名前検索フォーム-->
                        <tr>
                            <td>名前：</td>
                            <td>
                                <input type="text" name="namae" size="30" value="<?php if(isset($_GET['namae']) && !empty($_GET['namae'])){echo $_GET['namae'];}?>">
                            </td>
                        </tr>
                        <!--性別検索フォーム-->
                        <tr>
                            <td>性別：</td>
                            <td>
                                <select name="gender">
                                    <option value="0"<?php if($gender_flag==0){echo "selected";}?>>すべて</option>
                                    <option value="1"<?php if($gender_flag==1){echo "selected";}?>>男性</option>
                                    <option value="2"<?php if($gender_flag==2){echo "selected";}?>>女性</option>
                                </selected>
                            </td>
                        </tr>
                        <tr>
                        <!--部署検索フォーム-->
                            <td>部署：</td>
                            <td>
                                <select name="section">
                                    <option value="0"<?php if($section_flag==0){echo "selected";}?>>すべて</option>
                                    <option value="1"<?php if($section_flag==1){echo "selected";}?>>第一事業部</option>
                                    <option value="2"<?php if($section_flag==2){echo "selected";}?>>第二事業部</option>
                                    <option value="3"<?php if($section_flag==3){echo "selected";}?>>営業</option>
                                    <option value="4"<?php if($section_flag==4){echo "selected";}?>>総務</option>
                                    <option value="5"<?php if($section_flag==5){echo "selected";}?>>人事</option>
                                </selected>
                            </td>
                        </tr>
                        <!--役職検索フォーム-->
                        <tr>
                            <td>役職：</td>
                            <td>
                                <select name="grade">
                                    <option value="0"<?php if($grade_flag==0){echo "selected";}?>>すべて
                                    <option value="1"<?php if($grade_flag==1){echo "selected";}?>>事業部長
                                    <option value="2"<?php if($grade_flag==2){echo "selected";}?>>部長
                                    <option value="3"<?php if($grade_flag==3){echo "selected";}?>>チームリーダー
                                    <option value="4"<?php if($grade_flag==4){echo "selected";}?>>リーダー
                                    <option value="5"<?php if($grade_flag==5){echo "selected";}?>>メンバー
                                </selected>
                            </td>
                        </tr>
                    </table>
                <!--</div>-->
                <!--基本ボタン-->
                <div class="btn">
                    <input class="btn_style" type="submit" value="検索">
                    <input class="btn_style" type="button" value="リセット" onclick=FormReset()>
                </div>
            </form>
        </div>
        <hr>

        <!--php_DB-->
        <?php
            $query_str="SELECT member.member_ID, member.name, member.seibetu, grade_master.grade_name, section1_master.section_name
                        FROM member
                        LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                        LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                        WHERE 1=1";

            $where_str = "";

            if (isset($_GET['namae']) && !empty($_GET['namae'])) {
                $where_str .= " AND member.name LIKE '%" . $_GET['namae'] . "%'";
            }
            if (isset($_GET['gender']) && !empty($_GET['gender'])) {
                $where_str .= " AND member.seibetu = '" . $_GET['gender'] . "'";
            }
            if (isset($_GET['section']) && !empty($_GET['section'])) {
                $where_str .= " AND member.section_ID = '" . $_GET['section'] . "'";
            }
            if (isset($_GET['grade']) && !empty($_GET['grade'])) {
                $where_str .= " AND member.grade_ID = '" . $_GET['grade'] . "'";
            }

            $query_str .= $where_str;

            try{
                $sql = $pdo->prepare($query_str);
                $sql->execute();
                $result = $sql->fetchAll();
                $count_res=count($result);
                if(empty($result)){
                    header('Location:./include/error.php');
                }
            }catch(PDOException $e){
                    header('Location:./include/error.php');
                }
        ?>
        <div class="output" id="tbl-bdr">
            <a class="in_out_res">検索結果：<?php echo $count_res;?> 件</a>

            <!--テーブル-->
            <table border="1" style="border-collapse:collapse;" class="output_table">
                <tr>
                    <th>社員ID</th>
                    <th>名前</th>
                    <th>部署</th>
                    <th>役職</th>
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
                ?>
            </table>
        </div>
  </body>
</html>
