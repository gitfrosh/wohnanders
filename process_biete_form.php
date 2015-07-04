<?php
require_once("include/config.inc.php");

$errors = array();
// Titel prüfen
if (!empty($_POST['biete_titel'])) {
    $biete_titel = $_POST['biete_titel'];
    $pattern     = "/^[a-zA-Z0-9\_,]{2,100}/";
    if (preg_match($pattern, $biete_titel)) {
        $biete_titel = $_POST['biete_titel'];
    } else {
        $errors[] = 'Dein Anzeigentitel darf nur aus _, 1-9, A-Z oder a-z 2-20 bestehen.';
    }
} else {
    $errors[] = 'Du hast vergessen, einen Anzeigentitel einzugeben.';
}

// Name prüfen
if (!empty($_POST['biete_name'])) {
    $biete_name = $_POST['biete_name'];
    $pattern    = "/^[a-zA-Z0-9\_]{2,20}/";
    if (preg_match($pattern, $biete_name)) {
        $biete_name = $_POST['biete_name'];
    } else {
        $errors[] = 'Dein Name darf nur aus _, 1-9, A-Z oder a-z 2-20 bestehen.';
    }
} else {
    $errors[] = 'Du hast vergessen, deinen Namen anzugeben.';
}

// Beschreibung prüfen
if (!empty($_POST['biete_beschreibung'])) {
    $biete_beschreibung = $_POST['biete_beschreibung'];
    $pattern            = "/^[a-zA-Z0-9\_]{2,500}/";
    if (preg_match($pattern, $biete_beschreibung)) {
        $biete_beschreibung = $_POST['biete_beschreibung'];
    } else {
        $errors[] = 'Bitte verwende keine Sonderzeichen in der Anzeigenbeschreibung.';
    }
} else {
    $errors[] = 'Du hast vergessen, deine Anzeige zu beschreiben.';
}


// Email prüfen
if (!empty($_POST['biete_email'])) {
    $biete_email = $_POST['biete_email'];
    $pattern     = "/([0-9a-zA-Z])@(\w+)\.(\w+)/";
    if (preg_match($pattern, $biete_email)) {
        $biete_email = $_POST['biete_email'];
    } else {
        $errors[] = 'Das scheint keine gültige Emailadresse zu sein.';
    }
} else {
    $errors[] = 'Du hast vergessen, deine Emailadresse anzugeben.';
}

//End of validation

//Print Errors

if (!empty($errors)) {
    echo '<hr /><h3>Sorry, es ist ein Fehler aufgetreten:</h3><ul>';
    // Print each error.
    foreach ($errors as $msg) {
        echo '<li>' . $msg . '</li>';
    }
    echo '</ul><h2><a href="javascript:history.back()">Zur&uuml;ck?</a></h2><hr />';
} else {
    echo '<hr /><h3 align="center">Deine Anzeige ist nun online. Viel Gl&uuml;ck bei deiner Suche!</h3><hr /><p>Sieh sie Dir <a href="anzeigen_biete.php">hier</a> gleich an.. </p>';
}

if (empty($errors)) {

    $biete_titel        = ($_POST['biete_titel']);
    $biete_wohnraumart  = ($_POST['biete_wohnraumart']);
    $biete_bezirk       = ($_POST['biete_bezirk']);
    $biete_beschreibung = ($_POST['biete_beschreibung']);
    $biete_name         = ($_POST['biete_name']);
    $biete_email        = ($_POST['biete_email']);


    $eintrag = "INSERT INTO biete_table
(biete_titel, biete_wohnraumart, biete_bezirk, biete_beschreibung, biete_name, biete_email)

VALUES
('" . mysql_real_escape_string($biete_titel) . "', '" . mysql_real_escape_string($biete_wohnraumart) . "', '" . mysql_real_escape_string($biete_bezirk) . "', '" . mysql_real_escape_string($biete_beschreibung) . "', '" . mysql_real_escape_string($biete_name) . "', '" . mysql_real_escape_string($biete_email) . "');";

    $eintragen = mysql_query($eintrag) or die(mysql_error());

    $f_id = mysql_insert_id();


    $uploadDir = '/web/1/000/036/877/122726/htdocs/wohn/uploads/';


    $fileName = $_FILES['biete_bilder']['name'];
    $tmpName  = $_FILES['biete_bilder']['tmp_name'];
    $fileSize = $_FILES['biete_bilder']['size'];
    $fileType = $_FILES['biete_bilder']['type'];

    // get the file extension first
    $ext = substr(strrchr($fileName, "."), 1);

    // make the random file name
    $randName = md5(rand() * time());

    // and now we have the unique file name for the upload file
    $filePath   = $uploadDir . $randName . '.' . $ext;
    $filePathDB = "uploads/" . $randName . '.' . $ext;

    $result = move_uploaded_file($tmpName, $filePath);
    if (!$result) {
        return;
    }

    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
        $filePath = addslashes($filePath);
    }

    $query = "INSERT INTO upload2 (name, size, type, path, f_id) " . "VALUES ('$fileName', '$fileSize', '$fileType', '$filePathDB', '$f_id')";

    mysql_query($query) or die('Error, query failed : ' . mysql_error());



    mysql_close($dbconnection);
}

?>