<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  $receiving_email_address = 'm4mariaoni@yahoo.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];

  $contact->from_email = 'info@mariasimeon.co.uk';
  $contact->subject = $_POST['subject'];
 
  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'mail.smtp2go.com',
    'username' => 'mariasimeon.co.uk',
    'password' => 'KkG4np2D9PZmZOkR',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $message = "Email: info@mariasimeon.com\n\n" . $_POST['message'];
$contact->add_message($message, 'Message', 10);
  $contact->add_message( $_POST['message'] . "\n\nSender's Email: " . $_POST['email'], 'Message', 10);

  echo $contact->send();
?>
