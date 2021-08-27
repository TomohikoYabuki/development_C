<!DOCTYPE html>
<link rel="stylesheet" href="../include/style.css">
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
      <form method='post' action='add_data.php' name="mainform">
          <div class="output" id="tbl-bdr">
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
                              <?php
                                  for($i=1; $i<=47; $i++){
                                      echo "<option value=". $i. ">" . $pref_array[$i] . "</option>";
                                  }
                              ?>
                          </select>
                      </td>
                  </tr>

                  <!--性別入力フォームここから-->
                  <tr>
                      <th>性別</th>
                      <td>
                          <label><input type="radio" name="gender" value="1" checked>男</label>
                          <label><input type="radio" name="gender" value="2">女</label>
                      </td>
                  </tr>

                  <!--年齢入力フォーム-->
                  <tr>
                      <th>年齢</th>
                      <td><input type="number" name="age" value="<?php echo $age;?>" max="99" min="1" required> 才</td>
                  </tr>
                  <!--所属部署入力フォームここから-->
                  <tr>
                      <th>所属部署</th>
                      <td>

                          <label><input type="radio" name="section" value="1" checked>第一事業部</label>
                          <label><input type="radio" name="section" value="2">第二事業部</label>
                          <label><input type="radio" name="section" value="3">営業</label>
                          <label><input type="radio" name="section" value="4">総務</label>
                          <label><input type="radio" name="section" value="5">人事</label>
                      </td>
                  </tr>
                  <!--役職入力フォームここから-->
                  <tr>
                      <th>役職</th>
                      <td>
                          <label><input type="radio" name="grade" value="1" checked>事業部長</label>
                          <label><input type="radio" name="grade" value="2">部長</label>
                          <label><input type="radio" name="grade" value="3">チームリーダー</label>
                          <label><input type="radio" name="grade" value="4">リーダー</label>
                          <label><input type="radio" name="grade" value="5">メンバー</label>
                      </td>
                  </tr>
              </table>
          </div>

          <!--基本ボタン-->
          <div class="btn">
              <!--
                登録を押すとcheck()の関数に飛ぶ
                check()はcheck.jsにある
                -->
              <input class="btn_style" type="button" value="登録" onclick="check()">
              <input class="btn_style" type="reset" value="リセット">
          </div>

      </form>
  </body>

</html>
