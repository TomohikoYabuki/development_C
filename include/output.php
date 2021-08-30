<?php
    include("../include/staticdatas.php");
    
    echo "<table>";
    //var_dump($each);
    echo "<tr><th>社員ID</th><td>" . $result[0]['member_ID'] . "</td></tr>";
    echo "<tr><th>名前</th><td>" . $result[0]['name'] . "</td></tr>";
    echo "<tr><th>出身地</th><td>" . $pref_array[$pref] . "</td></tr>";
    echo "<tr><th>性別</th><td>" . $gender_array[$gender] . "</td></tr>";
    echo "<tr><th>年齢</th><td>" . $result[0]['age'] . "</td></tr>";
    echo "<tr><th>所属部署</th><td>" . $result[0]['section_name'] . "</td></tr>";
    echo "<tr><th>役職</th><td>" . $result[0]['grade_name'] . "</td></tr>";
    echo "</table></div>";
?>
