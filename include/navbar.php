<nav class="bg-light py-2 shadow-sm border-bottom border-5 border-danger">
    <!-- Main Navigation Bar -->
    <div class="container container-sm container-md container-lg container-xl container-xxl ">
        <div class="row text-muted align-items-center">
            <!-- Navbar Logo -->
            <div id="navLogo" class="col-sm-1 col-md-3 col-lg-2 col-xl-2 text-start py-1">
                <a href="index.php"><img class="navLogo" src="img/logo.png" alt="Website Logo"></a>
            </div>

            <!-- Account, Wishlist, and Shopping Cart Icons -->
            <div id="navSearchbar" class="col-sm-12 col-md-12 col-lg-7 col-xl-7 py-2 align-items-center">
                <div class="d-flex">
                    <label for="searchInput" class="visually-hidden">Search</label>
                    <input id="searchInput" class="border border-1 border-muted w-100 px-2" type="search"
                        placeholder="Search" aria-label="Search">
                    <button class="btn btn-danger rounded-0" type="button" onclick="window.location.href = 'shop.php?search=' + $('#searchInput').val();">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
            </div>
            <!-- Account Icon: Shows login button if not logged in, button becomes a link to the account page if logged in -->
            <div id="navAccount" class="col-sm-11 col-md-12 col-lg-3 col-xl-3 text-end align-self-center">
                <!-- Account Login Button and Sidebar -->
                <?php 
                /**
                 * Generates HTML code for a button or a link based on the session status of the user.
                 *
                 * If the user is not logged in, a button is displayed that triggers an offcanvas login form.
                 * If the user is logged in, a link is displayed that redirects to the account page.
                 *
                 */
                if(!isset($_SESSION["USER"])) { echo 
                    '<button class="btn text-muted" type="button" data-bs-toggle="offcanvas" data-bs-target="#AccountLogin"
                    aria-controls="AccountLogin">
                    <ion-icon size="large" name="person-circle-outline"></ion-icon>
                </button>';
                } else {
                    echo '<a class="btn text-muted" href="account.php">
                        <ion-icon size="large" name="person-circle-outline"></ion-icon>
                    </button>';
                }
                ?>
                <!-- Account Login Sidebar -->
                <?php require_once 'include/navbar-account-sidebar.php'?>

                <!-- Wishlist Button -->
                <?php
                /**
                 * Generates HTML code for a button or link based on the user session status.
                 *
                 * If the user session is not set, it will generate a link to create an account.
                 * If the user session is set, it will generate a button to navigate to the wishlist.
                 *
                 */
                if(!isset($_SESSION["USER"])) { echo 
                '<a href="createAccount.php" class="btn text-muted">
                    <ion-icon style="font-size: 30px;" name="gift-outline"></ion-icon>
                </a>';
                } else {
                    echo '<button onclick="navigateToWishlist()" class="btn text-muted">
                    <ion-icon style="font-size: 30px;" name="gift-outline"></ion-icon>
                </button>';
                }?>

                <!-- Shopping Cart Button and Sidebar -->
                <button class="btn text-muted" type="button" data-bs-toggle="offcanvas" data-bs-target="#ShoppingCart"
                    aria-controls="ShoppingCart">
                    <ion-icon size="large" name="cart-outline"></ion-icon>
                </button>
            </div>

            <!-- Category Navigation for Different Screen Sizes -->
            <?php require_once 'include/navbar-categories-lg.php' // Large Screen ?>
            <?php require_once 'include/navbar-categories-sm.php' // Small Screen ?>

            <!-- Central Navigation Links -->
            <div id="navNavigation" class="col-lg-8 col-xl-8 navbar-expand mx-auto text-center">
                <ul class="navbar-nav nav-effect nav-a-width">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End of Navbar -->
</nav>
