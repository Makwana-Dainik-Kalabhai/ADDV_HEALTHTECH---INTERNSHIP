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

    .task-assignment-container {
        overflow-x: auto;
    }

    .task-assignment-list {
        min-width: 68vw;
        max-height: 100vh;
        overflow: auto;
        scrollbar-width: thin;
    }

    @media screen and (max-width: 1024px) {
        .task-assignment-list {
            min-width: 100vw;
        }
    }
</style>



<input type="text" class="dashboard-user-id" value="<?php echo USER["user_id"]; ?>" hidden />
<input type="text" class="dashboard-user-role" value="<?php echo USER["role"]; ?>" hidden />

<div class="main-content">
    <div class="row mt-12 m-0 g-3 md:g-5">
        <div class="col-12 xs:col-6 sm:col-4 md:col-3">
            <div class="card h-100 d-flex flex-row align-items-center p-5 shadow">
                <i class="fa-solid fa-users fs-xl"></i>

                <div class="ps-7 pe-3">
                    <h4 class="fw-bold total-members">00</h4>
                    <h5 class="fs-sm">Total Team Members</h4>
                </div>
            </div>
        </div>

        <div class="col-12 xs:col-6 sm:col-4 md:col-3">
            <div class="card h-100 d-flex flex-row align-items-center p-5 shadow">
                <i class="fa-solid fa-list fs-xl"></i>

                <div class="ps-7 pe-3">
                    <h4 class="fw-bold total-tasks">00</h4>
                    <h5 class="fs-sm">Total Tasks</h4>
                </div>
            </div>
        </div>

        <div class="col-12 xs:col-6 sm:col-4 md:col-3">
            <div class="card h-100 d-flex flex-row align-items-center p-5 shadow">
                <i class="fa-solid fa-clock-rotate-left fs-xl"></i>

                <div class="ps-7 pe-3">
                    <h4 class="fw-bold pending-tasks">00</h4>
                    <h5 class="fs-sm fg-warning">Total Pending Tasks</h4>
                </div>
            </div>
        </div>

        <div class="col-12 xs:col-6 sm:col-4 md:col-3">
            <div class="card h-100 d-flex flex-row align-items-center p-5 shadow">
                <i class="fa-solid fa-calendar-check fs-xl"></i>

                <div class="ps-7 pe-3">
                    <h4 class="fw-bold completed-tasks">00</h4>
                    <h5 class="fs-sm fg-success">Total Completed Tasks</h4>
                </div>
            </div>
        </div>
    </div>


    <!-- Projects List -->
    <div class="row mb-5 m-0 pb-10 pt-10 projects-grid g-10">
    </div>


    <!-- Task List -->
    <div class="row mb-10 m-0">
        <div class="col-12">
            <div class="card p-5 shadow task-assignment-container">
                <h5 class="fw-semibold">Task Assignments</h5>
                <hr>
                <div class="task-assignment-list">
                    <div class="row py-7 bg-secondary border m-0 rounded-4">
                        <div class="col-2 fw-semibold fs-xs">Project</div>
                        <div class="col-2 fw-semibold fs-xs">Title</div>
                        <div class="col-2 fw-semibold fs-xs">Description</div>
                        <div class="col-1 fw-semibold fs-xs">Priority</div>
                        <div class="col-3 fw-semibold fs-xs">Start Date --- Due Date</div>
                        <div class="col-1 fw-semibold fs-xs">Status</div>
                        <div class="col-1 fw-semibold fs-xs">Updated on</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(async function() {
        <?php include(BASE_PATH . "/api/dashboard.js"); ?>
    });
</script>