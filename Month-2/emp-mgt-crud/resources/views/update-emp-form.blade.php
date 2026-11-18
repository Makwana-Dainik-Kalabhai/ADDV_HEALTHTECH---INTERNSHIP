<form action="" method="post" class="update-emp-form">
    <dialog class="dialog dialog-scrollable emp-form" style="min-width: 700px;" id="updateEmpDialog">
        <div class="dialog-header">
            <h1 class="dialog-title">Scrollable body</h1>
            <button type="button" class="btn-close" data-bs-dismiss="dialog" aria-label="Close"></button>
        </div>
        <div class="dialog-body">
            <!-- Row - 1 -->
            <div class="row">
                <div class="col-6">
                    <label for="first_name" class="form-label mb-2">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
                </div>
                <div class="col-6">
                    <label for="last_name" class="form-label mb-2">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
                </div>
            </div>

            <!-- Row - 2 -->
            <div class="row mt-5">
                <div class="col-6">
                    <label for="email" class="form-label mb-2">Email</label>
                    <input disabled type="email" class="form-control" name="email" placeholder="example123@gmail.com" required />
                </div>
                <div class="col-6">
                    <label for="phone" class="form-label mb-2">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="+91 98989 89898" required minlength="10" maxlength="10" />
                </div>
            </div>

            <!-- Row - 3 -->
            <div class="row mt-5">
                <div class="col-6 d-flex align-items-center">
                    <label for="gender" class="form-label">Gender:</label>
                    <div class="form-field ms-5">
                        <input class="radio" name="gender" type="radio" id="Male" value="Male" checked />
                        <label for="male">Male</label>
                    </div>
                    <div class="form-field ms-3">
                        <input class="radio" name="gender" type="radio" id="Female" value="Female" />
                        <label for="female">Female</label>
                    </div>
                    <div class="form-field ms-3">
                        <input class="radio" name="gender" type="radio" id="Other" value="Other" />
                        <label for="other">Other</label>
                    </div>
                </div>
                <div class="col-6">
                    <label for="dob" class="form-label mb-2">Date of Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" required />
                </div>
            </div>


            <!-- Row - 4 -->
            <div class="row mt-5">
                <div class="col-6">
                    <label for="department" class="form-label mb-2">Department</label>
                    <input type="text" class="form-control" name="department" placeholder="Department" required />
                </div>
                <div class="col-6">
                    <label for="designation" class="form-label mb-2">Designation</label>
                    <input type="text" class="form-control" name="designation" placeholder="Designation" required />
                </div>
            </div>


            <!-- Row - 5 -->
            <div class="row mt-5">
                <div class="col-6">
                    <label for="salary" class="form-label mb-2">Salary</label>
                    <input type="text" class="form-control" name="salary" placeholder="50000" required />
                </div>
                <div class="col-6">
                    <label for="hire_date" class="form-label mb-2">Hire Date</label>
                    <input type="date" class="form-control" name="hire_date" required />
                </div>
            </div>


            <!-- Row - 6 -->
            <div class="row mt-5">
                <div class="col-6">
                    <label for="employment_type" class="form-label mb-2">Emp Type</label>
                    <select name="employment_type" class="form-control">
                        <option value="Full-time" selected>Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Intern">Intern</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="status" class="form-label mb-2">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="On Leave">On Leave</option>
                    </select>
                </div>
            </div>



            <!-- Row - 7 -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-field">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" placeholder="Enter your address here..." required></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog-footer">
            <button type="button" class="btn-solid theme-secondary" data-bs-dismiss="dialog">Close</button>
            <input type="submit" class="btn-solid theme-primary" value="Save changes" />
        </div>
    </dialog>
</form>