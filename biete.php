<?php
include "header.php";
?>

<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
            <section id="services" class="clear">
                <article class="three_third">
                    <h1>
                        Biete Wohnraum / Suche Mitbewohner
                    </h1>
                    <img src="images/iconmonstr-home-2-icon-80.png" alt="">
                    <p>Du suchst noch nach Mitbewohnern f&uuml;r dein Wohnprojekt in Berlin? Kein Problem! Erstelle hier
                    eine
                    <b>
                        kostenlose
                    </b>
                    Anzeige und finde Gleichgesinnte!

                    </p>
                    </article>
                    <article class="three_third">
                    <div class="Form-container">

                        <form method="POST" action="biete_check.php" enctype="multipart/form-data">


                            <div id="field3-container" class="feld">
                                <label for="field3">
                                    Titel
                                </label>
                                <input type="text" name="biete_titel" id="field3" placeholder="Gemeinschaftsprojekt in Alt-Hohensch&ouml;nhausen sucht noch Mitbewohner!" required="required">
                            </div>


                            <div id="field4-container" class="feld">
                                <label for="field4">
                                    Wohnraumart
                                </label>
                                <select name="biete_wohnraumart" id="field4" required="required">
                                    <option id="field4-1" value="Wohnprojekt/Gemeinschaftshaus">
                                        Wohnprojekt/Gemeinschaftshaus
                                    </option>
                                    <option id="field4-2" value="Familien-WG">
                                        Familien-WG
                                    </option>
                                    <option id="field4-3" value="Generationenwohnen">
                                        Generationenwohnen
                                    </option>
                                    <option id="field4-4" value="Senioren-WG">
                                        Senioren-WG
                                    </option>
                                    <option id="field4-5" value="Gemeinschaftshof/Landhaus">
                                        Gemeinschaftshof/Landhaus
                                    </option>
                                    <option id="field4-6" value="Sonstiges">
                                        Sonstiges
                                    </option>
                                </select>
                            </div>


                            <div id="field7-container" class="feld">
                                <label for="field7">
                                    Bezirk
                                </label>
                                <select name="biete_bezirk" id="field7" required="required">
                                    <option id="field7-1" value=" Kreuzberg">
                                        Kreuzberg
                                    </option>
                                    <option id="field7-2" value="Friedrichshain">
                                        Friedrichshain
                                    </option>
                                    <option id="field7-3" value="Prenzlauer Berg">
                                        Prenzlauer Berg
                                    </option>
                                    <option id="field7-4" value="Neuk&ouml;lln">
                                        Neuk&ouml;lln
                                    </option>
                                    <option id="field7-5" value="Wedding">
                                        Wedding
                                    </option>
                                    <option id="field7-6" value="Lichtenberg">
                                        Lichtenberg
                                    </option>
                                    <option id="field7-7" value="Mitte">
                                        Mitte
                                    </option>
                                    <option id="field7-8" value="Treptow">
                                        Treptow
                                    </option>
                                    <option id="field7-9" value="K&ouml;penick">
                                        K&ouml;penick
                                    </option>
                                    <option id="field7-10" value="Tempelhof-Schöneberg">
                                        Tempelhof-Sch&ouml;neberg
                                    </option>
                                    <option id="field7-11" value="Marzahn-Hellersdorf">
                                        Marzahn-Hellersdorf
                                    </option>
                                    <option id="field7-12" value="Reinickendorf">
                                        Reinickendorf
                                    </option>
                                    <option id="field7-13" value="Charlottenburg-Wilmersdorf">
                                        Charlottenburg-Wilmersdorf
                                    </option>
                                    <option id="field7-14" value="Steglitz-Zehlendorf">
                                        Steglitz-Zehlendorf
                                    </option>
                                    <option id="field7-15" value="Spandau">
                                        Spandau
                                    </option>
                                    <option id="field7-16" value="Pankow">
                                        Pankow
                                    </option>
                                    <option id="field7-17" value="egal">
                                        egal
                                    </option>
                                </select>
                            </div>


                            <div id="field9-container" class="feld">
                                <label for="field9">
                                    Beschreibung
                                </label>
                                <br>
                <textarea rows="5" cols="20" name="biete_beschreibung" id="field9" required="required">
                </textarea>
                            </div>


                            <div id="field10-container" class="feld">
                                <label for="field10">
                                    Kontaktname
                                </label>
                                <input type="text" name="biete_name" placeholder="Dein Name" id="field10" required="required">
                            </div>


                            <div id="field11-container" class="feld">
                                <label for="field11">
                                    Email-Addresse
                                </label>
                                <input type="email" name="biete_email" id="field11" placeholder="deine@email.de" required="required">
                            </div>


                            <div id="field12-container" class="feld">
                                <label for="field12">
                                    Bilder
                                </label>
                                <input type="file" name="biete_bilder" id="field14">
                            </div>


                            <div id="form-submit" class="feld submit">
                                <input name="submitted" type="submit" value="Speichern"/>

                                <input type="reset" value="Eingaben l&ouml;schen"/>
                            </div>
                        </form>
                    </div>
                </article>
            </section>
    </div>
</div>
<?php
include "footer.php";
?>

