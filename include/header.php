<?php

$incorrectLoginSidebar = false;

/**
 * Handles the login functionality for the sidebar form.
 *
 * If the request method is POST and the "sideBarLogin" parameter is set to "true" and not empty,
 * it retrieves the email and password from the POST data and sanitizes them.
 *
 * It then calls the userLogin function with the database connection, email, and password as parameters.
 * If the login is successful, it redirects the user to the account.php page.
 * If the login fails, it sets the $incorrectLoginSidebar variable to true and assigns an error message to $errorSidebar.
 *
 * @param array $con The database connection object.
 * @param string $email The email address entered by the user.
 * @param string $password The
 */
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST["sideBarLogin"]) && $_POST["sideBarLogin"] == "true") {
    // Sanitize and capture the email and password input from the user.
    $email = htmlspecialchars(addslashes($_POST['email']));
    $password = htmlspecialchars(addslashes($_POST['password']));

    // Attempt to log the user in using the userLogin function.
    if(userLogin($con, $email, $password)) {
        //this will direct the user to the account page
        header("Location: account.php"); 
    }
    else
    {
        // If login fails, set error message.
        $incorrectLoginSidebar = true;
        $errorSidebar = "Incorrect email or password, try again!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funzies - <?php echo $pagetitle ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- JQuery for interactive components -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JavaScript for responsive design and components -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
