<div>
    <form action="" method="post" id="login-form">
        <div class="container">
            <h2 class="ss">Sign up</h2>
            <p>Please fill in this form to create an account.</p>
            <br>
            <div class="ut">
                <div>
                    <input type="text" name="name" placeholder="Name" required>
                </div><br>
                <div>
                    <input type="email" name="email" placeholder="Email"  required>
                </div><br>
                <div class="password-continer">
                    <input type="password" name="password" id="password" placeholder="Password"  required>
                    <!--<i class="fa-solid fa-eye"></i>-->
                </div>
                <br>
                <div class="password-continer">
                    <input type="password" name="Conpassword" id="confirmPassword" placeholder="Confirm Password" required>
                    <!--<i class="fa-solid fa-eye"></i></div><br>-->
                </div>
                <br>
                <div class="telscp">
                    <input type="tel" name="phone" placeholder="Mobile No" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </div>
                <div class="ee">

                    <i class="fa-solid fa-eye"></i> Show password
                    <label for="ck" class="showLabel">
                        <input type="checkbox" name="ck" id="showPassword">
                    </label>
                    <script>
                        const passwordInput = document.getElementById('password');
                        const confirmPasswordInput = document.getElementById('confirmPassword');
                        const showPasswordCheckbox = document.getElementById('showPassword');
                        showPasswordCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            passwordInput.type = 'text';
                            confirmPasswordInput.type = 'text';
                        } else {
                            passwordInput.type = 'password';
                            confirmPasswordInput.type = 'password';
                        }
                        });
                    </script>
                </div>
                <div>
                    <p>By creating an account you agree to our <a href="#" class="ioi">Terms & Privacy.</a></p>
                    <br>
                    <p>Already a member just <a href="index.php?signup" class="ioi">log in</a></p>
                </div>
                <br>
                <div class="">
                    <input type="submit" name="Signin" value="Sign Up">
                </div>
            </div>
        </div>
    
    </form>

</div>


<?php 
    // this for database connection
    include('include/coonect.php');

    //this is for PHPMailer connection

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';



    if(isset($_POST['Signin'])){
            //storing data from the forms 
        $frusername = $_POST['name'];
        $fremail = $_POST['email'];
        $frpassword = $_POST['password'];
        $frhashpassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $frconfpassword = $_POST['Conpassword'];
        $frphone = $_POST['phone'];

        //checking  the data for whether the username and user email are matching with database
        $ckquery = "select * from usersignin where username = '$frusername' and user_email = '$fremail'";
        $result = mysqli_query($con,$ckquery);
        $row = mysqli_num_rows($result);
        //if the query show data then data in the form is already exists in the database
        if($row>0)
        {
            echo "<script>alert('The Username and email are already exists')</script>";
        }
        //checks whether the data is matches
        elseif($frpassword!=$frconfpassword)
        {
            echo "<script>alert('Password Do not match')</script>";
        }
        //execute the code whether the both condition fails
        else
        {
            
            //insert query to insert data

            $insert_query = "insert into usersignin (username,user_email,user_password,user_mobile_no) values('$frusername','$fremail','$frhashpassword',$frphone)";
            $sql_execute = mysqli_query($con,$insert_query);
            if(!$sql_execute){
                die(mysqli_error($con));
            }
            
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

            $mail->addAddress($_POST["email"]);               // Add a recipient

            $mail->isHTML(true);                //isHTML(): If passed true, sets the email format to HTML.

            $mail->Subject = 'welcome '. $_POST['name'];
            $mail->Body = '<p>We are happy to welcome you as our member '. $_POST['name'] .',We will make sure it will be a wonder experience with us.</p><br><strong><i>Thank you </i></strong>';

            $mail->send();
            
            echo 
            "
            <script>
                alert('Sign in Successfully');
                document.location.href = 'index.php';
            </script>
            ";
            
        }
    }


?>