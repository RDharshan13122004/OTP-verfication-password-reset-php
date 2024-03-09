<?php
    include("include/coonect.php");

    session_start();

    //echo $_SESSION['farname'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/entpp.png">
    <link rel="stylesheet" href="fir.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<div class="fopgbod">

<div>
    <h1>Account Recovery Configuration</h1> 
    <?php
        $forusna = $_SESSION['farname'];
        $sel_email = "select * from usersignin where username = '$forusna'";
        $sel_rr = mysqli_query($con,$sel_email);
        $sel_row = mysqli_num_rows($sel_rr);
        $sel_da = mysqli_fetch_assoc($sel_rr);
        if($sel_row > 0){
            echo "ACCOUNT : <strong>".$sel_da['username']."</strong><br><br>";
            echo $sel_da['user_email'] ;
        }
    ?>
    <br>
    <p>
       Change the new password 
    </p>
    <form action="" method="post">
        <div class="password-continer">
            <input type="password" name="Newpassword" id="password" placeholder="Enter the Password"  required>
            <!--<i class="fa-solid fa-eye"></i>-->
        </div>
        <div class="password-continer">
            <input type="password" name="Conpassword" id="confirmPassword" placeholder="Re-enter to Confirm Password" required>
            <!--<i class="fa-solid fa-eye"></i></div><br>-->
        </div>
        <br>
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
        <div class="check">
            <input type="submit" class="tt" value="Confirm" name="resetpassword">
        </div>
        
    </form>
</div>
</body>
</html>

<?php
    if(isset($_POST['resetpassword'])){

        
        $nwpassword = $_POST['Newpassword'];
        $frnwpassword = password_hash($_POST['Newpassword'],PASSWORD_DEFAULT);
        $confnewpass = $_POST['Conpassword'];

        $success = 0 ;
        $stop = 0;

        $forusnaa = $_SESSION['farname'];
        $sel_eemail = "select * from usersignin where username = '$forusnaa'";
        $sel_rrs = mysqli_query($con,$sel_eemail);
        $sel_rows = mysqli_num_rows($sel_rrs);
        $sel_das = mysqli_fetch_assoc($sel_rrs);

        $reset_email = $sel_das['user_email'];

        if($nwpassword!=$confnewpass){

            echo "<script>alert('Password Do not match')</script>";

        }
        elseif($sel_rows > 0){
            $resetpass_sql = "update usersignin set user_password = '$frnwpassword' where username = '$forusnaa' and user_email = '$reset_email'";
            $reset_sql_result = mysqli_query($con,$resetpass_sql);

            $success = 1;
            $stop = 1;

            if($success == 1){

                $resetpass_sql = "update usersignin set reset_password = NULL, reset_otp_exp = NULL where username = '$forusnaa' ";
                $reset_sql_result = mysqli_query($con,$resetpass_sql);

                if($stop == 1){
                    echo "<script>alert('Password has been reset')</script> ";
                    include("logout.php");
                }

            }
        }
        else{

            echo "<script>alert('There maybe a server issue try again')</script> ";
        }

    }

?>