<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        body{
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,0.8487044475993523) 0%, rgba(121,109,9,1) 42%, rgba(255,184,0,1) 100%);
        }
        .form {
            margin: 50px auto;
            background-color: #fff;
            display: block;
            padding: 1rem;
            max-width: 350px;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .form-title {
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 600;
            text-align: center;
            color: #000;
        }

        .input-container {
            position: relative;
        }

        .input-container input,
        .form button {
            outline: none;
            border: 1px solid #e5e7eb;
            margin: 8px 0;
        }

        .input-container input {
            background-color: #fff;
            padding: 1rem;
            padding-right: 3rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            width: 300px;
            border-radius: 0.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .input-container span {
            display: grid;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            padding-left: 1rem;
            padding-right: 1rem;
            place-content: center;
        }

        .input-container span svg {
            color: #9CA3AF;
            width: 1rem;
            height: 1rem;
        }

        .submit {
            display: block;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            background-color: #4F46E5;
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            width: 100%;
            border-radius: 0.5rem;
            text-transform: uppercase;
        }

        .signup-link {
            color: #6B7280;
            font-size: 0.875rem;
            line-height: 1.25rem;
            text-align: center;
        }

        .signup-link a {
            text-decoration: underline;
        }

        img {
            position: absolute;
            z-index: 1;
            left: -200px;
            filter: blur(3px);
            -webkit-filter: blur(3px);
            height: 400px;
            width: 400px;
        }

        .httt:hover {
            text-decoration: underline;
        }
    </style>
    <!-- jQuery UI library with shake effect -->
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha384-CLMwR7VUOe6ZKLU2UM5HMJ5IxKLfLqEGX+jFGjy79p6e/OB6NNAdmFouhdjQxdmE" crossorigin="anonymous"></script>
</head>

<body>
    <!-- PHP -->
    <?php
    $errorMsg = '';
    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $login = "SELECT * FROM `users` WHERE username = '$user' and password = '$pass' ";
        $loginQ = $mysql->query($login);

        if (mysqli_num_rows($loginQ) > 0) {
            $_SESSION["pass"] = $user;
            $_SESSION["user"] = $pass;
            echo '<script>window.location.replace("index.php");</script>';
        } else {
            $errorMsg = "Login Failed";
        }
    }
    ?>



    <div class="container indx">
        <div class="content">
            <img src="./img/MU_LOGO.png" alt="">
            <form class="form" method="POST">
                <p class="form-title">SIGN IN</p>
                <div class="input-container">
                    <input placeholder="Enter username" type="text" name="user">
                    <span>
                        <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </span>
                </div>
                <div class="input-container">
                    <input placeholder="Enter password" type="password" name="pass">
                    <span>
                        <svg stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </span>
                </div>
                <button class="submit" type="submit" name="submit">
                    Sign in
                </button>

                <p class="signup-link">
                    No account?
                    <a href="index.php">Visit the website</a>
                    directly!
                </p>
                <div class="message error" style="color: #f0f0f0;margin: 20px 0 0 0;padding: 10px;background-color:red;border-radius: 16px;"><center><?php echo $errorMsg ?></center></div>
            </form>
        </div>
    </div>
    <!-- boostrap 4 bundle with jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        if (window.location.href.indexOf("?login=success") > -1) {
            alert("Login Successful!");
        }
    });
    setTimeout(() => {
        $('.message').fadeOut();
    }, 1000);
</script>