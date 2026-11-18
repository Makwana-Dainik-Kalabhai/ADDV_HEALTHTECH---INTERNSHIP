<dialog class="dialog" id="addProjectDialog">

    <div class="dialog-header">
        <h1 class="dialog-title">Add new Project</h1>
        <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
    </div>


    <form action="" method="post" class="add-project-form">
        <div class="dialog-body text-start">
            <h6 class="fw-semibold fg-danger text-center">Project Details</h6>

            <input type="text" name="manager_id" value="<?php echo USER["user_id"]; ?>" hidden />
            <div class="row m-0">
                <div class="col-6">
                    <label for="Name" class="form-label mb-2 fs-sm">Name</label>
                    <input type="text" name="project_name" class="form-control fs-sm" id="name" placeholder="Project Name" value="Project Name" required />
                </div>
                <div class="col-6">
                    <label for="code" class="form-label mb-2 fs-sm">code</label>
                    <input type="text" name="project_code" class="form-control fs-sm" id="code" placeholder="Project Code" value="PRJ!1233" required />
                </div>
            </div>

            <div class="row m-0 mt-3">
                <div class="col-12">
                    <label for="description" class="form-label mb-2 fs-sm">Description</label>
                    <textarea name="description" id="description" class="form-control fs-sm" placeholder="Description" required>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, quis, velit officia eum cupiditate, atque dignissimos tenetur nemo sunt voluptas unde vel esse molestias ad! Laboriosam et sed quasi minima?</textarea>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-6 mt-3">
                    <label for="start_date" class="form-label mb-2 fs-sm">Start Date</label>
                    <input type="date" name="start_date" class="form-control fs-sm" value="<?php echo date("Y-m-d"); ?>" required />
                </div>
                <div class="col-6 mt-3">
                    <label for="due_date" class="form-label mb-2 fs-sm">Deadline</label>
                    <input type="date" name="deadline" class="form-control fs-sm" value="<?php echo date("Y-m-d"); ?>" required />
                </div>
            </div>

            <div class="row mt-3 m-0">
                <div class="col-12">
                    <label for="status" class="form-label mb-2 fs-sm">Status</label>
                    <select name="status" class="form-control fs-sm">
                        <option value="planning" selected>Plannig</option>
                        <option value="active">Active</option>
                        <option value="on hold">On Hold</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="dialog-footer">
            <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
            <input type="submit" class="btn-solid theme-primary" value="Save changes" data-bs-dismiss="dialog" />
        </div>
    </form>
</dialog>

<script>
    $(document).ready(async function() {
        <?php include(BASE_PATH . "/api/add-project.js"); ?>
    });
</script>

<?php
include(BASE_PATH . "/toaster.php");
?>