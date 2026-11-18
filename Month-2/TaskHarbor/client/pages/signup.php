<div class="signup-form-container sm:mt-10 sm:p-5 d-flex justify-content-center align-items-center h-100">
    <div class="bg-white shadow-sm rounded-6 overflow-hidden">
        <div class="row">
            <div class="col-12 sm:col-6">
                <img src="https://www.edps.in/public/uploads/news-16.png" alt="Login Now" class="w-100 h-100 object-fit-cover" />
            </div>


            <!-- Signup Form -->
            <div class="col-12 sm:col-6 px-7 py-5">
                <div class="signup-form">
                    <label for="name" class="form-label mt-4 mb-2 fs-sm">Full Name</label>
                    <input type="text" class="form-control fs-sm" name="name" placeholder="fullname" value="ABCD" />


                    <label for="email" class="form-label mt-4 mb-2 fs-sm">Email address</label>
                    <input type="email" class="form-control fs-sm" name="email" placeholder="name@example.com" value="abcd123@gmail.com" />

                    <label for="password" class="form-label mt-4 mb-2 fs-sm">Password</label>
                    <input type="text" class="form-control fs-sm" name="password" placeholder="password" value="jihugvhijokojb " />

                    <label for="role" class="form-label mt-4 mb-2 fs-sm">Role</label>
                    <select name="role" class="form-control fs-sm">
                        <option value="employee" selected>Employee</option>
                        <option value="manager">Project-Manager</option>
                    </select>


                    <button class="btn-solid theme-danger mt-7 fs-sm signup-btn">SignUp Now</button>
                    <br />
                    <span class="fs-sm">Already have an account?</span> <button class="login-now-link fs-sm bg-transparent border-0 fg-primary text-decoration-underline">Login now</button>
                </div>




                <!-- Login Form -->
                <div class="login-form">
                    <label for="email" class="form-label mt-4 mb-2 fs-sm">Email address</label>
                    <input type="email" class="form-control fs-sm" name="login-email" placeholder="name@example.com" value="david@example.com" />

                    <label for="password" class="form-label mt-4 mb-2 fs-sm">Password</label>
                    <input type="text" class="form-control fs-sm" name="login-password" placeholder="password" value="Password@123" />

                    <button class="btn-solid theme-danger mt-7 fs-sm login-btn">Login Now</button>

                    <br />
                    <span class="fs-sm">Want to create account?</span> <button class="signup-now-link fs-sm bg-transparent border-0 fg-primary text-decoration-underline">Signup now</button>
                    <br /><span class="fs-sm">Forgot Password</span> <a href="/client/pages/forgot-password.php" class="fs-sm">Click</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php
        include(BASE_PATH . "/api/signup.js");
        include(BASE_PATH . "/api/login.js");
        ?>
    });
</script>

<script>
    $(document).ready(function() {
        $(".login-form").hide();

        $(".signup-now-link").click(function() {
            $(".login-form").slideToggle(2000);
            $(".signup-form").slideToggle(2000);
        });
        $(".login-now-link").click(function() {
            $(".signup-form").slideToggle(2000);
            $(".login-form").slideToggle(2000);
        });
    });
</script>