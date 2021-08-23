<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報編集画面</title>
        <script type="text/javascript">
            function disp(){
            	if(window.confirm('編集を終了しますか？')){
            		location.href = "detail01.php";
            	}else{
            		window.alert('キャンセルされました');
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
            $id = $_GET['member_ID'];
            //名前検索で詳細を表示
            $query_str_02 = "SELECT member.member_ID, member.name, member.pref, member.seibetu, member.age, grade_master.grade_name, section1_master.section_name
                             FROM member LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                             LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                             WHERE member_ID = '$id'";
            #echo $query_str_02;
            $sql = $pdo->prepare($query_str_02);                // PDOオブジェクトにSQLを渡す
            $sql->execute();                                    // SQLを実行する
            $result = $sql->fetchAll();
            foreach($result as $each){
                $name = $each['name'];
                $pref = $each['pref'];
                $gender = $each['seibetu'];
                $age = $each['age'];
                $grade = $each['grade_name'];
                $section = $each['section_name'];
            }
        ?>
        <form method='post' action='update02.php'>
            <table border="1" style="border-collapse:collapse;">
                <tr>
                    <th>社員ID</th>
                    <td><?php echo $id;?></td>
                </tr>
                <!--名前-->
                <tr>
                    <td>名前</td>
                    <td><input type="text" name="namae" size="30" value="<?php echo $name;?>"></td>
                </tr>
                <!--出身地-->
                <tr>
                    <th>出身地</th>
                    <td>
                        <select name="pref">
                            <option hidden value="0"><?php echo $pref_array[$pref];?></option>
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
                        <label><input type="radio" name="gender" value="1" checked>男</label>
                        <label><input type="radio" name="gender" value="2">女</label>
                        <?php
                            echo $gender;
                        ?>
                    </td>
                </tr>
                <!--年齢-->
                <tr>
                    <th>年齢</th>
                        <td><input type="number" name="age" value="20" max="99" min="1" required> 才</td>
                </tr>
                <!--所属部署-->
                <tr>
                    <th>所属部署</th>
                    <td><input type='radio' id='sec1' name='section' value='1' checked ><label for='sec1'>第一事業部</label><input type='radio' id='sec2' name='section01' value='2'><label for='sec2'>第二事業部</label><input type='radio' id='sec3' name='section01' value='3'><label for='sec3'>営業</label><input type='radio' id='sec4' name='section01' value='4'><label for='sec4'>総務</label><input type='radio' id='sec5' name='section01' value='5'><label for='sec5'>人事</label>            </td>
                </tr>
                <!--役職-->
                <tr>
                    <th>役職</th>
                    <td><input type='radio' id='grd1' name='grade01' value='1' checked ><label for='grd1'>事業部長</label><input type='radio' id='grd2' name='grade01' value='2'><label for='grd2'>部長</label><input type='radio' id='grd3' name='grade01' value='3'><label for='grd3'>チームリーダー</label><input type='radio' id='grd4' name='grade01' value='4'><label for='grd4'>リーダー</label><input type='radio' id='grd5' name='grade01' value='5'><label for='grd5'>メンバー</label>            </td>
                </tr>

            </table>
        </form>

        <pre>
        <?php
        var_dump($result);
        ?>
        </pre>
        <a href="./detail01.php"> <input type=submit value=" 完了 "></a>
        <input type=reset value=" リセット ">
        <input type="hidden" value="119" name="member_ID">
    </body>
</html>
