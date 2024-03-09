<?php

    include("include/coonect.php");

    @session_start();

    //this is for PHPMailer connection

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST['Next'])){

        $fraccname = $_POST['npname'];
        $fraccemail = $_POST['npemail'];
        $fraccphone = $_POST['npmobile'];

        $_SESSION['farname'] = $fraccname;        
        
        //echo $fraccname, $fraccemail, $fraccphone;

        $ck_query = "select * from usersignin where username='$fraccname' and user_email='$fraccemail' and user_mobile_no='$fraccphone'";
        $ck_result = mysqli_query($con,$ck_query);
        $ck_rows = mysqli_num_rows($ck_result);

        if($ck_rows == 0){

            echo "<script>alert('The Account is not presented')</script>";
        }
        elseif($ck_rows > 0){
            $otpse = null;
            $otpse = rand(100000,999999);

            $expiry = date("Y-m-d H:i:s",time() + 60 * 3);

            $usql = "update usersignin set reset_password = '$otpse', reset_otp_exp = '$expiry' where username = '$fraccname' ";
            $usql_result = mysqli_query($con,$usql);
         
            //echo $otpse;
            //echo "<script>alert('otp has sent : $otpse')</script>";
            //echo "<script>window.open('comnewp.php','_self')</script>";

            // PHPMailer codes to send a mail
            $mail = new PHPMailer(true);

            $mail->isSMTP();                    //isSMTP(): Set mailer to use SMTP.
            $mail->Host = 'smtp.gmail.com';     //Host: Specifies the servers.
            $mail->SMTPAuth = true;             //SMTPAuth: Enable/Disable SMTP Authentication.
            $mail->Username = 'your_email_id@gmail.com';    //Username: Specify the username.
            $mail->Password = 'your 2 step verification password/App password of gmail';            //Password: use the 2 step verification password which in the app password
            $mail->SMTPSecure = 'tls';                        //SMTPSecure: Specify encryption technique. Accepted values ‘tls’ or ‘ssl’.
            $mail->Port = 587;                 //Specify the TCP port which is to be connected. if you need to use the port 587 then the SMTPSecure should be 'tls',for 'ssl' the port is 465 

            $mail->setFrom('your_email_id@gmail.com');      // Set sender of the mail

            $mail->addAddress($fraccemail);               // Add a recipient

            $mail->isHTML(true);                //isHTML(): If passed true, sets the email format to HTML.

            $mail->Subject = "Password reset OTP";
            $mail->Body = "<p>Dear $fraccname</p>
                            <br>
                            <h2 style='text-align:center'>TASK MASTER</h2>
                            <hr>
                            <p>We received a request to reset the password for your account.</p>
                            <br>
                            <p>To reset your password the OTP has sent <br> 
                            <strong>OTP : $otpse</strong></p>
                            <strong><i>Thank you </i></strong>";

            $mail->send();
            
            echo 
            "
            <script>
                alert('OTP has been sent to your Email');
            </script>
            ";
        }
        else{
            echo "<script>alert('the inputs are invalid check your Username, Email, Mobile Number')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/entpp.png">
    <link rel="stylesheet" href="fir.css">
    <title>Document</title>
</head>
<body>
    <div class="fopgbod">
        <h2>OTP verification</h2>
        <form action="" method="post">
            <label for="otp">Enter the OTP:</label>
            <br>
            <input type="text" id="otp" name="otp" placeholder="******" required>
            <div>
                <input type="submit" class="tt" value="NEXT" name="otpcon">
            </div>
        </form>
    </div>  
</body>
</html>

<?php

if(isset($_POST['otpcon'])){

    $forusnaa = $_SESSION['farname'];
    //echo $forusnaa;
    $ck_otp_query = "select * from usersignin where username='$forusnaa'";
    $ck_otp_result = mysqli_query($con,$ck_otp_query);
    $ck_otp_rows = mysqli_num_rows($ck_otp_result);
    $otp_fe = mysqli_fetch_assoc($ck_otp_result);
    $curtime = date("Y-m-d H:i:s");
    echo $curtime;
    if($otp_fe['reset_password']==$_POST['otp']){
        if($otp_fe['reset_otp_exp']>=$curtime){

            //password null code

            $set_null = "update usersignin set user_password = NULL where username = '$forusnaa'";
            $sek_null = mysqli_query($con,$set_null);
            
            echo "<script>alert('OTP verified successfully')
            document.location.href = 'comnewp.php';
            </script> ";

        }
        else{
            
            echo "<script>alert('OTP expired')
            document.location.href = 'index.php';
            </script> ";
        }
    }
    else{
        echo "<script>alert('Wrong OTP')
            document.location.href = 'index.php';
            </script> ";
    }
}


?>