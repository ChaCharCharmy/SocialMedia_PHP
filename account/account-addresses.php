<h3 class="border-bottom border-2 border-danger pb-2">Addresses</h3>
<!-- Section Title -->
<div class="mt-4">
    <h3 class="mb-3 product-card-font fs-5">Your Addresses</h3>
    
    <!-- Conditional check to display addresses if any exists -->
    <?php if($userAddresses->num_rows > 0) : ?>
    <!-- Address Cards Container -->
    <div class="row">
  
        <!-- Loop through each address associated with the user -->
        <?php foreach($userAddresses as $userAddress): ?>
        <div class="col-md-6 mb-2">
            <!-- Individual Address Card -->
            <div class="card shadow-sm border-0 rounded-0 address-card">
                <div class="card-body">
                    <!-- Indicate if address is the default -->
                    <?php if($userAddress["Def"]) { echo "(Default)";
                    } ?>
                    <!-- Display address name and details -->
                    <h5 class="card-title"><?php echo $userAddress["Name"] . " " . $userAddress["Surname"]; ?></h5>
                    <p class="card-text">
                        <?php echo $userAddress["Street"]; ?>
                        <br><?php echo $userAddress["City"]; ?>
                        <br><?php echo $userAddress["ZipCode"]; ?>
                        <br><?php echo $userAddress["Region"]; ?>
                    </p>
                     <!-- Edit and Delete Buttons for the Address -->
                    <a href="#" class="btn btn-primary btn-sm rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#addAddressModal" onclick="setModalAddressFields('<?php echo $userAddress['ID'] ?>', '<?php echo $userAddress['Name'] ?>', '<?php echo $userAddress['Surname'] ?>', '<?php echo $userAddress['Street'] ?>', '<?php echo $userAddress['City'] ?>', '<?php echo $userAddress['ZipCode'] ?>', '<?php echo $userAddress['Region'] ?>', '<?php echo $userAddress['Def'] ?>', <?php echo $userAddresses->num_rows ?>);">Edit</a>
                    <form method="POST">
                    <input type="submit" class="btn btn-danger w-100 btn-sm rounded-0" value="Delete"></input>
                    <input type="hidden" name="deleteAddressID" value="<?php echo $userAddress["ID"] ?>">
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else : ?>
        <!-- Message if no addresses are found -->
        <h5 class="mb-3">No addresses have been added!</h5>
    <?php endif; ?>
    <!-- Button to Open 'Add New Address' Modal -->
    <button type="button" class="btn btn-success mt-2 rounded-0" data-bs-toggle="modal" data-bs-target="#addAddressModal" onclick="clearModalAddressFields();">Add New Address</button>
    
    <!-- Modal for Adding New Address -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body with Form for New Address -->
                    <div class="modal-body">
                        <input type="hidden" id="addressID" name="addressID" value="">
                            <div class="mb-3">
                                <label for="firstname">First Name:<span class="text-danger">*</span></label>
                                <input class="w-100 p-1" type="text" id="addressfirstname" name="firstname" required autocomplete="firstname">
                            </div>
                            <div class="mb-4">
                                <label for="lastname">Last Name:<span class="text-danger">*</span></label>
                                <input class="w-100 p-1" type="text" id="addresslastname" name="lastname" required
                                    autocomplete="lastname"></div>
                            <div class="my-3">
                                <select name="region" id="region-select" class="form rounded-0 p-1" style="width: 100%;"
                                    required autocomplete="region" required>
                                    <option value="Malta" selected>Malta</option>
                                    <option value="Gozo">Gozo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address-input">Address:<span class="text-danger">*</span></label>
                                <input class="w-100 p-1" type="text" id="address-input" name="address-input" required
                                    autocomplete="address-input"></div>
                            <div class="mb-3">
                                <label for="city-input">City:<span class="text-danger">*</span></label>
                                <input class="w-100 p-1" type="text" id="city-input" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipcode-input">ZIP Code:<span class="text-danger">*</span></label>
                                <input class="w-100 p-1" type="text" id="zipcode-input" name="zipcode" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipcode-input">Make default address:</label>
                                <?php if($userAddresses->num_rows > 0) : ?>
                                    <input type="hidden" name="defaultAddress" value="false"/>
                                    <input type="checkbox" id="default-address-input" name="defaultAddress" value="true"/>
                                <?php else : ?>
                                    <input type="hidden" name="defaultAddress" value="true"/>
                                    <input type="checkbox" id="default-address-input" name="defaultAddress" value="true" checked disabled/>
                                <?php endif; ?>
                            </div>
                        
                    </div>
                    <!-- Modal Footer with Action Buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-0">Save Address</button>
                        <input type="hidden" id="addAddress" name="addAddress">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
