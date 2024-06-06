<?php require '../functions.php'; 
require '../dbfunctions.php'; 

// Check if the form has been submitted for deleting a role
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['roleIDDelete'])) {
    $id = htmlspecialchars(addslashes($_POST['roleIDDelete']));
    $deleteRole = deleteRole($con, $id);
} 
// If form submitted to create a new role
else if($_SERVER['REQUEST_METHOD'] == "POST" && empty($_POST['roleID'])) {
    $name = htmlspecialchars(addslashes($_POST['roleName'])); 
    $details = htmlspecialchars(addslashes($_POST['roleDetails']));
    $createRole = createRole($con, $name, $details);
} 
// If form submitted to update an existing role
else if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['roleID'])) {
    $id = htmlspecialchars(addslashes($_POST['roleID']));
    $name = htmlspecialchars(addslashes($_POST['roleName'])); 
    $details = htmlspecialchars(addslashes($_POST['roleDetails']));
    $updateRole = updateRole($con, $id, $name, $details);
}

$roles = GetRoles($con); // Retrieve list of roles from the database
?>

<?php 
$pagetitle = 'role management';
require_once 'include/header.php'; // Header Include: HTML header setup
require_once 'include/navbar.php'; // Navbar Include: Site navigation bar
?>

<div class="container-fluid col-10">
    <div class="row justify-content-between">
        <?php require_once 'include/sidebar.php'; //Contains the sidebar with navigation links ?>

        <div class="col p-4 shadow-sm bg-white">
            <!-- Role Management Section -->
            <h4>Role Management</h4>
            <!-- New Role Creation: Button to trigger form for adding new roles -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                onclick="clearModalRoleFields();">
                Add New Role
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <!-- Hidden Role ID -->
                                <input type="hidden" name="roleID" id="roleID"></input>
                                <!-- Role Name -->
                                <label class="w-100" for="roleName">Role Name<span class="text-danger">*</span>:</label>
                                <input class="w-100 mt-2 p-2" type="text" id="roleName" name="roleName" required>
                                <br>
                                <!-- Role Desc -->
                                <label class="w-100 mt-2" for="roleDetails">Role Details<span
                                        class="text-danger">*</span>:</label>
                                <input class="w-100 mt-2 p-2" type="text" id="roleDetails" name="roleDetails" required>

                            </div>
                            <!-- Buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- PHP To gather the following role details from the database -->
            <table class="table">
                <!-- Role Data Table -->
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through each role and display in the table -->
                    <?php foreach($roles as $role):?>
                    <tr>
                        <td><?php echo $role["ID"]; ?></td>
                        <td><?php echo $role["Name"]; ?></td>
                        <td><?php echo $role["Details"]; ?></td>
                        <td style="width:100px;">
                            <form method="POST">
                                <input type="hidden" id="roleIDDelete" name="roleIDDelete"
                                    value='<?php echo $role["ID"]; ?>'></input>
                                <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    onclick='setModalRoleFields("<?php echo $role["ID"]; ?>", "<?php echo $role["Name"]; ?>", "<?php echo $role["Details"]; ?>")'>Edit</button>
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

<?php require_once 'include/footer.php'; // Contains the footer information ?>
