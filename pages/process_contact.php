<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Assuming composer was run in hunarhowebsite directory
require __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize input data
    $fullName = htmlspecialchars($_POST['fullName'] ?? '', ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $reason = htmlspecialchars($_POST['reason'] ?? '', ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');

    if (empty($fullName) || empty($phone) || empty($email) || empty($message)) {
        echo json_encode(["success" => false, "message" => "Please fill in all required fields."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'email-smtp.ap-south-1.amazonaws.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'AKIARNUC7I4E5LKVZB3G';
        $mail->Password   = 'BLZqHG+gXP+gIZWcpnWQ1CVBdjVrhP+YQNOO5WKCQ8D/';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('No-reply@hunarho.com', 'Hunarho Website');
        $mail->addAddress('support@hunarho.com', 'Hunarho Support');
        $mail->addCC('mayuri@hunarho.com'); // CC added as requested
        $mail->addReplyTo($email, $fullName); // Reply to the person who filled out the form

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Customer Inquiry via Hunarho Website Contact Page ' . $reason;
        
        $emailBody = "
            <p><strong>Name:</strong> {$fullName}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Reason to Connect:</strong> {$reason}</p>
            <p><strong>Message:</strong><br/>" . nl2br(htmlspecialchars($message)) . "</p>
        ";
        
        $mail->Body    = $emailBody;
        $mail->AltBody = strip_tags($emailBody);

        $mail->send();
        echo json_encode(["success" => true, "message" => "Message has been sent"]);
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
