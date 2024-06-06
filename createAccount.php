<?php 
// Import necessary files and establish a database connection
require 'functions.php';  // Contains shared functions
require 'dbfunctions.php';  // Contains database related functions

$isValid = true;
$userExists = false;
$userCreated = false;

/**
 * Handles form submission based on the request method.
 *
 * If the request method is "POST":
 * - Checks if the "email" parameter is set in the $_POST array.
 * - Sanitizes and validates the email and password parameters.
 * - Calls the userLogin function with the sanitized email and password.
 * - If the login is successful, redirects to the account.php page.
 * - If the login fails, sets an error message.
 *
 * If the "createemail" parameter is set in the $_POST array:
 * - Creates an empty user array.
 * - Sanitizes and validates the name, surname, email, password, and contact number parameters.
 * - Hashes the password using the sha1 algorithm.
 */
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Login form submitted
    if(isset($_POST["email"])) {
        // Sanitize and store input values
        $email = htmlspecialchars(addslashes($_POST['email'])); 
        $password = htmlspecialchars(addslashes($_POST['password']));

        // Attempt to login the user
        if(userLogin($con, $email, $password)) {
            // Redirect to account page upon successful login
            header("Location: account.php"); 
        }
        else
        {
            // Set error message for incorrect credentials
            $error = "Incorrect email or password, try again!";
        }
        // Account creation form submitted
    } else if (isset($_POST["createemail"])) {
        // Sanitize and store input values
        $user = [];
        $user['Name'] = htmlspecialchars(addslashes($_POST['name']));
        if(preg_match($pattern['name'], $user['Name'])!= 1) {
            $isValid = false;
        }

        $user['Surname'] = htmlspecialchars(addslashes($_POST['surname']));
        if(preg_match($pattern['surname'], $user['Surname'])!= 1) {
            $isValid = false;
        }

        $user['Email'] = htmlspecialchars(addslashes($_POST['createemail']));
        if(preg_match($pattern['email'], $user['Email'])!= 1) {
            $isValid = false;
        }

        $user['Password'] = htmlspecialchars(addslashes($_POST['createpassword']));
        if(preg_match($pattern['password'], $user['Password'])!= 1) {
            $isValid = false;
        }
        $user['Password'] = sha1($_POST['createpassword']);

        $user['ContactNumber'] = htmlspecialchars(addslashes($_POST['contactnumber']));
        if(preg_match($pattern['contactnumber'], $user['ContactNumber'])!= 1) {
            $isValid = false;
        }
        if($isValid) {

            // Check if user already exists
            if(!CheckUserExists($con, $user['Email'])) {
                // Create a new user
                $user['ID'] = createUser($con, $user);
                if($user['ID'] > 0) {
                    // Set UserCreated to true
                    $userCreated = true;
                }
            }
            else{
                // If user already exists, set userExists to true
                $userExists = true;
            }
        }
    }
}
?>

<?php
$pagetitle = 'create login';
require_once 'include/header.php';  // Includes the header part of the HTML
require_once 'include/navbar.php';
?>

<div class="container py-4 col-sm-12 col-md-12 col-lg-10 col-xl-10">
    <div class="row d-flex justify-content-center">
        <!-- Account Creation and Login Section -->
        <div id="createAccLeft" class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <!-- Sign Up Tab -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-signup" role="tabpanel"
                    aria-labelledby="pills-signup-tab" tabindex="0">

                    <!-- Sign Up Form -->
                    <form id="SignUpform" class="p-4" method="post">
                        <h1>Sign Up</h1>
                        <?php if(!$userCreated) : ?>
                        <div class="row">
                            <div class="col">
                                <label for="name-input">Name<span class="text-danger">*</span></label>
                                <input class="w-100 p-1 mb-2" type="text" id="name-input" name="name" placeholder="Name"
                                    onkeyup="validate(this, patterns.name)" required autocomplete="name">
                            </div>
                            <div class="col">
                                <label for="surname-input">Surname<span class="text-danger">*</span></label>
                                <input onkeyup="validate(this, patterns.surname)" class="w-100 p-1 mb-2" type="text"
                                    id="surname-input" name="surname" placeholder="Surname" required
                                    autocomplete="surname">
                            </div>
                        </div>

                        <label for="contactnumber">Contact Number<span class="text-danger">*</span></label>
                        <input class="w-100 p-1 mb-2" onkeyup="validate(this, patterns.contactnumber)" type="text"
                            id="contactnumber-input" name="contactnumber" placeholder="Contact Number" required
                            autocomplete="contactnumber">
                        <div class="contact-number-requirements">
                            <p><strong>Must Be 8 digits only.</strong></p>
                        </div>
                        <label for="email-input">Email<span class="text-danger">*</span></label>
                        <input class="w-100 p-1 mb-2" onkeyup="validate(this, patterns.email)" type="email"
                            id="email-input" name="createemail" placeholder="Email" required autocomplete="email">
                        <div class="email-requirements">
                            <p><strong>Email must meet the following criteria:</strong></p>
                            <ul>
                                <li>Must contain the "@" symbol.</li>
                                <li>Must have a valid domain name (e.g., example.com).</li>
                            </ul>
                        </div>
                        <label for="password-input">Password<span class="text-danger">*</span></label>
                        <input class="w-100 p-1 mb-2" onkeyup="validate(this, patterns.password)" type="password"
                            id="password-input" name="createpassword" placeholder="Password" required
                            autocomplete="new-password">
                        <div class="password-requirements">
                            <p><strong>Password must contain at least:</strong></p>
                            <ul>
                                <li>One lowercase letter</li>
                                <li>One uppercase letter</li>
                                <li>One digit</li>
                                <li>One special character from [@$!%*?&]</li>
                            </ul>
                            <p><strong>Must have a minimum length of 8 characters.</strong></p>
                        </div>

                        <p>By clicking Sign Up, you are agreeing to our <a class="text-decoration-none"
                                href="terms.php">Terms and Conditions</a>.</p>
                        <!-- Signup submit button -->
                        <button class="w-100 btn btn-danger rounded-0">Sign Up</button>

                        <?php else : ?>
                        <h2>User has been created, you can now login!</h2>
                        <?php endif; ?>
                        <?php if ($userExists) : ?>
                        <!-- Display message if user already exists -->
                        <h2 class="mt-3">User Already Exists!</h2>
                        <?php endif; ?>
                    </form>
                </div>

                <!-- Log In Tab -->
                <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab"
                    tabindex="0">
                    <!-- Log In Form -->
                    <form class="p-4" method="post">
                        <h1>Log In</h1>

                        <label for="email-input">Email address: <span class="text-danger">*</span></label>
                        <input class="w-100 rounded-0 border-1 p-1" type="email" name="email" id="email-input" required
                            autocomplete="email">

                        <label class="mt-2" for="password-input">Password: <span class="text-danger">*</span></label>
                        <input class="w-100 p-1 rounded-0 border-1" type="password" name="password" id="password-input"
                            required autocomplete="current-password">
                        <!-- Login submit button -->
                        <button class="w-100 my-3 btn btn-danger rounded-0">Log In</button>

                        <?php
                        if(!empty($error)) {
                            // Display error message
                            echo '<div class="container" style="margin-left: auto; margin-right: auto;">
                            <p style="text-align:center;color:red;">' 
                            . $error . 
                            '</p></div>';
                        }
                        ?>

                        <div class="row">
                            <div class="col-6">
                                <a class="text-danger text-decoration-none" href="forgotPassword.php">Forgot
                                    password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Section with Information and Toggle Buttons -->
        <div id="createAccRight" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 p-4"
            style="height: 400px;">
            <!-- Additional Information and Toggle Buttons for Sign Up and Log In -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 py-2">
                        <p>Waking up the Hive... Get ready to explore!</p>
                        <hr>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <!-- Sign Up Toggle Button -->
                                <button class="btnRegister btn btn-danger rounded-0 active"
                                    style="display:none; width:120px;" id="pills-signup-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-signup" type="button" role="tab" aria-controls="pills-signup"
                                    aria-selected="true" onclick="buttonSwitch('signup')">Sign Up</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <!-- Log In Toggle Button -->
                                <button class="btnLogin btn btn-danger rounded-0" style="width:120px;"
                                    id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login"
                                    type="button" role="tab" aria-controls="pills-login" aria-selected="false"
                                    onclick="buttonSwitch('login')">Log In</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  
    require_once 'include/footer.php';
    // End of Body //
?>