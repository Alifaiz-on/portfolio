<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $title     = trim($_POST['title'] ?? '');
    $goal      = trim($_POST['goal'] ?? '');

    if (!$firstName || !$email) {
        echo json_encode(["status" => "error", "message" => "Missing fields"]);
        exit;
    }

    $to = "info@prifitcraft.net";
    $subject = "New Application Submission";

    $message  = "Name: $firstName $lastName\n";
    $message .= "Email: $email\n";
    $message .= "Title: $title\n";
    $message .= "Goal:\n$goal\n";

    $headers  = "From: info@prifitcraft.net\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    mail($to, $subject, $message, $headers);

    echo json_encode(["status" => "success"]);
}



