<?php
require_once("include/config.inc.php");
$strSQL = "SELECT * FROM biete_table ORDER BY biete_date DESC";

// Query ausführen (die Datensatzgruppe $rs enthält das Ergebnis)
$rs = mysql_query($strSQL);

// Schleifendurchlauf durch $rs
// Jede Zeile wird zu einem Array ($row), mit mysql_fetch_array
$row = mysql_fetch_array($rs);

?>

<div id="overlaybg" style="display: none;"></div>
<div id="overlay" style="display: none;">
    <div class="content">
        <p class="title">Email an <?php echo $row['biete_name']?></p>

        <?php
        echo "<b>" . '<form name="contactform" method="post" action="send_form_email.php?id='. $row['biete_id'] . '">';
        ?>

        <table width="450px">

            <tr>

                <td valign="top">

                    <label for="first_name">Vorname *</label>

                </td>

                <td valign="top">

                    <input type="text" name="first_name" maxlength="50" size="30">

                </td>

            </tr>

            <tr>

                <td valign="top" ">

                <label for="last_name ">Nachname *</label>

                </td>

                <td valign="top ">

                    <input  type="text " name="last_name " maxlength="50 " size="30 ">

                </td>

            </tr>

            <tr>

                <td valign="top ">

                    <label for="email ">Email-Addresse *</label>

                </td>

                <td valign="top ">

                    <input  type="text " name="email " maxlength="80 " size="30 ">

                </td>

            </tr>

            <tr>

                <td valign="top ">

                    <label for="telephone ">Telefonnummer</label>

                </td>

                <td valign="top ">

                    <input  type="text " name="telephone " maxlength="30 " size="30 ">

                </td>

            </tr>

            <tr>

                <td valign="top ">

                    <label for="comments ">Anfrage *</label>

                </td>

                <td valign="top ">

                    <textarea  name="comments " maxlength="1000 " cols="25 " rows="6 "></textarea>

                </td>

            </tr>

            <tr>

                <td colspan="2 " style="text-align:center ">


                    <input name="sub" type="submit" value="Absenden"/>
                </td>

            </tr>

        </table>

        </form>

        <div class="closeoverlay" title="Overlay schließen">x</div>
    </div>
