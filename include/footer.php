<?php require_once 'include/navbar-cart-sidebar.php' ?>
<footer class="text-center text-lg-start bg-light text-muted py-2 border-top border-5 border-danger">
    <!-- Footer Section -->
    <div class="container align-items-center col-sm-12 col-md-12 col-lg-10 col-xl-10">
        <div class="row">
            <!-- Logo Section -->
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-2 py-2">
                <a href="index.php"><img class="footerLogo" src="img/logo.png" alt="logo"></a>
            </div>

            <!-- Help and Support Links Section -->
            <div id="footerHelp" class="col-sm-12 col-md-12 col-lg-4 col-xl-5">
                <ul class="list-unstyled">
                    <li><b>Help & Support</b></li>
                    <li><a href="contact.php" class="text-decoration-none text-muted">Contact Us</a></li>
                    <li><a href="terms.php" class="text-decoration-none text-muted">Terms & Conditions</a></li>
                    <li><a href="privacy.php" class="text-decoration-none text-muted">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Social Media Icons Section -->
            <div id="footerIcos" class="col-sm-12 col-md-12 col-lg-5 col-xl-5 py-4">
                <b>Find Us:</b><br>
                <a href="https://www.facebook.com/" target="_blank" class="text-decoration-none text-muted">
                    <ion-icon size="large" name="logo-facebook"></ion-icon>
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="text-decoration-none text-muted">
                    <ion-icon size="large" name="logo-instagram"></ion-icon>
                </a>
                <a href="https://twitter.com/" target="_blank" class="text-decoration-none text-muted">
                    <ion-icon size="large" name="logo-twitter"></ion-icon>
                </a>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="row bg-light border-top pt-3">
            <div class="col">
                <p> Copyright &copy; <?php echo date("Y") ?> Funzies Collection. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Custom JavaScript for specific website behavior -->
<script src="js/javascript.js"></script>
<!-- Ionicons for iconography -->
<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
<script src="js/regex.js"></script>
</body>

</html>
