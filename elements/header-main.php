<?php

include_once('../module.php');
include_once('../database.php');

$admin = $connection->query("SELECT * FROM admins WHERE id='$admin_id'")->fetch();

?>

<div class="px-2 py-2 mt-2 headsc">
    <div class="dashboard-pro">
        <div class="col-12 mx-auto px-md-5 px-1">
            <div class="row w-100 m-0">
                <div class="col-xxl-11 col-sm-10 col-9 ms-auto p-2">
                    <div class="row w-100 m-0">
                        <div class="col-sm-6 col-12 align-self-end p-0">
                            <p class="fw-bolder text-dark h5 mb-0 d-flex align-items-center">
                                <i class="bi bi-person-square h5 my-0 me-2 d-flex align-items-center"></i>
                                <?php echo $admin['first_name'] . ' ' . $admin['last_name'] ?>
                            </p>
                        </div>
                        <div class="col-sm-6 d-sm-block d-none align-self-end p-0">
                            <ul class="p-0 m-0 d-flex align-items-center justify-content-end">
                                <li class="list-unstyled ms-2">
                                    <a class="btn btn-sm btn-logout px-1 d-flex align-items-center ms-auto"
                                        style="width: max-content;"
                                        href="<?php echo get_url('_logout.php') ?>">
                                        <i class="bi bi-power h5 my-0 me-1 d-flex"></i>
                                        خروج
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mx-auto px-md-5 px-1">
        <div class="row w-100 m-0">
            <div class="col-xxl-1 col-sm-2 col-3 p-2">
                <div class="avatarr">
                    <img src="<?php echo get_url('images', $admin['image']) ?>" class="text-center" width="100%" height="auto" />
                </div>
            </div>
        </div>
    </div>
</div>
