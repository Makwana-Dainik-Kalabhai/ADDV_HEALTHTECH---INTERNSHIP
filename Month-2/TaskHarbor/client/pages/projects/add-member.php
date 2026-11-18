<dialog class="dialog" id="addMemberDialog">

    <div class="dialog-header">
        <h1 class="dialog-title">Add new member with task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
    </div>

    <form action="" method="post" class="add-member-form">
        <input type="text" value="<?php echo $_GET["id"]; ?>" class="project-id" name="projectId" hidden />
        <input type="text" value="<?php echo USER["user_id"]; ?>" name="managerId" hidden />

        <div class="dialog-body text-start">
            <label for="team-member" class="form-label mb-2 fs-sm">Member</label>

            <select name="employeeId" class="team-member-options form-control fs-sm" id="team-member" required>
            </select>

            <div class="card mt-5 p-2">
                <h6 class="fw-semibold fg-danger text-center">Task Details</h6>

                <div class="row m-0">
                    <div class="col-12">
                        <label for="title" class="form-label mb-2 fs-sm">Title</label>
                        <input type="text" name="title" class="form-control fs-sm" id="title" placeholder="Task Title" required />
                    </div>
                </div>

                <div class="row m-0 mt-3">
                    <div class="col-12">
                        <label for="description" class="form-label mb-2 fs-sm">Description</label>
                        <textarea name="description" id="description" class="form-control fs-sm" placeholder="Description" required></textarea>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-6 mt-3">
                        <label for="start_date" class="form-label mb-2 fs-sm">Start Date</label>
                        <input type="date" name="start_date" class="form-control fs-sm" value="<?php echo date("Y-m-d"); ?>" required />
                    </div>
                    <div class="col-6 mt-3">
                        <label for="due_date" class="form-label mb-2 fs-sm">Due Date</label>
                        <input type="date" name="due_date" class="form-control fs-sm" value="<?php echo date("Y-m-d"); ?>" required />
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-6 mt-3">
                        <label for="priority" class="form-label mb-2 fs-sm">Priority</label>
                        <select name="priority" class="form-control fs-sm">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high" selected>High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    <div class="col-6 mt-3">
                        <label for="status" class="form-label mb-2 fs-sm">Status</label>
                        <select name="status" class="form-control fs-sm">
                            <option value="todo" selected>Todo</option>
                            <option value="in_progress">In Progress</option>
                            <option value="review">Review</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog-footer">
            <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
            <input type="submit" class="btn-solid theme-primary" value="Save changes" />
        </div>
    </form>
</dialog>

<script>
    $(document).ready(async function() {
        <?php include(BASE_PATH . "/api/add-team-member.js"); ?>
    });
</script>

<?php
include(BASE_PATH . "/toaster.php");
?>