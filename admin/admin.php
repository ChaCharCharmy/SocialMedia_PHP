<?php require '../functions.php'; 
require '../dbfunctions.php'; 

// Check if the form has been submitted.
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Sanitize and capture the email and password input from the user.
    $email = htmlspecialchars(addslashes($_POST['email'])); // 'addslashes' allows the user to use brackets
    $password = htmlspecialchars(addslashes($_POST['password']));

    // Authenticate the user.
    if(adminLogin($con, $email, $password)) {
        // If login is successful, redirect to the user management page.
        header("Location: ../admin/user-management.php"); //this will direct the user to a different page
    }
    else
    {
        // If login fails, set an error message.
        $error = "Incorrect email or password, try again!";
    }
}
?>

<?php 
$pagetitle = "login";
require_once 'include/header.php'; // Header Include: HTML header setup
require_once 'include/navbar.php'; // Navbar Include: Site navigation bar
?>

<div class="container-fluid col-10">
    <!-- Main Content Area -->
    <div class="row justify-content-center shadow-sm bg-white">
        <div class="col-6" style="height:85vh;">
            <center>
                <img class="my-4 w-100" src="../img/you-shall-not-pass.gif" alt="">
                <!-- Image Display -->
            </center>

            <!-- Login Form -->
            <form class="form" method="post">
                <!-- Form setup for login details -->
                <h1>Log In</h1>

                <!-- Email Input -->
                <label for="email">Email address: <span class="text-danger">*</span></label>
                <input class="w-100 p-1" type="email" name="email" id="email" required autocomplete="email">

                <!-- Password Input -->
                <label class="mt-2" for="password">Password: <span class="text-danger">*</span></label>
                <input class="w-100 p-1" type="password" name="password" id="password" required
                    autocomplete="current-password">

                <!-- Login Button -->
                <button class="w-100 my-3 btn btn-primary">Log In</button>
            </form>

            <!-- Error message display -->
            <?php if(!empty($error)) {
                echo '<div class="container" style="margin-left: auto; margin-right: auto;">
            <p style="text-align:center;color:red;">' . $error . '</p></div>';
            } ?>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; // Contains the footer information ?>