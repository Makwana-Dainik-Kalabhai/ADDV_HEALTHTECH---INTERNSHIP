$("#update-profile-form").on("submit", async function (e) {
    e.preventDefault();

    let form = new FormData(this);

    await $.ajax({
        url: "/server/controllers/update-profile.php",
        method: "POST",
        data: form,
        success: function (res) {
            res = JSON.parse(res);
            if (res.status == "success") {
                toastr.success(res.message);

                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            }
            else {
                toastr.error(res.message);
            }
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});