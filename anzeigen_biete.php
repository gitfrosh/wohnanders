<?php
include "header.php";
require_once("include/config.inc.php");
?>

<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
            <section id="services" class="last clear">
                <h1>
                    Wir Suchen!
                </h1>

                <article class="two_third">

                        <p>
                            St&ouml;bere durch die Liste und finde verf&uuml;gbaren Wohnraum in Berlin oder Gleichgesinnte,
                            die auf der Suche nach Mitbewohnern sind.

                            Die Suchfunktion rechts erleichert Dir das.
                        </p>


                </article>
                <article id="search" class="one_third lastbox">
                    <figure>
                        <img src="images/demo/300x100_search.gif" id="searchimg" align="center" width="300" height="100" alt="">
                        <figcaption>
                            <form id="searchform" method="post">
                                <input type="text" name="search_query" id="search_query" placeholder="Wonach suchst Du?" size="50"/>


                            </form>
                            <div id="display_results">
                            </div>
                        </figcaption>
                    </figure>
                </article>
            </section>

            <section id="services" class="clear">

                <?php

                $result_total   = mysql_query('SELECT COUNT(*) as `total` FROM `biete_table`');
                $row_total      = mysql_fetch_assoc($result_total);
                $gesamte_anzahl = $row_total['total'];

                $ergebnisse_pro_seite = 5;
                $gesamt_seiten        = ceil($gesamte_anzahl / $ergebnisse_pro_seite);

                if (empty($_GET['seite_nr'])) {
                    $seite = 1;
                } else {
                    $seite = $_GET['seite_nr'];
                    if ($seite > $gesamt_seiten) {
                        $seite = 1;
                    }
                }

                $limit = ($seite * $ergebnisse_pro_seite) - $ergebnisse_pro_seite;

                $result = mysql_query('SELECT * FROM biete_table ORDER BY biete_date DESC LIMIT ' . $limit . ', ' . $ergebnisse_pro_seite);
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<article class='three_third'>";
                    echo $searchicon;
                    echo "<span class='em'>" . $row['biete_wohnraumart'] . " in Berlin - " . $row['biete_bezirk'] . "</span>";
                    echo "<h2>" . '<a href="detailview.php?id=' . $row['biete_id'] . '">' . $row['biete_titel'] . ' </h2></a> ';
                    echo "<span class='am'>am " . date("d.m.Y", strtotime($row['biete_date'])) . " von " . $row['biete_name'] . " gepostet</span>";
                    echo "<hr>";
                }
                echo "<br><p align='center'>";
                for ($i = 1; $i <= $gesamt_seiten; ++$i) {
                    if ($seite == $i) {

                        echo '<a href="anzeigen_biete.php?seite_nr=' . $i . '" style="font-weight: bold;">' . $i . '</a> - ';
                    } else {
                        echo '<a href="anzeigen_biete.php?seite_nr=' . $i . '">' . $i . '</a> -  ';

                    }
                }
                echo "</p>";
                ?>

                 </article>

            </section>

    </div>
</div>
<?php
include "footer.php";
?>
