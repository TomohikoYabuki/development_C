<!DOCTYPE html>
<link rel="stylesheet" href="../include/style.css">
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報編集画面</title>
    <script src="../include/check.js"></script>
    <!--        function disp(id){
            	if(window.confirm('編集を終了しますか？')){
            		//document.updateform.submit(id);
                    location.href="./update02.php?member_ID=" + id;
            	}
            }
        </script>-->
    </head>

    <body>
        <?php
        //ファイル読み込み
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
        ?>
        <?php
            $id = $_GET['member_ID'];
            //名前検索で詳細を表示
            $query_str = "SELECT * FROM member WHERE member_ID = '$id'";
            #echo $query_str_02;
            $sql = $pdo->prepare($query_str);                // PDOオブジェクトにSQLを渡す
            $sql->execute();                                    // SQLを実行する
            $result = $sql->fetchAll();

            //$idから取得したデータを変数に格納
            foreach($result as $each){
                $name = $each['name'];
                $pref = $each['pref'];
                $gender = $each['seibetu'];
                $age = $each['age'];
                $grade = $each['grade_ID'];
                $section = $each['section_ID'];
            }
        ?>
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
                        <td><input type="text" name="namae" size="30" value="<?php echo $name;?>"></td>
                    </tr>
                    <!--出身地-->
                    <tr>
                        <th>出身地</th>
                        <td>
                            <select name="pref">
                                <!--初期値設定-->
                                <option hidden value="<?php echo $pref;?>"><?php echo $pref_array[$pref];?></option>
                                <?php
                                    for($i=1; $i<=47; $i++){
                                        echo "<option value=". $i. ">" . $pref_array[$i] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!--性別-->
                    <tr>
                        <th>性別</th>
                        <td>
                            <!--$genderが1だったら"男"に"checked"を出力する方法で初期値設定-->
                            <label><input type="radio" name="gender" value="1"<?php if($gender==1){echo "checked";}?>>男</label>
                            <label><input type="radio" name="gender" value="2"<?php if($gender==2){echo "checked";}?>>女</label>
                        </td>
                    </tr>
                    <!--年齢-->
                    <tr>
                        <th>年齢</th>
                            <td><input type="number" name="age" value="<?php echo $age;?>" max="99" min="1" required> 才</td>
                    </tr>
                    <!--所属部署-->
                    <tr>
                        <th>所属部署</th>
                        <td><input type='radio' id='sec1' name='section' value='1'<?php if($section==1){echo "checked";}?>><label for='sec1'>第一事業部</label>
                            <input type='radio' id='sec2' name='section' value='2'<?php if($section==2){echo "checked";}?>><label for='sec2'>第二事業部</label>
                            <input type='radio' id='sec3' name='section' value='3'<?php if($section==3){echo "checked";}?>><label for='sec3'>営業</label>
                            <input type='radio' id='sec4' name='section' value='4'<?php if($section==4){echo "checked";}?>><label for='sec4'>総務</label>
                            <input type='radio' id='sec5' name='section' value='5'<?php if($section==5){echo "checked";}?>><label for='sec5'>人事</label>
                        </td>
                    </tr>
                    <!--役職-->
                    <tr>
                        <th>役職</th>
                        <td><input type='radio' id='grd1' name='grade' value='1'<?php if($grade==1){echo "checked";}?>><label for='grd1'>事業部長</label>
                            <input type='radio' id='grd2' name='grade' value='2'<?php if($grade==2){echo "checked";}?>><label for='grd2'>部長</label>
                            <input type='radio' id='grd3' name='grade' value='3'<?php if($grade==3){echo "checked";}?>><label for='grd3'>チームリーダー</label>
                            <input type='radio' id='grd4' name='grade' value='4'<?php if($grade==4){echo "checked";}?>><label for='grd4'>リーダー</label>
                            <input type='radio' id='grd5' name='grade' value='5'<?php if($grade==5){echo "checked";}?>><label for='grd5'>メンバー</label>
                        </td>
                    </tr>

                </table>
            </div>
        </form>

        <div class="btn">
            <input class="btn_style" type="button" value="更新" onclick="check()">
            <input class="btn_style" type="reset" value="リセット">
        </div>
    </body>
</html>
