<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>新規社員登録画面</title>
    <script src="../include/check.js"></script>
  </head>

  <body>
      <!--部品インクルード-->
      <?php
        include("../include/staticdatas.php");
        include("../include/DB_access.php");
        include("../include/header.html");
        ?>
      <!--入力フォーム-->
      <!--返すファイル注意-->
      <form method='post' action='../include/add_data.php' name="entryform">
          <table border="1" style="border-collapse:collapse;">
              <tr>
                  <th>名前</th>
                  <td><input type="text" name="namae" size="30"></td>
              </tr>
              <!--出身地入力フォームここから-->
              <tr>
                  <th>出身地</th>
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
              <!--性別入力フォームここから-->
              <tr>
                  <th>性別</th>
                  <td>
                      <input type="radio" name="gender" value="1" checked>男
                      <input type="radio" name="gender" value="2">女
                  </td>
              </tr>
              <!--年齢入力フォーム-->
              <tr>
                  <th>年齢</th>
                  <td><input type="num" name="age" size="2">才</td>
              </tr>
              <!--所属部署入力フォームここから-->
              <tr>
                  <th>所属部署</th>
                  <td>
                      <input type="radio" name="section" value="1" checked>第一事業部
                      <input type="radio" name="section" value="2">第二事業部
                      <input type="radio" name="section" value="3">営業
                      <input type="radio" name="section" value="4">総務
                      <input type="radio" name="section" value="5">人事
                  </td>
              </tr>
              <!--役職入力フォームここから-->
              <tr>
                  <th>役職</th>
                  <td>
                      <input type="radio" name="grade" value="1" checked>事業部長
                      <input type="radio" name="grade" value="2">部長
                      <input type="radio" name="grade" value="3">チームリーダー
                      <input type="radio" name="grade" value="4">リーダー
                      <input type="radio" name="grade" value="5">メンバー
                  </td>
              </tr>
          </table>
          <!--基本ボタン-->
          <div class="button">
              <input type="button" value="登録" onclick="check()">
              <input type="reset" value="リセット">
          </div>
      </form>
  </body>

</html>
