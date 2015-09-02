<?php
date_default_timezone_set("America/Los_Angeles");
$thaDate = date("Y-m-d");
//Connect to DB
$connect = mysqli_connect("host", "user", "pass", "db"); //Real details go here
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}
//Need php mailer
require_once 'PHPMailerAutoload.php';
$msg = "";
$result = mysqli_query($connect,"SELECT * FROM coolness");
while($row = mysqli_fetch_array($result)) {
    $date = $row['date'];
    $timestamp1 = strtotime($thaDate);
    $timestamp2 = strtotime($date);
    if ($timestamp2 - $timestamp1 == 86400) {
    // name, email, date, note
    $name = $row['name'];
    $email = $row['email'];
    $id = $row['id'];
    $noteMsg = "";
    $noteMsgAlt = "";
    if(!empty($row['note'])) {
        $note = $row['note'];
        $noteMsg = "<p>Here's the note you included for yourself when you signed up:<br />\"<em>$note</em>\"</p>";
        $noteMsgAlt = "Here's the note you included for yourself when you signed up: \"$note\"";

    }
            $mail = new PHPMailer;
            $mail->IsSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.examplehost.com';                 // Specify main and backup server
            $mail->Port = 587;                                    // Set the SMTP port
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'ex@example.com';                // SMTP username
            $mail->Password = 'examplepw';                  // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

            $mail->From = 'noreply@mailinator.com';
            $mail->FromName = 'Cluster Snack Reminders';
            $mail->AddAddress($email);  // Add a recipient

            $mail->IsHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'You are signed up to bring cluster snack tomorrow!';
            $mail->Body    = '<p>'.$name.',</p><p>This a reminder that you are responsible for bringing food for your cluster <strong>tomorrow</strong>.</p>
            '.$noteMsg.'<p>&ndash; Cluster Snack Reminders</p>';
            $mail->AltBody = ''.$name.': This is a reminder that you are responsible for bringing food for your cluster tomorrow. '.$noteMsgAlt.'
            - Cluster Snack Reminders';
               if(!$mail->Send()) {
               $msg .= "Message could not be sent. 'Mailer Error: ' . $mail->ErrorInfo <br />";

                    }

                    else {
                        mysqli_query($connect, "DELETE FROM coolness WHERE id = '$id'");
                        $msg .= 'Success.<br />';
                    }
    }

}
echo $msg;

//delete after message is sent
?>
