$(".add-project-form").submit(async function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    await $.ajax({
        url: "/server/controllers/add-project.php",
        method: "POST",
        data: formData,
        success: function (res) {
            res = JSON.parse(res);
            console.log(res);
            if (res["status"] == "success") toastr.success(res.message);
            else toastr.error(res.message);

            setTimeout(() => {
                window.location.reload();
            }, 2000);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});