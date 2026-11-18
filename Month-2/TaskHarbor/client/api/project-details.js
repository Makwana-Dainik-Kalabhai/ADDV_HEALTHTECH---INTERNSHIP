let loggedUserEmail = $(".logged-user-email").val();


const queryString = window.location.search;

// 2. Pass it to URLSearchParams
const urlParams = new URLSearchParams(queryString);

// 3. Get the specific parameter value
const projectId = urlParams.get('id');

await $.ajax({
    url: "/server/controllers/project-details.php",
    method: "POST",
    data: {
        "id": projectId
    },
    success: function (res) {
        res = JSON.parse(res);

        $(".project-details").append(`
                <div class="card p-5 shadow">
                    <h5 class="px-4 py-2 text-center bg-secondary rounded-9 mb-5">Assigned By:  ${res[0].manager_name}</h5>
                    <h5 class="fg-danger fw-semibold">${res[0].project_name}</h5>
                    <h6>${res[0].project_code}</h6>
                    <p class="fs-sm fg-secondary">${res[0].project_description}</p>

                    <div class="task-list accordion accordion-sm mt-5">
                    </div>
                </div>
                `);

        let total_members = 0;
        let team_members = [];

        res.forEach((ele, ind) => {
            let theme = "theme-danger";
            let icon = '<i class="fa-solid fa-circle-xmark"></i>';

            if (ele.task_status == "in_progress") {
                theme = "theme-warning";
                icon = '<i class="fa-solid fa-clock"></i>';
            }
            if (ele.task_status == "review") {
                theme = "theme-accent";
                icon = '<i class="fa-solid fa-comment-dots"></i>';
            }
            if (ele.task_status == "completed") {
                theme = "theme-success";
                icon = '<i class="fa-solid fa-circle-check"></i>';
            }

            let priority = "success";
            if (ele.task_priority == "medium") priority = "accent";
            if (ele.task_priority == "high") priority = "warning";
            if (ele.task_priority == "urgent") priority = "danger";


            $(".task-list").append(`
                <details class="accordion-item ${theme}" name="accordionExpandCollapse">
                    <summary class="accordion-header">
                        ${icon}&ensp;${ele.task_title}&ensp;<span class="px-4 text-center rounded-9 bg-30 bg-${priority} fg-emphasis-${priority}">${ele.task_priority}</span>
                        <svg class="accordion-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m2 5 6 6 6-6" />
                        </svg>
                    </summary>
                    <div class="accordion-body">${ele.task_description}</div>
                </details>
        `);

            if (!team_members.includes(ele.member_name)) {
                $(".team-members").append(`
                        <div class="card p-3 px-4 my-3 position-relative">
                            <h5 class="position-absolute top-50 end-0 translate-middle fg-secondary fs-lg fw-bold">${(total_members < 10) ? "0" + (total_members + 1) : total_members + 1}</h5>

                            <h6 class="fg-danger fs-sm fw-semibold">${ele.member_name} ${(ele.manager_name == ele.member_name) ? "(manager)" : ""}</h6>
                            <span class="fg-secondary fs-xs">${ele.member_email}</span>
                        </div>
                    `);
                total_members++;
            }
            team_members.push(ele.member_name);

            $(".task-assignment-list").append(`
                <div class="row py-4 border m-0 rounded-4 align-items-center">
                    <div class="col-1 fw-semibold fs-xs bg-danger fg-white rounded-5 py-3">${ele.member_name}</div>
                    <div class="col-2 fw-semibold fs-xs fg-secondary">${ele.task_title}</div>
                    <div class="col-2 fw-semibold fs-xs fg-secondary">${ele.task_description}</div>
                    <div class="col-1 fw-semibold fs-xs px-4 text-center rounded-9 bg-30 bg-${priority} fg-emphasis-${priority}">${ele.task_priority}</div>
                    <div class="col-3 fw-semibold fs-xs fg-secondary">${ele.task_start_date} --- ${ele.task_due_date}</div>
                    <div class="col-2 fw-semibold fs-xs fg-secondary">${(loggedUserEmail == ele.member_email) ?
                    `<select class="form-control update-task-status fs-sm">
                        <option data-id="${ele.task_id}" ${ele.task_status == "todo" ? "selected" : ""} value="todo">todo</option>
                        <option data-id="${ele.task_id}" ${ele.task_status == "in_progress" ? "selected" : ""} value="in_progress">in_progress</option>
                        <option data-id="${ele.task_id}" ${ele.task_status == "review" ? "selected" : ""} value="review">review</option>
                        <option data-id="${ele.task_id}" ${ele.task_status == "completed" ? "selected" : ""} value="completed">completed</option>
                    </select>
                        `: ele.task_status
                }<br/>${(ele.task_status == "completed") ? ele.task_completed_at : ""}</div>
                    <div class="col-1 fw-semibold fs-xs fg-secondary">${new Date(ele.task_updated_at).toLocaleDateString()}</div>
                    ${(ele.manager_email == loggedUserEmail) ? `<div class="col-12 d-flex justify-content-end mt-10 fw-semibold fs-xs fg-secondary">
                    <button value="${ele.task_id}" class="btn-solid theme-inverse delete-task-btn">Delete</button>
                </div>` : ""}
                </div>`);
        });

        $(".total-members").text((total_members < 10) ? "0" + total_members : total_members);
    },
    error: function (xhr, status, error) {
        toastr.error(error);
    }
});



$(".update-task-status").on("change", async function () {
    let taskId = $(this).children().attr("data-id");
    let taskStatus = $(this).val();

    await $.ajax({
        url: "/server/controllers/update-task-status.php",
        method: "DELETE",
        data: {
            taskStatus, taskId
        },
        success: function (res) {
            res = JSON.parse(res);
            if (res.status == "success") {
                toastr.success(res.message);
                return;
            }
            toastr.error(res.message);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});



$(".delete-task-btn").on("click", async function () {
    await $.ajax({
        url: "/server/controllers/delete-task.php",
        method: "POST",
        data: {
            taskId: $(this).val()
        },
        success: function (res) {
            res = JSON.parse(res)

            if (res.status == "success") {
                toastr.success(res.message);

                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
            else toastr.error(res.message);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
})