<style>
    .project-card {
        position: relative;
        overflow: hidden;
    }

    .project-card .first-div {
        top: 0;
        height: 50%;
        width: 100%;
        position: absolute;
    }

    .project-card .second-div {
        display: flex;
        justify-content: center;
        align-items: end;
        bottom: 0;
        height: 50%;
        width: 100%;
        position: absolute;
    }

    .project-card .card:hover {
        cursor: pointer;
        scale: 0.95;
    }
</style>


<input type="text" class="user-id" value="<?php echo USER["user_id"]; ?>" hidden />
<input type="text" class="user-role" value="<?php echo USER["role"]; ?>" hidden />

<div class="row mt-10 sm:align-items-center g-4">
    <div class="col-12 sm:col-2">Filter By:</div>

    <div class="col-12 sm:col-10 text-end">
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="all">All</button>
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="planning">Planning</button>
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="active">Active</button>
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="on hold">On Hold</button>
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="completed">Completed</button>
        <button class="btn-outline theme-inverse mb-1 filter-btn" data-status="cancelled">Cancelled</button>
    </div>
</div>

<div class="row mt-10 mb-10 m-0 pb-10 pt-10 projects-grid">
</div>

<?php
if ($_COOKIE["manager_id"] == USER["user_id"]) {
    include(BASE_PATH . "/pages/projects/add-project.php");
?>
    <div class="row mt-10 mb-10 py-10 m-0">
        <button type="button" class="btn-solid theme-danger fs-sm" data-bs-toggle="dialog" data-bs-target="#addProjectDialog">
            Add new project
        </button>
    </div>

<?php } ?>


<script>
    $(document).ready(async function() {
        <?php
        include(BASE_PATH . "/api/project-list.js");
        ?>
    });
</script>

<?php
include(BASE_PATH . "/toaster.php");
?>