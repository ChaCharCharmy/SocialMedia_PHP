<?php
$defAddress = null;

// Iterate through each address in the userAddresses array.
foreach($userAddresses as $address) {
    // Check if the current address is marked as the default address.
    if($address["Def"]) {
        // If it is default, set defAddress to the current address.
        $defAddress = $address;
    }
}
?>

<h3 class="border-bottom border-2 border-danger pb-2">Profile Overview</h3>
<div class="card-body">
    <!-- Profile Image and User Details -->
    <div class="row align-items-center">
        <div class="col-sm-7 col-md-8 col-lg-9">
            <!-- Display the user's name and surname -->
            <h4><?php echo $user["Name"] . " " . $user["Surname"]?></h4>
            <!-- Display the date the user joined -->
            <p><strong>Joined:</strong> <?php echo $user["Joined"]?></p>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="mt-4">
        <h5>Default Shipping Address</h5>
        <!-- Check if a default address exists -->
        <?php if($defAddress != null) : ?>
        <!-- Display the default address details -->
        <address>
            <?php echo $defAddress["Name"] . " " . $defAddress["Surname"] ?>
            <br><?php echo $defAddress["Street"] ?>
            <br><?php echo $defAddress["City"] ?>
            <br><?php echo $defAddress["ZipCode"] ?>
            <br><?php echo $defAddress["Region"] ?>
        </address>
        <?php else : ?>
            <!-- Display message: no addresses are available -->
            You have no addresses!
        <?php endif; ?>
    </div>
</div>
