let pendingTasks = 0, completedTasks = 0;

await $.ajax({
    url: "/server/controllers/dashboard.php",
    method: "POST",
    data: {
        user_id: $(".dashboard-user-id").val(),
        role: $(".dashboard-user-role").val()
    },
    success: function (res) {
        res = JSON.parse(res);

        if (res != "") {

            (res.projects).map((ele) => {
                $(".projects-grid").append(`
                <a href="http://localhost:8000/client/pages/projects/project-details.php?id=${ele.projectId}" class="col-12 sm:col-6 lg:col-4 ${ele.status} text-decoration-none fg-inverse">
                    <div class="project-card py-6 rounded-5 h-100">

                        <div class="first-div"></div>
                        <div class="second-div bg-secondary rounded-5 border fs-sm fw-semibold">
                            ${(ele.status).substring(0, 1).toUpperCase() + (ele.status).substring(1)}
                        </div>

                        <div class="card px-4 mx-2 position-relative h-100">
                            <div class="row m-0 p-0 justify-content-between align-items-center">
                                <span class="col-5 fw-semibold fg-secondary fs-xs mt-2 px-5 py-1 bg-secondary w-fit rounded-5">${ele.project_code}</span>
                                <span class="col-7 d-block text-end fs-xs">${ele.created_at}</span>
                            </div>

                            <h5 class="fg-danger fw-semibold mt-5">${ele.project_name}</h5>
                            <p class="fs-sm fg-secondary">${ele.description}</p>

                            <div class="row">
                                <span class="col-5 fs-sm fw-semibold fg-warning">${ele.start_date}</span>
                                <span class="col-2 fs-sm fw-semibold">--</span>
                                <span class="col-5 fs-sm fw-semibold fg-warning">${ele.deadline}</span>
                            </div>
                        </div>
                    </div>
                </a>
            `);
            });


            (res.tasks).forEach((ele) => {
                if (ele.status == "in_progress") pendingTasks++;
                if (ele.status == "completed") completedTasks++;

                let priority = "success";
                if (ele.priority == "medium") priority = "accent";
                if (ele.priority == "high") priority = "warning";
                if (ele.priority == "urgent") priority = "danger";

                $(".task-assignment-list").append(`
                <div class="row py-4 border m-0 rounded-4 align-items-center">
                    <div class="col-2 fw-semibold fs-xs bg-danger fg-white rounded-5 py-3">${ele.project_name}</div>
                    <div class="col-2 fw-semibold fs-xs fg-secondary">${ele.title}</div>
                    <div class="col-2 fw-semibold fs-xs fg-secondary">${ele.task_description}</div>
                    <div class="col-1 fw-semibold fs-xs px-4 text-center rounded-9 bg-30 bg-${priority} fg-emphasis-${priority}">${ele.priority}</div>
                    <div class="col-3 fw-semibold fs-xs fg-secondary">${ele.start_date} --- ${ele.due_date}</div>
                    <div class="col-1 fw-semibold fs-xs fg-secondary">${ele.task_status}<br/>${(ele.task_status == "completed") ? ele.completed_at : ""}</div>
                    <div class="col-1 fw-semibold fs-xs fg-secondary">${new Date(ele.updated_at).toLocaleDateString()}</div>
                </div>`);
            });

            $(".total-members").text((res.users.length < 10) ? "0" + res.users.length : res.users.length);
            $(".total-tasks").text((res.tasks.length < 10) ? "0" + res.tasks.length : res.tasks.length);

            $(".pending-tasks").text((pendingTasks < 10) ? "0" + pendingTasks : pendingTasks);
            $(".completed-tasks").text((completedTasks < 10) ? "0" + completedTasks : completedTasks);
        }
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});