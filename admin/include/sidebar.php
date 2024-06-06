<?php 
$user = $_SESSION['USER'];
$fullname = $user['Name']." ".$user['Surname'];
?>

<!-- Sidebar -->
<div class="col-2">
    <!-- Sidebar Container: Full height, sticky positioning -->
    <div class="d-flex flex-column position-sticky top-0 py-4" style="height: 90vh"> 
        <!-- Navigation Links Section -->
        <div class="list-group list-group-flush"> 
            <!-- Links for different management sections -->
            <a href="../admin/user-management.php" class="list-group-item" style="background-color: transparent;">User Management</a>
            <a href="../admin/role-management.php" class="list-group-item" style="background-color: transparent;">Role Management</a>
            <a href="../admin/brand-management.php" class="list-group-item" style="background-color: transparent;">Brand Management</a>
            <a href="../admin/category-management.php" class="list-group-item" style="background-color: transparent;">Category Management</a>
            <a href="../admin/product-management.php" class="list-group-item" style="background-color: transparent;">Product Management</a>
            <a href="../admin/order-management.php" class="list-group-item" style="background-color: transparent;">Order Management</a>
        </div>

        <!-- Admin Info and Sign-out Section -->
        <div class="mt-auto col-sm-8 col-md-8 col-lg-9 col-xl-9 text-center">
            <!-- Display admin name and sign-out button -->
            <h5><?php echo $fullname;?></h5>
            <p><a href="../admin/admin-logout.php" class="btn btn-primary w-100">Sign Out</a></p>
        </div>
    </div>
</div>
