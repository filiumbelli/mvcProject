<?php $styles = '<link rel="stylesheet" href="' . URLROOT . '../public/css/fonts/material-icon/css/material-design-iconic-font.min.css">' . '<link rel="stylesheet" href="' . URLROOT . '/public/css/register.css">';
?>
<?php
if (isset($_SESSION['user_id'])) {
    redirect('/users/profile');
} else {
    $output = '
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name" />
                        </div>
                        '
        . $data['name_err'] .
        '

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        '
        . $data['email_err'] .
        '
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                        </div>
                        '
        . $data['pass_err'] .
        '
                        <div class="form-group">
                            <label for="confirm-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Repeat your password" />
                        </div>
                        '
        . $data['confirm_pass_err'] .
        '
                        <div class="form-group">
                            <input type="checkbox" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="../public/images/signup.jpg" alt="sing up image"></figure>
                    <a href="login" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>';
} ?>
<?php
include_once VIEW_ROOT . 'layout.html.php';
