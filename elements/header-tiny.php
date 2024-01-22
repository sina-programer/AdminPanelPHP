<?php

include_once('../module.php');
include_once('../database.php');

$connection = connect_db();
$admin = $connection->query("SELECT * FROM admins WHERE id='$admin_id'")->fetch();

?>

<div class="header bg-white px-0 py-3 border mt-4 rounded-custom shadow d-lg-block d-none">
    <nav class="navbar p-md-0">
        <div class="container">
            <div class="dashboard-header d-flex justify-content-between mb-md-0">
                <div class="v-avatar is-large">
                    <div class="dropdown">
                        <div class="d-flex align-items-center px-2">
                            <img src="<?php echo get_url('images', $admin['image']) ?>"
                                class="border shadow me-2" width="50" style="border-radius: 0.5rem">
                            <div class="ms-2">
                                <p class="my-1 fw-bolder">
                                    <?php echo $admin['first_name'] . ' ' . $admin['last_name'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <a class="text-danger d-flex align-items-center mx-3" href="<?php get_url('_logout.php') ?>">
                    <i class="bi bi-power h5 my-0 me-2 d-flex"></i>
                    خروج از حساب
                </a>
            </div>
        </div>
    </nav>
</div>
