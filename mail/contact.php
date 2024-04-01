<?php
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $m_subject = strip_tags(htmlspecialchars($_POST['subject']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    $emptyname  = false;
    $emptyemail   = false;
    $emptysubject   = false;
    $emptymessage  = false;
    $emailErrorr  = false;
    $ErrorMessage = "Invalid email format";
       //error handler validation
       if ($name == "")
       {
           $emptyname = true;
       }
       if ($email == "" || $email == " ")
       {
           $emptyemail = true;
       }
       if ($m_subject == "" )
       {
           $emptysubject = true;
       }
       if ($message == "")
       {
           $emptymessage = true;
       }
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $emailErrorr  = true;
      }
       if ($emptyname == true || $emptyemail == true || $emptysubject == true || $emptymessage == true )
       {
           echo "<div class='alert alert-danger'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <strong> All Fields are required </b> Fields must not be empty
            </div>
           ";
       }
       elseif ($emailErrorr  == true)
       {
        echo "<div class='alert alert-danger'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <strong>" . $ErrorMessage ." </b> </div>";
       }
       else
       {
        $to = "<nericalejandrino123@gmail.com>"; // Change this email to your //
        $subject = "$m_subject:  $name";
        $body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: 
                 ".$name."\n\n\nEmail: ".$email."\n\nSubject: ".$m_subject."\n\nMessage: ".$message;
        $headers ="From:".$email;
        mail($to, $subject, $body, $headers);
        echo"<div class='alert alert-success'>
        <strong>Your message has been sent. </strong>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        
        </div>
        <script>
        $('#name,#email,#subject,#message').val('');
        </script>
        ";
       }

?>
