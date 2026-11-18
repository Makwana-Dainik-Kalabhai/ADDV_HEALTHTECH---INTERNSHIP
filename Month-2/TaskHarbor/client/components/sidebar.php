<style>
    .sidebar a {
        color: black;
        background-color: transparent;
    }

    .sidebar a:not(.profile):hover {
        background-color: #f2f2f2;
    }
</style>


<div class="sidebar border-2 border-end d-none md:d-block bg-white h-100">
    <h4 class="logo fw-bold text-center py-10 mx-10 border-2 border-bottom"><i class="fa-solid fa-clipboard-check"></i> TaskHarbor</h4>

    <div class="menus mt-12 px-10">
        <a href="<?php echo getenv("URL")."/client/pages/dashboard/"; ?>" class="d-block w-100 text-start fg-inverse text-decoration-none border-0 fw-bold fs-md p-4 my-2 rounded-5 dashboard">
            <i class="fa-solid fa-chart-column"></i>&ensp;Dashboard
        </a>

        <a href="<?php echo getenv("URL")."/client/pages/profile/"; ?>" class="d-block w-100 text-start fg-inverse text-decoration-none border-0 bg-transparent fw-bold fs-md p-4 my-2 rounded-5 profile">
            <i class="fa-solid fa-user-tie"></i>&ensp;Profile
        </a>

        <a href="<?php echo getenv("URL")."/client/pages/projects/"; ?>" class="d-block w-100 text-start fg-inverse text-decoration-none border-0 bg-transparent fw-bold fs-md p-4 my-2 rounded-5 projects">
            <i class="fa-solid fa-diagram-project"></i>&ensp;Projects
        </a>

        <a href="<?php echo getenv("URL")."/server/controllers/logout.php"; ?>" class="d-block w-100 text-start fg-inverse text-decoration-none border-0 bg-transparent fw-bold fs-md p-4 my-2 rounded-5 logout">
            <i class="fa-solid fa-right-from-bracket"></i>&ensp;Logout
        </a>
    </div>
</div>