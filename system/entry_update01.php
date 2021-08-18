<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>情報詳細画面</title>
    <script type="text/javascript">
            function disp(){
            	if(window.confirm('編集を終了しますか？')){
            		location.href = "detail01.php";
            	}
            	else{
            		window.alert('キャンセルされました');
            	}
            }
                </script>
    </head>
    <body>
        <?php
            include("../include/staticdatas.php");
            include("../include/DB_access.php");
            include("../include/header.html");
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
                          <option value="1">北海道</option>
                          <option value="2">青森県</option>
                          <option value="3">岩手県</option>
                          <option value="4">宮城県</option>
                          <option value="5">秋田県</option>
                          <option value="6">山形県</option>
                          <option value="7">福島県</option>
                          <option value="8">茨城県</option>
                          <option value="9">栃木県</option>
                          <option value="10">群馬県</option>
                          <option value="11">埼玉県</option>
                          <option value="12">千葉県</option>
                          <option value="13">東京都</option>
                          <option value="14">神奈川県</option>
                          <option value="15">新潟県</option>
                          <option value="16">富山県</option>
                          <option value="17">石川県</option>
                          <option value="18">福井県</option>
                          <option value="19">山梨県</option>
                          <option value="20">長野県</option>
                          <option value="21">岐阜県</option>
                          <option value="22">静岡県</option>
                          <option value="23">愛知県</option>
                          <option value="24">三重県</option>
                          <option value="25">滋賀県</option>
                          <option value="26">京都府</option>
                          <option value="27">大阪府</option>
                          <option value="28">兵庫県</option>
                          <option value="29">奈良県</option>
                          <option value="30">和歌山県</option>
                          <option value="31">鳥取県</option>
                          <option value="32">島根県</option>
                          <option value="33">岡山県</option>
                          <option value="34">広島県</option>
                          <option value="35">山口県</option>
                          <option value="36">徳島県</option>
                          <option value="37">香川県</option>
                          <option value="38">愛媛県</option>
                          <option value="39">高知県</option>
                          <option value="40">福岡県</option>
                          <option value="41">佐賀県</option>
                          <option value="42">長崎県</option>
                          <option value="43">熊本県</option>
                          <option value="44">大分県</option>
                          <option value="45">宮崎県</option>
                          <option value="46">鹿児島県</option>
                          <option value="47">沖縄県</option>
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
    </body>
</html>
