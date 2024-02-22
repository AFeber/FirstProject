<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $fname = isset($_POST['fname']) ? strip_tags(trim($_POST['fname'])) : '';
    $lname = isset($_POST['lname']) ? strip_tags(trim($_POST['lname'])) : '';
    $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])) : '';
    $ulice = isset($_POST['ulice']) ? strip_tags(trim($_POST['ulice'])) : '';
    $psc = isset($_POST['psc']) ? strip_tags(trim($_POST['psc'])) : '';
    $pnumber = isset($_POST['pnumber']) ? strip_tags(trim($_POST['pnumber'])) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

if (!empty($_POST)) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $country =  $_POST['country'];
    $ulice = $_POST['ulice'];
    $psc = $_POST['psc'];
    $pnumber = $_POST['pnumber'];
    $email = $_POST['email'];

    if (empty($fname)) {
        $errors[] = 'Není uvedeno jméno';
    }

    if (empty($lname)){
        $errors[] = 'Není uvedeno příjmení';
    }

    if (empty($country)){
        $errors[] = 'Není uvedená země';
    }

    if (empty($ulice)){
        $errors[] = 'Není uvedená ulice';
    }

    if (empty($psc)){
        $errors[] = 'Není uvedeno PSČ';
    }

    if (empty($pnumber)){
        $errors[] = 'Není uveden telefon';
    }

    if (empty($email)){
        $errors[] = 'Není uveden email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'E-mail je neplatný';
    }
}
 // If no errors, send email
 if (empty($errors)) {
    // Recipient email address (replace with your own)
    $recipient = "feber38@gmail.com";

    // Additional headers
    $headers = "From: $lname <$email>";

    // Send email
    if (mail($recipient, $fname, $headers)) {
        echo "Email zaslan!";
    } else {
        echo "Chyba! zkuste znovu pozdeji.";
    }
} else {
    // Display errors
    echo "Formular obsahuje chyby:<br>";
    foreach ($errors as $error) {
        echo "- $error<br>";
    }
}
} else {
// Not a POST request, display a 403 forbidden error
header("HTTP/1.1 403 Forbidden");
echo "You are not allowed to access this page.";
}
?>
