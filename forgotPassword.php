<?php 
// functions.php will contain any functionalities which may be required on more than one page. 
require 'functions.php';
require 'dbfunctions.php';

$passwordUpdated = false;
$error = false;

/**
 * Handles the reset password functionality when a POST request is made and the 'resetPassword' parameter is set.
 *
 * @param array $_POST
 * @return void
 */
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['resetPassword'])) {
    // Sanitize the user's email input.
    $userEmail = htmlspecialchars($_POST['email']);
    // Generate a random string for the new password.
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    // Create the message for the password reset email.
    $message = "You are receiving this email as you have requested a new password. <br><br> Your new password is <b>$randomString</b> <br><br>Please login to your account and change your password.";
    // Attempt to send the reset email and update the user's password. 
    $sent = resetPasswordMail($userEmail, "Funzies", "Password reset", $message);
    
    if($sent) {
        // If the email was sent successfully, reset the user's password in the database.
        $passwordUpdated = resetUserPassword($con, $userEmail, sha1($randomString));
    } 
    else { 
        $error = true; 
    }
}

?>

<?php
$pagetitle = 'forgot password';
require_once 'include/header.php';
require_once 'include/navbar.php';
?>

<!-- Password Reset Section -->
<div class="container py-4 col-sm-12 col-md-12 col-lg-12 col-xl-10">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 my-4">
            <div class="row">
                <!-- Description Text -->
                <div id="forgotPassText" class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <p class="pb-3">
                        Forgot your password? No worries! Enter your email below, and a key – will be sent to your inbox. Enter the code, and regain your account!
                    </p>
                </div>
                <div id="iconDiamond" class="col-sm-12 col-md-12 col-lg-3 col-xl-3 text-center">
                    <ion-icon class="text-muted" style="font-size:120px;" name="diamond"></ion-icon>
                </div>
            </div>
            <!-- Send Verification Code Form -->
            <form id="forgotPassword" method="post">
                <label for="email">Email Address<span class="text-danger">*</span>:</label>
                <input id="password-reset" type="email" class="w-100 p-1" name="email" placeholder="Enter email" required
                    autocomplete="email" onkeyup="validate(this, patterns.email)">
                <button name="resetPassword" type="submit" class="btn btn-danger rounded-0 w-100 mt-3">Reset Password</button>
                <!-- Success message if the password was reset -->
                <?php if ($passwordUpdated) : ?>
                    <h3>Your password has been reset, please check your email inbox</h3>
                <?php endif; ?>
                <!-- Error message if there was an issue resetting the password -->
                <?php if ($error) : ?>
                    <h3>There was an error resetting your password, please try again</h3>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php  
require_once 'include/footer.php';
// End of Body //
?>