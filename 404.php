<?php 
// functions.php will contain any functionalities which may be required on more than one page. 
require 'functions.php';
require 'dbfunctions.php';

$pagetitle = '404 Page Not Found';
require_once 'include/header.php';
require_once 'include/navbar.php';

?>

<!-- 404 not found -->
<div class="container col-sm-12 col-md-12 col-lg-6 col-xl-6 spacing-my" style="height:15em;">
    <div class="row">
        <div class="col-3">
        <ion-icon style="width:200px; height:10em;" class="text-danger align-middle" name="warning"></ion-icon>
        </div>
        <div class="col-9">
            <p> </p>
        <h1 class="text-danger fw-bold">ERROR-404</h1>
    <p class="fs-5">Page not found. Sorry about that!</p>
        </div>
    </div>
</div>

<!-- Including Brand Section -->
<?php 
require_once 'include/footer.php';
// End of Body //
?>