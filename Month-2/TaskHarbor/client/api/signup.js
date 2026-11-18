$(".signup-btn").click(function () {

    let name = $(".signup-form input[name='name']").val();
    let email = $(".signup-form input[name='email']").val();
    let password = $(".signup-form input[name='password']").val();
    let role = $(".signup-form select[name='role']").val();


    $.ajax({
        url: "../../server/controllers/signup.php",
        method: "POST",
        data: {
            name, email, password, role
        },
        success: function (res) {
            console.log(res);
            if (res.status == "success") {
                toastr.success(res.message);
                if (res.role == "employee") {
                    window.location.href = `http://localhost:8000/client/pages/dashboard/`;
                    return;
                }
            }
            else toastr.error(res.message);

        },
        error: function (xhr, status, error) {
            toastr.error(error);
        }
    });
});