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
        ?>
        <table border="3" style="width:50%""border-collapse:collapse "border="0">
            <tr>
                <th style="width:30%"bgcolor="#add8e6">社員ID</th>
                <td></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">名前</th>
                <td>
                    <input type="text" name="name01" value="">
                </td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">出身地</th>
                <td>
                    <select name="pref">
                        <option hidden value="0">都道府県</option>
                        <?php
                            for($i=1; $i<=47; $i++){
                                echo "<option value=". $i. ">" . $pref_array[$i] . "</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th style="width:30%"bgcolor="#add8e6">性別</th>
                <td>
                    <input id='sex01' type='radio' name='seibetu01'  value='1'><label for='sex01'>男</label>
                    <input id='sex02' type='radio' name='seibetu01'  value='2'><label for='sex02'>女</label>
                </td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">年齢</th>
                <td>
                    <input type="number" name="age01"  max="80" min="16" required> 歳
                </td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">所属部署</th>
                <td>
                    <input type='radio' id='sec1' name='section01' value='1'>
                    <label for='sec1'>第一事業部</label>
                    <input type='radio' id='sec2' name='section01' value='2'>
                    <label for='sec2'>第二事業部</label>
                    <input type='radio' id='sec3' name='section01' value='3'>
                    <label for='sec3'>営業</label>
                    <input type='radio' id='sec4' name='section01' value='4'>
                    <label for='sec4'>総務</label>
                    <br>
                    <input type='radio' id='sec5' name='section01' value='5'>
                    <label for='sec5'>人事</label></td>
            </tr>
            <tr>
                <th style="width:30%"bgcolor="#add8e6">役職</th>
                <td>
                    <input type='radio' id='grd1' name='grade01' value='1'>
                    <label for='grd1'>事業部長</label>
                    <input type='radio' id='grd2' name='grade01' value='2'>
                    <label for='grd2'>部長</label>
                    <input type='radio' id='grd3' name='grade01' value='3'>
                    <label for='grd3'>チームリーダー</label>
                    <br>
                    <input type='radio' id='grd4' name='grade01' value='4'>
                    <label for='grd4'>リーダー</label>
                    <input type='radio' id='grd5' name='grade01' value='5'>
                    <label for='grd5'>メンバー</label>
                </td>
        </table>
        <a href="./detail01.php"> <input type=submit value=" 完了 "></a>
        <input type=reset value=" リセット ">
        <input type="hidden" value="119" name="member_ID">
    </body>
</html>
