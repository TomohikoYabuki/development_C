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
        <?php
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
                                  foreach($pref_array as $key => $value){
                                      echo "<option value=". $key .">" . $value . "</option>";
                                  }
                              ?>
                          </select>
                      </td>
                  </tr>

                  <!--性別入力フォームここから-->
                  <tr>
                      <th>性別</th>
                      <td>
                          <?php
                              foreach($gender_array as $key => $value){
                                  echo "<label><input type='radio' name='gender' value='". $key ."'";
                                  if($key==1){
                                      echo " checked";
                                  }
                                  echo ">" . $value . "</label>";
                              }
                          ?><!--
                          <label><input type='radio' name='gender' value='1' checked>男</label>
                          <label><input type='radio' name='gender' value="2">女</label>-->
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
                          <?php
                              foreach ($section_array as $each){
                                  echo "<label><input type='radio' name='section' value='". $each['ID'] ."'";
                                  if($each['ID']==1){
                                      echo " checked";
                                  }
                                  echo ">" . $each['section_name'] . "</label>";
                              }
                          ?>
                    </td>
                  </tr>
                  <!--役職入力フォームここから-->
                  <tr>
                      <th>役職</th>
                      <td>
                          <?php
                              foreach ($grade_array as $each){
                                  echo "<label><input type='radio' name='grade' value='". $each['ID'] ."'";
                                  if($each['ID']==1){
                                      echo " checked";
                                  }
                                  echo ">" . $each['grade_name'] . "</label>";
                              }
                          ?>
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
