<!DOCTYPE html>
<link rel="stylesheet" href="../include/style.css">
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報編集画面</title>
    <script src="../include/check.js"></script>
    <script>
    function editFormReset() {
        document.mainform.reset();
    }
</script>
    </head>

    <body>
        <?php
        //ファイル読み込み
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
            //var_dump($section_array);
            $section_sql = "SELECT * FROM section1_master";

            $sql = $pdo->prepare($section_sql);
            $sql->execute();
            $section_array = $sql->fetchAll();

            $grade_sql = "SELECT * FROM grade_master";

            $sql = $pdo->prepare($grade_sql);
            $sql->execute();
            $grade_array = $sql->fetchAll();
        ?>
        <?php
            $id = $_GET['member_ID'];
            //名前検索で詳細を表示
            $query_str = "SELECT * FROM member WHERE member_ID = '$id'"; //変数の文字列展開修正する
            #echo $query_str_02;
        try{
            $sql = $pdo->prepare($query_str);                // PDOオブジェクトにSQLを渡す
            $sql->execute();                                    // SQLを実行する
            $result = $sql->fetchAll();
                if(empty($result)){
                    header('Location:../include/error.php');
                }
        }catch(PDOException $e){
                header('Location:../include/error.php');
            }

        ?>
        <pre>
        <?php
        //var_dump($result);
        ?>
        </pre>
        <form method='post' action='update02.php' name="mainform">
            <div class="output" id="tbl-bdr">
                <table border="1" style="border-collapse:collapse;">
                    <tr>
                        <th>社員ID</th>
                        <td><input type="hidden" name="member_id" value="<?php echo $id;?>"><?php echo $id;?></td>
                    </tr>
                    <!--名前-->
                    <tr>
                        <th>名前</th>
                        <td><input type="text" name="namae" size="30" value="<?php echo $result[0]["name"];?>"></td>
                    </tr>
                    <!--出身地-->
                    <tr>
                        <th>出身地</th>
                        <td>
                            <select name="pref">
                                <!--初期値設定-->
                                <option hidden value="<?php echo $pref;?>"><?php echo $pref_array[$result[0]["pref"]];?></option>
                                <?php
                                    foreach($pref_array as $key => $value){
                                        echo "<option value=". $key;
                                        if($key==$result[0]["pref"]){
                                            echo " selected";
                                        }
                                        echo ">" . $value . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!--性別-->
                    <tr>
                        <th>性別</th>
                        <td>
                            <?php
                            foreach($gender_array as $key => $value){
                                echo "<label><input type='radio' name='gender' value='". $key ."'";
                                if($key==$result[0]["seibetu"]){
                                    echo " checked";
                                }
                                echo ">" . $value . "</label>";
                            }
                            ?>
                        </td>
                    </tr>
                    <!--年齢-->
                    <tr>
                        <th>年齢</th>
                            <td><input type="number" name="age" value="<?php echo $result[0]["age"];?>" max="99" min="1" required> 才</td>
                    </tr>
                    <!--所属部署-->
                    <tr>
                        <th>所属部署</th>
                        <td>
                            <?php
                                foreach ($section_array as $each){
                                    echo "<label><input type='radio' name='section' value='". $each['ID'] ."'";
                                    if($each['ID']==$result[0]["section_ID"]){
                                        echo " checked";
                                    }
                                    echo ">" . $each['section_name'] . "</label>";
                                }
                            ?>
                        </td>
                    </tr>
                    <!--役職-->
                    <tr>
                        <th>役職</th>
                        <td>
                            <?php
                                foreach ($grade_array as $each){
                                    echo "<label><input type='radio' name='grade' value='". $each['ID'] ."'";
                                    if($each['ID']==$result[0]["grade_ID"]){
                                        echo " checked";
                                    }
                                    echo ">" . $each['grade_name'] . "</label>";
                                }
                            ?>
                        </td>
                    </tr>

                </table>
            </div>
        </form>

        <div class="btn">
            <input class="btn_style" type="button" value="更新" onclick="check()">
            <input class="btn_style" type="button" value="リセット" onclick="editFormReset()">
        </div>

    </body>
</html>
