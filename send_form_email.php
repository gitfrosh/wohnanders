<?php
require_once("include/config.inc.php");
$id = $_GET['id'];
$strSQL = " SELECT biete_email FROM biete_table WHERE biete_id='$id' ";
$rs = mysql_query($strSQL);
$row = mysql_fetch_array($rs);

if(isset($_POST['email'])) {



    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_to = $row['biete_email'];

    $email_subject = "Your email subject line";





    function died($error) {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo "These errors appear below.<br /><br />";

        echo $error."<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        die();

    }



    // validation expected data exists

    if(!isset($_POST['first_name']) ||

        !isset($_POST['last_name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['telephone']) ||

        !isset($_POST['comments'])) {

        died('We are sorry, but there appears to be a problem with the form you submitted.');

    }



    $first_name = $_POST['first_name']; // required

    $last_name = $_POST['last_name']; // required

    $email_from = $_POST['email']; // required

    $telephone = $_POST['telephone']; // not required

    $comments = $_POST['comments']; // required



    $error_message = "";

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {

        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';

    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {

        $error_message .= 'The First Name you entered does not appear to be valid.<br />';

    }

    if(!preg_match($string_exp,$last_name)) {

        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';

    }

    if(strlen($comments) < 2) {

        $error_message .= 'The Comments you entered do not appear to be valid.<br />';

    }

    if(strlen($error_message) > 0) {

        died($error_message);

    }

    $email_message = "Form details below.\n\n";



    function clean_string($string) {

        $bad = array("content-type","bcc:","to:","cc:","href");

        return str_replace($bad,"",$string);

    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";

    $email_message .= "Last Name: ".clean_string($last_name)."\n";

    $email_message .= "Email: ".clean_string($email_from)."\n";

    $email_message .= "Telephone: ".clean_string($telephone)."\n";

    $email_message .= "Comments: ".clean_string($comments)."\n";





// create email headers

    $headers = 'From: '.$email_from."\r\n".

        'Reply-To: '.$email_from."\r\n" .

        'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers);

    ?>


    <?php
    include "header.php";
    ?>

    <!-- content -->
    <div class="wrapper row2">
        <div id="container" class="clear">
            <!-- main content -->
            <div id="homepage">
                <!-- services area -->
                <section id="services" class="clear">
                    <!-- article 1 -->
                    <article class="three_third">
                        <h1>Vielen Dank!</h1>

                        <h2>
                            Deine Kontaktanfrage wurde gestellt. Viel Gl&uuml;ck!
                        </h2>

                    </article>

                </section>

            </div>

        </div>
    </div>
    <?php
    include "footer.php";
    ?>


<?php

}

?>