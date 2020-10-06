<!-- 

<body class="text-center">
    <div class="container">
        <form class="form-signin" action="../Actions/login.php" method="POST">
            <img class="mb-4 mt-5" src="https://www.logolynx.com/images/logolynx/2f/2f3480d89dab7a9a372c77857c9604d9.png" alt="logo" width="72" height="72">
            <h1 class="h3 mb-3 mt-5 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>
    </div>
</body>

 -->

<?php 
if(isset($_SESSION['register'])){
    $msg = $_SESSION['register'];
    unset($_SESSION['register']);
    }else{
        $msg = '';
    }
$output = '
<div class="main ">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
            <div class="signin-image">
                        <figure><img src="' .URLROOT . '../public/images/signup.jpg" alt="sing up image"></figure>
                        <a href="register" class="signup-image-link">Create an account</a>
                    </div>
                <div class="signup-form">'.$msg.'
                    <h2 class="form-title">Log In</h2>
                    <form method="POST" class="register-form" id="login-form" action="">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Email Address" />
                            '
                            .$data['email_err'].
                            '
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                            '
                            .$data['pass_err'].
                            '
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="facebook"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="twitter"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="google+"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>';
$styles = '<link rel="stylesheet" href="' . URLROOT .'/public/css/fonts/material-icon/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href=" '. URLROOT . '/public/css/register.css">';
include_once VIEW_ROOT .'layout.html.php';
?>
