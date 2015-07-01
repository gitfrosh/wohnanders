<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>wohn anders</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/layout.css" type="text/css">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="http://www.summer-song.de/wohn/feed/feed.xml">
    <!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.tools.js"></script>
    <script type="text/javascript" src="scripts/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type='text/javascript' src='//code.jquery.com/jquery-1.11.2.min.js'></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <script type="text/javascript">
        (function( $ ) {

            $.fn.overlay = function( options ) {

                var overlay = "overlay";
                var overlaybackground = "overlaybg";

                var ie6 = false;
                if ($.browser.msie == true && $.browser.version == '6.0') {
                    ie6 = true;
                }

                function center_overlay_x() {
                    var browser_width = document.documentElement.offsetWidth;
                    if ((browser_width < $("#" + overlay).outerWidth() + 40) && !ie6) {
                        $("#" + overlay).css({
                            'position': 'absolute',
                            'left': '10px',
                            'margin-left': '10px'
                        })
                    } else {
                        $("#" + overlay).css({
                            'position': 'fixed',
                            'left': '50%',
                            'margin-left': - $("#" + overlay).outerWidth() / 2
                        })
                    }
                }

                function center_overlay_y() {
                    var browser_height = document.documentElement.offsetHeight;

                    if ((browser_height > $("#" + overlay).height() + 40) && !ie6) {
                        $("#" + overlay).css({
                            'position': 'fixed',
                            'top': browser_height / 2 - $("#" + overlay).height() / 2
                        })
                    } else {
                        $("#" + overlay).css({
                            'position': 'absolute',
                            'top': '20px'
                        });
                        $(window).scrollTop(0);
                    }
                }

                function overlayposition() {
                    center_overlay_x();
                    center_overlay_y();
                    if(ie6) {
                        $("#" + overlaybackground).css({
                            'position': 'absolute',
                            'width': $("body").outerWidth(),
                            'height': document.documentElement.offsetHeight
                        });
                    }
                }

                $(window).resize(function () {
                    overlayposition();
                });

                function overlayclose() {
                    $("#" + overlay + "," + "#" + overlaybackground).hide();
                }

                $(document).keydown(function (e) {
                    if(e.keyCode == 27) {
                        overlayclose();
                    }
                });

                $("#" + overlaybackground).live("click", function(){
                    overlayclose();
                });

                $("#" + overlay + " .closeoverlay").live("click", function(){
                    overlayclose();
                });

                $("#" + overlay + "," + "#" + overlaybackground).show();
                overlayposition();

            };

        })( jQuery );

    </script>


    <!--    Javascript für die Ajax-Suche-->
    <script type='text/javascript'>
        $(document).ready(function(){
            $("#search_results").slideUp();
            $("#button_find").click(function(event){
                event.preventDefault();
                search_ajax_way();
            });
            $("#search_query").keyup(function(event){
                event.preventDefault();
                search_ajax_way();
            });

        });

        function search_ajax_way(){
            $("#search_results").show();
            var search_this=$("#search_query").val();
            $.post("search.php", {searchit : search_this}, function(data){
                $("#display_results").html(data);

            })
        }
    </script>


    <!--    Javascript für den Header-Slider-->
    <script>
    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
    $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
    },  3000);
    </script>

</head>
<body>
<?php
require("include/basics.php");
?>
<div class="wrapper row1">
    <header id="header" class="clear">
        <div id="hgroup">

        </div>

        <nav class="fixed-nav-bar">

            <ul>
                <li><a href="index.php"><img src="images/logo2.png" alt="Logo"></a><a href="anzeigen_biete.php">Finde</a> <span class="em">Mitbewohner & Wohnraum</span></li>
                <li><a href="biete.php">Anzeige</a> <span class="em">schalten</span></li>
                <li><a href="blog.php">Blog</a></li>
                <li class="last"><a href="#">&uuml;ber</a></li>

            </ul>
        </nav>
    </header>
</div>