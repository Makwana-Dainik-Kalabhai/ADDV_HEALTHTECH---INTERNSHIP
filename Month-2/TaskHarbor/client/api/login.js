$(".login-btn").click(function () {

    let email = $("input[name='login-email']").val();
    let password = $("input[name='login-password']").val();


    $.ajax({
        url: "../../server/controllers/login.php",
        method: "POST",
        data: {
            email, password
        },
        success: function (res) {
            if (res.status == "success") {
                toastr.success(res.message);

                window.location.href = `http://localhost:8000/client/pages/dashboard/`;
                return;
            }
            else toastr.error(res.message);
        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});