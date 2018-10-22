<?php
    $contact = $_GET['id'];
        // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    // Required if your environment does not handle autoloading
    require __DIR__ . '/vendor/autoload.php';

    // Use the REST API Client to make requests to the Twilio REST API
    use Twilio\Rest\Client;

    // Your Account SID and Auth Token from twilio.com/console
    $sid = 'ACca17e6139fef7cacfe90180601dedd22';
    $token = '35cb606a584eada8b746be3396644cfe';
    $client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
// $client->messages->create(
//     // the number you'd like to send the message to
//     '+15417543010',
//     array(
//         // A Twilio phone number you purchased at twilio.com/console
//         'from' => '+18325010276',
//         // the body of the text message you'd like to send
//         'body' => 'Hey an investor have shown interest on your farm, check our website or call our office to know more!'
//     )
// );

// -------------send an email-----------------
// the message
$msg = "Hey an investor have shown interest on your farm, check our website or call our office to know more!";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$email = $_GET['mail'];

$subject = "An investor is ready to grant your loan";

// send email
mail($email, $subject ,$msg);

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'babakamimowon@gmail.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

    //Content
    $mail->Subject = 'Here is the subject';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

    header("location: index.php?status=200");
