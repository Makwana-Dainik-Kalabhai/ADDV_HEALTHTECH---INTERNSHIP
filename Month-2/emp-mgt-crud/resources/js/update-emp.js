$(document).ready(function () {
    $(".update-emp-btn").click(function () {
        $("[name='email']").attr("disabled", true);

        let id = $(this).attr("data-id");
        $(".update-emp-form").attr("action", `/update-emp/${id}`);

        $.ajax({
            url: window.getOneEmp,
            method: "GET",
            data: { id },
            success: function (res) {
                $(`#${res["gender"]}`).attr("checked", true);

                Object.entries(res).map((ele) => {
                    $(`[name='${ele[0]}']`).val(ele[1]);
                })
            }
        });
    });
    //     let data = {
    //         "employee_code": $("[name='employee_code']").val(),
    //         "first_name": $("[name='first_name']").val(),
    //         "last_name": $("[name='last_name']").val(),
    //         "phone": $("[name='phone']").val(),
    //         "gender": $("[name='gender']:checked").val(),
    //         "date_of_birth": $("[name='date_of_birth']").val(),
    //         "designation": $("[name='designation']").val(),
    //         "department": $("[name='department']").val(),
    //         "salary": $("[name='salary']").val(),
    //         "hire_date": $("[name='hire_date']").val(),
    //         "employment_type": $("[name='employment_type']").val(),
    //         "status": $("[name='status']").val(),
    //         "address": $("[name='address']").val(),
    //     };

    //     $.ajax({
    //         url: window.updateEmp,
    //         type: "POST",
    //         data: {
    //             id: $("[name='id']").val(),
    //             data
    //         },
    //         success: function (res) {
    //             alert(res.message);
    //             if (res.status == "success") {
    //                 window.location.reload();
    //             }
    //         }
    //     });
    // });
});