<?php
include("../../links.php");
if (!defined("USER")) {
    header("Location: ".getenv("URL")."/");
}
?>

<style>
    .task-list {
        max-height: 50vh;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    .team-members {
        scrollbar-width: thin;
    }

    .task-assignment-list {
        max-height: 100vh;
        overflow-y: auto;
        scrollbar-width: thin;
    }
</style>

<input type="hidden" class="logged-user-email" value="<?php echo USER["email"]; ?>" />


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp Projects - TaskHarbor</title>
</head>

<body>
    <div class="row m-0">

        <div class="col-0 md:col-4 xl:col-3">
            <?php include(BASE_PATH . "/components/sidebar.php"); ?>
        </div>

        <div class="col-12 md:col-8 xl:col-9">
            <?php
            include(BASE_PATH . "/components/header.php");
            ?>

            <div class="row my-10 g-5">
                <div class="col-12 lg:col-7 project-details">
                </div>


                <div class="col-12 lg:col-5">
                    <div class="card p-5 shadow">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5>Team Members</h5>
                                <h6 class="fs-md fw-semibold fg-secondary total-members"></h6>
                            </div>
                            <div class="col-6 text-end">
                                <?php
                                if (USER["role"] == "manager") { ?>
                                    <button type="button" class="btn-solid theme-danger fs-sm" data-bs-toggle="dialog" data-bs-target="#addMemberDialog">
                                        Add Member
                                    </button>
                                <?php include(BASE_PATH . "/pages/projects/add-member.php");
                                } ?>
                            </div>
                        </div>
                        <hr />

                        <div class="team-members">
                        </div>
                    </div>
                </div>
            </div>



            <div class="row mb-10">
                <div class="col-12">
                    <div class="card p-5 shadow">
                        <h5 class="fw-semibold">Task Assignments</h5>
                        <hr>
                        <div class="task-assignment-list">
                            <div class="row py-7 bg-secondary border m-0 rounded-4">
                                <div class="col-1 fw-semibold fs-xs">Member</div>
                                <div class="col-2 fw-semibold fs-xs">Title</div>
                                <div class="col-2 fw-semibold fs-xs">Description</div>
                                <div class="col-1 fw-semibold fs-xs">Priority</div>
                                <div class="col-3 fw-semibold fs-xs">Start Date --- Due Date</div>
                                <div class="col-2 fw-semibold fs-xs">Status</div>
                                <div class="col-1 fw-semibold fs-xs">Updated on</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    .sidebar a.projects {
        color: white;
        background-color: #dc3545;
    }

    .sidebar a:not(.projects):hover {
        background-color: #f2f2f2;
    }

    .team-members {
        max-height: 350px;
        overflow-y: auto;
    }

    .team-members::-webkit-scrollbar-track {
        width: 1px;
    }
</style>


<script>
    $(document).ready(async function() {
        <?php
        include(BASE_PATH . "/api/project-details.js");
        ?>
    });
</script>

<?php
include(BASE_PATH . "/toaster.php");
?>