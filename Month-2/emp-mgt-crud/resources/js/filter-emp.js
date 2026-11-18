$(document).ready(function () {
    $("select[name='sort']").change(function () {
        $.ajax({
            url: "/filter",
            method: "GET",
            data: { filterType: $(this).val() },
            success: function (res) {
                if (res.status == "success") {
                    $(".employee-list").empty();

                    if (res.employees.length <= 0) {
                        $(".employee-list").append(`
                        <div class="row">
                            <div class="col-12 text-center py-10 border rounded-4">
                                <h5>No Data Found ....</h5>
                            </div>
                        </div>
                    `);
                        return;
                    }

                    (res.employees).map((ele) => {
                        $(".employee-list").append(`
                            <div class="row">
                                <div class="col-3 p-3 border rounded-4 fs-sm"><span class="fw-semibold">${ele.employee_code}</span><br />${ele.first_name} ${ele.last_name}<br />${ele.email}</div>
                                <div class="col-2 p-3 border rounded-4">${ele.designation}</div>
                                <div class="col-2 p-3 border rounded-4">${ele.department}</div>
                                <div class="col-1 p-3 border rounded-4">${ele.salary}</div>
                                <div class="col-1 p-3 border rounded-4">${ele.hire_date}</div>
                                <div class="col-1 p-3 border rounded-4">${ele.employment_type}</div>

                                <div class="col-1 p-3 border rounded-4">
                                    <span class="px-3 py-1 rounded-3 fs-sm fw-semibold fg-white bg-${ele.status == 'Active' ? 'success' : (ele.status == 'Inactive' ? 'danger' : 'warning')}">${ele.status}</span>
                                </div>

                                <div class="col-1 p-3 border rounded-4">
                                    <a href="/update-emp/${ele.id}" class="btn-outline theme-inverse me-3 fs-sm">Update</a>
                                    <a href="/delete-emp/${ele.id}" class="btn-solid theme-inverse mt-3 fs-sm">Delete</a>
                                </div>
                            </div>
                            `);
                    });
                }
                else {
                    alert(res.message);
                }
            }
        });
    });
});