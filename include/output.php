<?php

    include("../include/staticdatas.php");
    echo "<table>";

    foreach($result as $each){
      echo "<tr><th>社員ID</th><td>" . $each['member_ID'] . "</td></tr>";
      echo "<tr><th>名前</th><td>" . $each['name'] . "</td></tr>";
      echo "<tr><th>出身地</th><td>" . $pref_array[$pref] . "</td></tr>";
      echo "<tr><th>性別</th><td>" . $gender_array[$gender] . "</td></tr>";
      echo "<tr><th>年齢</th><td>" . $each['age'] . "</td></tr>";
      echo "<tr><th>所属部署</th><td>" . $each['section_name'] . "</td></tr>";
      echo "<tr><th>役職</th><td>" . $each['grade_name'] . "</td></tr>";
    }
    echo "</table>";
?>
