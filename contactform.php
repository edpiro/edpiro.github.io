<?php
session_start();

require_once(__DIR__ . '/vendor/autoload.php');

use \Mailjet\Resources;

define('API_USER', 'f5b3758c978fd6dfde7f666addf01de8');
define('API_LOGIN', '0b424744502580f7790adf8d2e6c545f');
$mj = new \Mailjet\Client(API_USER, API_LOGIN, true, ['version' => 'v3.1']);


if (!empty($_POST['f-name']) && !empty($_POST['l-name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $firstname = htmlspecialchars($_POST['f-name']);
    $lastname = htmlspecialchars($_POST['l-name']);
    $email = htmlspecialchars($_POST['email']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['message']);

    $secretKey= "6Lciqa4cAAAAAOiUgusZpm3Fc4Uuo1fKx88YBG65";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP= $_SERVER['REOMTE_ADDR'];
    // $url = "https://www.google.com/recaptcha/api/siteverify?secret="$secretKey&response=$responseKey&remoteip=$UserIP";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "deveduardopi@gmail.com",
                        'Name' => "Your site !"
                    ],
                    'To' => [
                        [
                            'Email' => "jeseduardopi@gmail.com",
                            'Name' => "Me"
                        ]
                    ],
                    'Subject' => "Demande de renseingnement",
                    'TextPart' => $email,
                    'HTMLPart' => "Tu as reçu un message du : <br>" . $firstname . " " . $lastname . "<br> Email : <br>" . $email . "<br> Objet : <br>" . $objet . "<br> Message : <br>" . $message
                    // 'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        header("Location: index.php?mailsend");
        $_SESSION['message'] = "Le message a été bien envoyé !";
    } else {
        echo "Email non valide";
        header("Location: index.php?mailsend");
        $_SESSION['message-error'] = "Désolé, une erreur est survenu.";
    }
}


//   require 'vendor/autoload.php';
//   use \Mailjet\Resources;
//   $mj = new \Mailjet\Client('f5b3758c978fd6dfde7f666addf01de8','0b424744502580f7790adf8d2e6c545f',true,['version' => 'v3.1']);
//   $body = [
//     'Messages' => [
//       [
//         'From' => [
//           'Email' => "deveduardopi@gmail.com",
//           'Name' => "Eduardo"
//         ],
//         'To' => [
//           [
//             'Email' => "deveduardopi@gmail.com",
//             'Name' => "Eduardo"
//           ]
//         ],
//         'Subject' => "Greetings from Mailjet.",
//         'TextPart' => "My first Mailjet email",
//         'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
//         'CustomID' => "AppGettingStartedTest"
//       ]
//     ]
//   ];
//   $response = $mj->post(Resources::$Email, ['body' => $body]);
//   $response->success() && var_dump($response->getData());



// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

// require 'PHPMailer-master/src/PHPMailer.php'; // Only file you REALLY need
// require 'PHPMailer-master/src/Exception.php'; // If you want to debug
// require 'PHPMailer-master/src/SMTP.php';

// // Passing `true` enables exceptions






// $firstname = $_POST['f-name'];
// $lastname = $_POST['l-name'];
// $email = $_POST['email'];
// $objet = $_POST['objet'];
// $message = $_POST['message'];
// $body = "Tu as reçu un message du : <br>" . $firstname . " " . $lastname . "<br> Email : <br>" . $email . "<br> Objet : <br>" . $objet . "<br> Message : <br>" . $message;

// $mail = new PHPMailer(true);
// // var_dump($mail);
// try {

//     //Recipients
//     $mail->setFrom($email);
//     $mail->addAddress('jeseduardopi@gmail.com');     // Add a recipient
//     $mail->addAddress('webdeveloraptor@gmail.com');               // Name is optional
//     // $mail->addReplyTo('info@example.com', 'Information');
//     $mail->addCC('cc@example.com');
//     $mail->addBCC('bcc@example.com');

//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

//     //Content
//     $mail->isHTML(true);                                  // Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = $body;
//     $mail->AltBody =  strip_tags($body);

//     $mail->send();
//     header("Location: index.php?mailsend");
//     $_SESSION['message'] = "Le message a été bien envoyé !";
// } catch (Exception $e) {
//     echo "Mail sent Error : {$mail->ErrorInfo}";
//     header("Location: index.php?mailsend");
//     $_SESSION['message-error'] = "Désolé, une erreur est survenu.";
// }



// require 'phpmailer/PHPMailerAutoload.php';

//THIS WORK ON LOCAL BUT NOT ONLINE
// $result="";
// if(isset($_POST['submit'])) {



//     $firstname = $_POST['f-name'];
//     $lastname = $_POST['l-name'];
//     $email = $_POST['email'];
//     $objet = $_POST['objet'];
//     $message = $_POST['message'];
//     $body = "Tu as reçu un message du : <br>".$firstname." ".$lastname."<br> Email : <br>".$email."<br> Objet : <br>".$objet."<br> Message : <br>".$message;

//     try {
        
//         $mail = new PHPMailer(true);
//         $mail -> isSMTP();
//         $mail -> Host = "smtp.gmail.com";
//         $mail -> Username = "webdeveloraptor@gmail.com";
//         $mail -> Password = "p14R03dj!";
//         $mail -> SMTPAuth = true;
//         $mail -> Port = 587;
//         $mail -> SMTPSecure = 'tls';
//         $mail -> setFrom($email);
//         $mail -> addAddress("jeseduardopi@gmail.com");
//         $mail -> isHTML(true);
//         $mail -> Subject = "New Message from Portfolio";
//         $mail -> Body = $body;
//         $mail -> AltBody = strip_tags($body);
//         $mail -> send();
//         header("Location: index.php?mailsend");
//         $_SESSION['message'] = "Le message a été bien envoyé !";
    
//         } catch(Exception $e) {
//             echo "Mail sent Error : {$mail-> ErrorInfo}";
//             header("Location: index.php?mailsend");
//             $_SESSION['message-error'] = "Désolé, une erreur est survenu.";
//         }
// }


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require "./vendor/autoload.php";

// $res = "";

//     if(isset($_POST['submit'])) {
//     $firstname = $_POST['f-name'];
//     $lastname = $_POST['l-name'];
//     $email = $_POST['email'];
//     $objet = $_POST['objet'];
//     $message = $_POST['message'];
//     $body = "Tu as reçu un message du : <br>".$firstname." ".$lastname."<br> Email : <br>".$email."<br> Objet : <br>".$objet."<br> Message : <br>".$message;
   

//     try {
        
//     $mail = new PHPMailer(true);
//     $mail -> isSMTP();
//     $mail -> Host = "smtp.gmail.com";
//     $mail -> Username = "webdeveloraptor@gmail.com";
//     $mail -> Password = "p14R03dj!";
//     $mail -> SMTPAuth = true;
//     $mail -> Port = 587;
//     $mail -> SMTPSecure = 'tls';
//     $mail -> setFrom($email);
//     $mail -> addAddress("jeseduardopi@gmail.com");
//     $mail -> isHTML(true);
//     $mail -> Subject = "New Message from Portfolio";
//     $mail -> Body = $body;
//     $mail -> AltBody = strip_tags($body);
//     $mail -> send();

//     header("Location: index.php?mailsend");
//     $_SESSION['message'] = "Le message a été bien envoyé !";

//     } catch(Exception $e) {
//        echo "Mail sent Error : {$mail-> ErrorInfo}";
    
//     }
// }




// if (isset($_POST['submit'])) {
//     $prenom = $_POST['prenom'];
//     $nom = $_POST['nom'];
//     $email = $_POST['email'];
//     $objet = $_POST['objet'];
//     $message = $_POST['message'];

//     $mailTo = "jeseduardopi@gmail.com";
//     $headers = "From: ".$mailFrom;
//     $txt = "Tu as reçu un mail de ".$prenom.".\n\n".$message;

//     mail($mailTo, $objet, $txt, $headers);
//     header("Location: index.php?mailsend");
// }