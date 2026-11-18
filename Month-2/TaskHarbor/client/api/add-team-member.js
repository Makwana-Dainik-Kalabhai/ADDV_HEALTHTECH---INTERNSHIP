await $.ajax({
    url: "/server/controllers/all-users.php",
    method: "GET",
    data: {
        projectId: $(".project-id").val(),
    },
    success: function (res) {
        res = JSON.parse(res);

        res.map((ele) => {
            if (ele.role != "admin") {
                $(".team-member-options").append(`
                    <option value="${ele.id}" selected>${ele.name} (${ele.role})</option>
                `);
            }
        });
    },
    error: function (xhr, status, error) {
        console.error(error);
    }
});


$(".add-member-form").submit(async function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    await $.ajax({
        url: "/server/controllers/add-member-task.php",
        method: "POST",
        data: formData,
        success: function (res) {
            res = JSON.parse(res);
            if (res["status"] == "success") toastr.success(res.message);
            else toastr.error(res.message);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});