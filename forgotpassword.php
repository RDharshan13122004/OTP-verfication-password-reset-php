<?php

    include("include/coonect.php");

    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Master</title>
    <link rel="icon" href="./img/entpp.png">
    <link rel="stylesheet" href="fir.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="fopgbod">
        <div>
            <h1>Account Recovery</h1> 
            <br>
            <p>
                To help keep your account safe, Task master wants to make sure that it's
                really you trying to sign in 
            </p>
            <form action="sendotp.php" method="post">
                <label for="">
                    <h3>Username:</h3>
                </label>
                <input type="text" name="npname" id="npname" placeholder="Enter your Username" required>
                <br>
                <label for="">
                    <h3>Email:</h3>
                </label>
                <input type="email" name="npemail" id="npemail" placeholder="Enter your Email" required>
                <br>
                <label for="">
                    <h3>Mobile number:</h3>
                </label>
                <input type="tel" name="npmobile" id="npmobile" placeholder="Enter your Mobile Number" required>
                <div class="check">
                    <input type="submit" class="tt" value="NEXT" name="Next">
                </div>
                
            </form>
        </div>


    </div>
</body>
</html>