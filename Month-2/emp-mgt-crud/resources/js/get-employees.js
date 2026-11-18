$(document).ready(function () {

    $("input[name='search']").keyup(function () {


        setTimeout(() => {
            let search = $(this).val();

            $.ajax({
                url: window.searchEmp,
                method: "GET",
                data: { search },
                success: function (res) {
                    $(".employee-list").empty();

                    if (res.length <= 0) {
                        $(".employee-list").append(`
                        <div class="row">
                            <div class="col-12 text-center py-10 border rounded-4">
                                <h5>No Data Found ....</h5>
                            </div>
                        </div>
                    `);
                        return;
                    }

                    res.map((ele) => {
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
            });
        }, 300);
    });
});