<?php
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $message = $_POST['message'];

    $email_from = 'PhotographyArt@email.com';

    $email_subject = "New User Message";

    $email_body = "Artist Email: $email.\n".
                        "User Full Name: $fullname.\n".
                            "User Message: $message.\n".


    $to = "parishab112@gmail.com";

    $headers = "From: $email_from \r\n";

    $headers = "Reply-To: $email \r\n";

    $mail_sent = mail($to,$email_subject,$email_body,$headers);

    header("Location: contact-thanks.php");
    exit();


if ($mail_sent == false){ ?>
    <script language="javascript" type="text/javascript">
        alert('Message Did Not Send. Please Try Again Later.');
        window.location = 'contact.php';
    </script>
<?php
}
?>