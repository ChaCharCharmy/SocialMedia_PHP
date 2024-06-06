<?php require '../functions.php'; 
require '../dbfunctions.php'; 

// Check if the server request is POST and if specific user ID is provided for deletion.
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['userIDDelete'])) {
    // Sanitized user input.
    $id = htmlspecialchars(addslashes($_POST['userIDDelete']));
    $deleteUser = deleteUser($con, $id);
    // Check if the server request is POST and if user details are provided for update.
} else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['userID'])) {
    $id = htmlspecialchars(addslashes($_POST['userID']));
    $name = htmlspecialchars(addslashes($_POST['userName'])); 
    $surname = htmlspecialchars(addslashes($_POST['userSurname']));
    $email = htmlspecialchars(addslashes($_POST['userEmail']));
    $number = htmlspecialchars(addslashes($_POST['userNumber']));
    $role = htmlspecialchars(addslashes($_POST['userRole']));
    // Attempt to update the user and store the result.
    $updateUser = updateUser($con, $id, $name, $email, $surname, $number, $role);
}

$roles = GetRoles($con);
$users = GetUsers($con);
?>

<!-- Functions Include: Importing shared functions for the site -->

<?php 
$pagetitle = 'user management';
require_once 'include/header.php'; // Header Include: HTML header setup
require_once 'include/navbar.php'; // Navbar Include: Site navigation bar
?>

<div class="container-fluid col-10">
    <div class="row justify-content-between">
        <?php require_once 'include/sidebar.php'; //Contains the sidebar with navigation links ?>

        <div class="col py-2 shadow-sm bg-white">
            <div class="container mt-3">
                <!-- User Management Section -->
                <h4>User Management</h4>

                <!-- Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="userModalLabel">Update User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Modal Update User Form -->
                            <form enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <!-- Name -->
                                    <input type="hidden" name="userID" id="userID"></input>
                                    <label class="w-100" for="userName">Name<span class="text-danger">*</span>:</label>
                                    <!-- Surname -->
                                    <input class="w-100 mt-2 p-2" type="text" id="userName" name="userName" required>
                                    <label class="w-100" for="userSurname">Surname<span
                                            class="text-danger">*</span>:</label>
                                    <input class="w-100 mt-2 p-2" type="text" id="userSurname" name="userSurname"
                                        required>
                                    <!-- Email -->
                                    <label class="w-100" for="userEmail">Email<span
                                            class="text-danger">*</span>:</label>
                                    <input class="w-100 mt-2 p-2" type="email" id="userEmail" name="userEmail" required>
                                    <!-- Contact Number -->
                                    <label class="w-100" for="userNumber">Contact Number<span
                                            class="text-danger">*</span>:</label>
                                    <input class="w-100 mt-2 p-2" type="text" id="userNumber" name="userNumber"
                                        required>
                                    <!-- Role -->
                                    <label class="w-100" for="userRole">Role<span class="text-danger">*</span>:</label>
                                    <select name="userRole" id="userRole" required>
                                        <?php foreach($roles as $role): ?>
                                        <option value="<?php echo $role["ID"]; ?>"><?php echo $role["Name"]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <!-- Modal Save/Close buttons -->
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <table class="table">
                        <!-- User Management Table -->
                        <thead class="thead-dark">
                            <!-- Table Header: Contains column titles -->
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Role</th>
                                <th>Joined Date</th>
                                <th>Verified</th>
                                <th>Contact Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through each user and display their details in the table -->
                            <?php foreach($users as $user):
                                ?>
                            <tr>
                                <td><?php echo $user["ID"]; ?></td>
                                <td><?php echo $user["Email"]; ?></td>
                                <td><?php echo $user["Name"]; ?></td>
                                <td><?php echo $user["Surname"]; ?></td>
                                <td><?php echo $user["roleName"]; ?></td>
                                <td><?php echo $user["Joined"]; ?></td>
                                <td><?php echo $user["Verified"]; ?></td>
                                <td><?php echo $user["ContactNumber"]; ?></td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" id="userIDDelete" name="userIDDelete"
                                            value='<?php echo $user["ID"]; ?>'></input>
                                        <button type="button" class="btn btn-primary btn-sm w-100"
                                            data-bs-toggle="modal" data-bs-target="#userModal" onclick='setModalUserFields
                            ("<?php echo $user["ID"]; ?>", 
                            "<?php echo $user["Name"]; ?>", 
                            "<?php echo $user["Surname"]; ?>", 
                            "<?php echo $user["Email"]; ?>", 
                            "<?php echo $user["ContactNumber"]; ?>", 
                            "<?php echo $user["Role"]; ?>")'>Edit</button>
                                        <button type="submit" class="btn btn-danger btn-sm w-100">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/footer.php'; // Contains the footer information ?>
