<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <title> Sign In </title>
</head>
<body>
    <div class="login-container">
        <div class="left">
            <h1> Essentials </h1>
            <h3> Your one stop shop </h3>
            <img src="../images/login-icon.png" alt="">
            <div class="sign-up-container">
                <p class="arrow"> &#8594;</p>
                <a href=""> Sign up </a>

            </div>

        </div>
        <div class="right">
            <h1> Sign in to Your Account </h1>
            <h3> Let's get you right back where you left off </h3>
            <form action="../controllers/loginController.php" method="POST">
                <div class="login-box">
                    <span class="icon"><i class="fa-solid fa-at"></i></span>
                    <input type="text" name="Email" placeholder="Email">
    
                </div>
    
                <div class="login-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="text" name="Password" placeholder="Password">
    
                </div>
                <div class="remember">
                    <label for="remember-me-checkbox">
                        <input type="checkbox" id="remember-me-checkbox" name="remember-me">
                        Remember Me
                    </label>
                    <a href=""> Forgot Password? </a>
                </div>
                
                <button type="submit" name="login" class="login-btn"> Log In </button>

            </form>

        </div>
    </div>
    
</body>
</html>