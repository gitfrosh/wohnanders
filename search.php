<?php
require_once("include/config.inc.php");

$term = strip_tags(substr($_POST['searchit'], 0, 100));
$term = mysql_real_escape_string($term); // Attack Prevention
if ($term == "")
    echo "Gib ein Suchwort ein.";
else {
    $query  = mysql_query("select * from biete_table where biete_titel like '%{$term}%' OR biete_bezirk like '%{$term}%' OR biete_beschreibung like '%{$term}%'", $dbconnection);
    $string = '';

    if (mysql_num_rows($query)) {
        while ($row = mysql_fetch_assoc($query)) {
            echo "<p>&#8226; " . '<a href="detailview.php?id=' . $row['biete_id'] . '">' . $row['biete_titel'] . '</a> ';
        }

    } else {
        $string = "Keine Treffer!";
    }


}
?>