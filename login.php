<?php
    include('include/coonect.php');
    @session_start();
?>

<form action="" method="post">
    <div class="container">
        <h2 class="ss">Log in</h2>
        <br>
        <div class="ut">
            <div>
                <input type="text" name="name" placeholder="Enter the Username">
            </div>
            <br>
            <div>
                <input type="password" name="password" id="password" placeholder="Enter the Password">
            </div>
            <div class="ee">

                <i class="fa-solid fa-eye"></i> Show password
                <label for="ck" class="showLabel">
                    <input type="checkbox" name="ck" id="showPassword">
                </label>
                <script>
                    const passwordInput = document.getElementById('password');
                    const showPasswordCheckbox = document.getElementById('showPassword');
                    showPasswordCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        passwordInput.type = 'text';
                    } else {
                        passwordInput.type = 'password';
                    }
                    });
                </script>

            </div>
            <div class="qq">
                <a href="forgotpassword.php">Forgot password</a>
            </div>
            <br>
            <br>
            <div class="">
                <input type="submit" value="login" name="login">
            </div>
        </div>
    </div>
</form>

<?php 
    if(isset($_POST['login'])){

        $username = $_POST['name'];
        $userpassword = $_POST['password'];

        $select_query = "select * from usersignin where username='$username'";
        $result = mysqli_query($con,$select_query);
        $rows = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);

        if($rows > 0){
            if(password_verify($userpassword,$row_data['user_password'])){
                $_SESSION['username'] = $username;
                echo "
                    <script>alert('login successfully done')</script>
                    <script>window.open('index.php','_self')</script>
                ";
            }
            else{
                echo "
                    <script>alert('login failed')</script>
                    <script>window.open('index.php','_self')</script>
                ";
            }
        }



    }
?>

