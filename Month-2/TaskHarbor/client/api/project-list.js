$(".filter-btn").click(function () {
    $(".filter-btn").addClass("btn-outline");
    $(".filter-btn").removeClass("btn-solid theme-secondary");
    $(this).removeClass("btn-outline");
    $(this).addClass("btn-solid theme-secondary");

    $(".projects-grid .col-12").hide();
    $(`.${$(this).attr("data-status")}`).show();

    if ($(this).attr("data-status") == "all") $(".projects-grid .col-12").show();
});


let user_id = $(".user-id").val();
let role = $(".user-role").val();

await $.ajax({
    url: "/server/controllers/project-list.php",
    method: "POST",
    data: {
        user_id, role
    },
    success: function (res) {
        res = JSON.parse(res);

        res.map((ele) => {
            $(".projects-grid").append(`
                <div class="col-12 sm:col-6 md:col-4 ${ele.status} my-8">
                        <a href="http://localhost:8000/client/pages/projects/project-details.php?id=${ele.projectId}" class="text-decoration-none fg-inverse">
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
                    ${(ele.manager_id == user_id) ? `<button class="btn-solid theme-inverse mt-5 fs-sm" value="${ele.id}" type="button" data-bs-toggle="dialog" data-bs-target="#addProjectDialog">Update</button>` : ""}
                    ${(ele.manager_id == user_id) ? `<button class="btn-solid theme-inverse mt-5 delete-project-btn" value="${ele.id}">Delete</button>` : ""}
                </div>
            `);
        });
        toastr.success(res.message);
    },
    error: function (xhr, status, error) {
        toastr.error(error);
    }
});


$(".delete-project-btn").on("click", async function () {
    await $.ajax({
        url: "/server/controllers/delete-project.php",
        method: "POST",
        data: {
            projectId: $(this).val()
        },
        success: function (res) {
            res = JSON.parse(res);

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
});