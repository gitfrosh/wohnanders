<?php
require("header.php");
require("include/basics.php");
require_once("include/config.inc.php");
?>
    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- Slider -->
            <!-- main content -->
            <div id="inhalt">
                <!-- services area -->
                <section id="services" class="clear">
                    <?php
                    $id = $_GET['id'];
                    $strSQL = " SELECT * FROM biete_table WHERE biete_id='$id' ";
                    $rs = mysql_query($strSQL);

                    if ( ! $strSQL )                        {
                        die('Ungültige Abfrage: ' . mysql_error());
                    }

                    while($row = mysql_fetch_array($rs)) {
                        // Schreibe den Wert der Spalte Vorname (der jetzt im Array $row ist)
                        echo "<article class='three_third'>";
                        echo "<h1>". $row['biete_titel'] . "</h1>";
                        echo $searchicon;
                        echo "<span class='em'>" . $row['biete_wohnraumart'] . " in Berlin - " . $row['biete_bezirk'] . "</span>";
                        echo "<p>". $row['biete_beschreibung'] . "</p>";
                        echo "<footer class='more'>" . $row['biete_name']. " " . $contactlink . "</footer>";
                    }

                    $query = "SELECT path FROM upload2 WHERE f_id = '$id'";
                    $result = mysql_query($query) or die('Error, query failed');
                    while($row = mysql_fetch_array($result)) {
                        $filePath = $row['path'];
                        echo '<img src="' . $filePath . '" width="200" /> ';
                    }

                    echo "<br><br>";
                    // Adressdaten auslesen $strasse = get_post_meta($post->ID, 'cpt_strasse_nr', true);
                    $id = $_GET['id'];
                    $strSQL = " SELECT * FROM biete_table WHERE biete_id='$id' ";
                    $rs = mysql_query($strSQL);
                    $row = mysql_fetch_array($rs);
                    $bezirk = $row['biete_bezirk'];
                    $ort = "Berlin";
                    $land = "Deutschland";
                    // Lokation Informationen zusammenfÃ¼gen
                    $adresse = $bezirk .', '.$ort.', '.$land ;
                    ?>
                    <!--                Googlemaps einbinden-->
                    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
                    <script type="text/javascript">
                        var geocoder;
                        var map;
                        jQuery(document).ready(function() {
                            initialize();
                        });
                        function initialize() {
                            geocoder = new google.maps.Geocoder();
                            var latlng = new google.maps.LatLng(-34.397, 150.644);
                            var myOptions = {
                                zoom: 13,
                                center: latlng,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            }
                            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                            codeAddress();
                        }
                        function codeAddress() {
                            var address = "<?php  echo $adresse; ?>";
                            geocoder.geocode( { 'address': address}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                    map.setCenter(results[0].geometry.location);
                                    var marker = new google.maps.Marker({
                                        map: map,
                                        position: results[0].geometry.location
                                    });
                                } else {
                                    alert("Geocode was not successful for the following reason: " + status);
                                }
                            });
                        }
                    </script>
                    <div id="map_canvas" style="width:100%; height:300px;"></div><!-- #map_canvas -->
                    <?php
                    include 'contact.php'; ?>
                    </article>
                </section>
            </div>
            <!-- / content body -->
        </div>
    </div>
<?php
include "footer.php"; ?>