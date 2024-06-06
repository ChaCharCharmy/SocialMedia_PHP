<h3 class="border-bottom border-2 border-danger pb-2">Account Details</h3>
<!-- Account Details Section -->

<!-- Form to Update Full Name and Contact Number -->
<form id="accountDetails" class="form mt-3" method="POST">
    <!-- Full Name -->
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name:</label>
        <input type="text" class="form-control rounded-0" id="firstname" name="firstname" value="<?php echo $user['Name'] ?>" onkeyup="validate(this, patterns.name)" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name:</label>
        <input type="text" class="form-control rounded-0" id="lastname" name="lastname" value="<?php echo $user['Surname'] ?>" onkeyup="validate(this, patterns.surname)" required>
    </div>
    <!-- Mobile Number -->
    <div class="mb-3">
        <label for="mobilenumber" class="form-label">Mobile Number</label>
        <input type="text" class="form-control rounded-0" id="mobilenumber" name="mobilenumber" value="<?php echo $user['ContactNumber'] ?>"
        onkeyup="validate(this, patterns.contactnumber)"  required>
    </div>
    <input type="hidden" name="updateDetails">

    <!-- Submit Button for Updating Details -->
    <button class="btn btn-danger rounded-0 mb-4">Update Details</button>
</form>

<!-- Form to Update Email Address -->
<form id="accountEmail" method="POST" class="form mt-3">
    <!-- Email Address -->
    <div class="mb-3">
        <label for="emailAddress" class="form-label">Email Address</label>
        <input type="email" class="form-control rounded-0" id="emailAddress" name="emailAddress"
        onkeyup="validate(this, patterns.email)"   value="<?php echo $user['Email'] ?>" required>
    </div>
    <!-- Submit Button for Updating Email -->
    <button class="btn btn-danger rounded-0 mb-4">Update Email</button>
    <!-- Hidden input to indicate that this form is for updating email -->
    <input type="hidden" name="updateEmail">
</form>

<!-- Form to Change Password -->
<form id="accountPassword" method="POST" class="form mt-3">
    <!-- Input for current password -->
    <div class="mb-3">
        <label for="currentPassword" class="form-label">Current Password</label>
        <input type="password" class="form-control rounded-0" id="currentPassword" name="currentPassword"
            placeholder="Enter current password" required>
    </div>
    <!-- Input for new password -->
    <div class="mb-3">
        <label for="newPassword" class="form-label">New Password</label>
        <input type="password" class="form-control rounded-0" onkeyup="validate(this, patterns.password)" id="newPassword" name="newPassword"
            placeholder="Enter new password" required>
    </div>
    <!-- Input for confirming new password -->
    <div>
        <label for="confirmPassword" class="form-label">Confirm New Password</label>
        <input type="password" class="form-control rounded-0" onkeyup="validate(this, patterns.password)" id="confirmPassword" name="confirmPassword"
            placeholder="Confirm new password" required>
    </div>
    <div>
        <!-- Display message for incorrect password input -->
        <label class="form-label"><?php echo $incorrectPassword ?></label>
        <!-- Display message if the password was updated successfully -->
        <?php if($passwordUpdated) echo '<label class="form-label">Password changed successfully!</label>' ?>
    </div>
    <!-- Submit Button for Changing Password -->
    <button class="btn btn-danger rounded-0 mb-4">Change Password</button>
    <!-- Hidden input to indicate that this form is for updating the password -->
    <input type="hidden" name="updatePassword">
</form>