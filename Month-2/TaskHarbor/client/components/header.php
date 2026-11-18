<div class="row justify-content-end align-items-center py-4 border-bottom m-0">
    <div class="d-block md:d-none col-2 md:col-0">
        <button class="border-0 bg-secondary rounded-5 p-4 show-sidebar-btn"><i class="fa-solid fa-bars"></i></button>
    </div>

    <div class="col-5 md:col-3">
        Hey! <?php echo USER["name"] . " (" . USER["role"] . ")"; ?>
    </div>

    <div class="col-5 md:col-9 d-flex justify-content-end align-items-center">
        <a href="<?php echo getenv("URL")."/client/pages/employee/profile/"; ?>" class="avatar fw-bold fg-white bg-danger ms-5"><?php echo substr(USER["name"], 0, 1); ?></a>
    </div>
</div>

<script>
    $(document).ready(function() {
        let sidebar = false;

        $(".show-sidebar-btn").click(function() {
            if (!sidebar) {
                $(".sidebar").css({
                    position: "absolute",
                    display: "block",
                    zIndex: 1
                });
                sidebar = !sidebar;
            }
        });

        $(".main-content").click(function() {
            if (sidebar) {
                $(".sidebar").css({
                    display: "none"
                });
                sidebar = !sidebar;
            }
        });
    });
</script>