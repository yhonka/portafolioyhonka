<?php
 
  
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $subject = $_POST["subject"];
  $mensaje = $_POST["mensaje"];
  $body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Subjecto: " . $subject . "<br>Mensaje: " . $mensaje;

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

    require 'phpme/Exception.php';
    require 'phpme/PHPMailer.php';
    require 'phpme/SMTP.php';

    $mail = new PHPMailer(true);

    try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'yhonka.yjml@gmail.com';                     //SMTP username
    $mail->Password   = '27718080';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;  
    $mail->CharSet = 'UTF-8';                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('yhonka.yjml@gmail.com', $nombre);
       //Add a recipient
    $mail->addAddress('yhonka.yjml@gmail.com');               //Name is optional
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Cliente desde la pagina';
    $mail->Body    = $body;
   

    $mail->send();
    echo '<script>
        alert("Enviado correctamente");
        
    </script>';
    
    } catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
    
    }
    header("Location:index.html");
    
?>

 
  
  


