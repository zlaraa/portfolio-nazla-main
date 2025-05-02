<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'nazlarahma96@gmail.com';

// Include the PHP Email Form library
require '../assets/vendor/php-email-form/php-email-form.php';

// Create an instance of the PHP_Email_Form class
$contact = new $php_email_form;
$contact->ajax = true;

// Set the receiving email address
$contact->to = $receiving_email_address;

// Check if the POST variables are set before accessing them to avoid errors
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'nazlarahma96@gmail.com',
    'password' => 'nazra0907',
    'port' => '587'
);
*/

// Add messages only if corresponding fields are set in $_POST
if (isset($_POST['name'])) {
    $contact->add_message($_POST['name'], 'From');
}
if (isset($_POST['email'])) {
    $contact->add_message($_POST['email'], 'Email');
}
if (isset($_POST['message'])) {
    $contact->add_message($_POST['message'], 'Message', 10);
}

// Send the email and echo the result
echo $contact->send();
?>
