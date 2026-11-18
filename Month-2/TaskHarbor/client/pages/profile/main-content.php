<div class="profile-container main-content mt-12">
    <div class="row rounded-5 px-1 sm:px-10">
        <div class="col-12 p-5 py-10">
            <form class="update-profile-form" method="post" id="update-profile-form">
                <div class="row">
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="name" class="form-label mb-2">Full Name</label>
                        <input value="<?php echo (isset(USER["name"])) ? USER["name"] : ""; ?>" type="text" class="form-control" name="name" id="name" placeholder="fullname" autocomplete="name" />
                    </div>
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="email" class="form-label mb-2">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo (isset(USER["email"])) ? USER["email"] : ""; ?>" readonly autocomplete="email" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="phone" class="form-label mb-2">Phone</label>
                        <input type="text" value="<?php echo (isset(USER["phone"])) ? USER["phone"] : ""; ?>" class="form-control" name="phone" id="phone" placeholder="phone" autocomplete="phone" />
                    </div>
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="role" class="form-label mb-2">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="employee" <?php echo (isset(USER["role"]) && USER["role"] == "employee") ? "selected" : ""; ?>>Employee</option>
                            <option value="manager" <?php echo (isset(USER["role"]) && USER["role"] == "manager") ? "selected" : ""; ?>>Project-Manager</option>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="emp_code" class="form-label mb-2">Employee Code</label>
                        <input type="text" value="<?php echo (isset(USER["emp_code"])) ? USER["emp_code"] : ""; ?>" class="form-control" name="emp_code" id="emp_code" placeholder="employee code" autocomplete="emp_code" />
                    </div>
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="joining_date" class="form-label mb-2">Joining Date</label>
                        <input type="date" value="<?php echo (isset(USER["joining_date"])) ? USER["joining_date"] : ""; ?>" class="form-control" name="joining_date" id="joining_date" placeholder="joining-date" />
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="department" class="form-label mb-2">Department</label>
                        <input type="text" value="<?php echo (isset(USER["department"])) ? USER["department"] : ""; ?>" class="form-control" name="department" id="department" placeholder="department" />
                    </div>
                    <div class="col-12 sm:col-6 mt-5">
                        <label for="designation" class="form-label mb-2">Designation</label>
                        <input type="text" value="<?php echo (isset(USER["designation"])) ? USER["designation"] : ""; ?>" class="form-control" name="designation" id="designation" placeholder="designation" />
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <button class="d-block w-100 btn-solid theme-danger update-profile-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php include(BASE_PATH . "/api/update-profile.js"); ?>
    });
</script>

<?php include(BASE_PATH . "/toaster.php"); ?>