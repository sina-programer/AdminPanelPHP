<?php

include_once('module.php');

$title = "داشبورد";

?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
    <?php include(get_url('elements', 'html-head.php')); ?>
</head>

<body dir="rtl" class="login-body vh-100">
    <div id="ebazar-layout" class="theme-blue h-100">
        <div class="row w-100 m-0 h-100">
            <div class="col-xl-4 col-lg-5 col-md-6 col-12 py-0 px-xxl-5 px-xl-4 px-lg-3 px-md-2 px-3 h-100">
                <div
                    class="card bg-white rounded-0 border-0 h-100 d-flex flex-column align-items-center justify-content-between px-xxl-5 px-xl-4 px-lg-3 px-md-2 px-3 py-xl-5 py-lg-4 py-md-3 py-4">
                    <div class="col-12 px-0 pb-5 text-center">
                        <a href="https://rahweb.com" target="_blank"
                            class="mb-0 d-flex align-items-center justify-content-center border py-2 pe-1 ps-2 mx-auto rounded-3 max-content">
                            <span class="me-2 h4 mt-1 mb-0 fw-lighter text-custom">
                                Rahweb
                            </span>
                            <img src="assets/images/rahweb-logo.svg" />
                        </a>
                    </div>
                    <form action="_login.php" method="POST" class="m-0 mx-auto">

                        <?php if(isset($_GET["error"])){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET["error"];  ?>
                        </div>
                        <?php } ?>

                        <div class="row w-100 m-0">
                            <div class="col-12 text-center p-2">
                                <h1 class="h3">
                                    ورود به پنل
                                </h1>
                            </div>
                            <div class="col-12 p-2">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control rounded-custom"
                                        placeholder="name@example.com">
                                    <label for="floatingInput" style="color: #999">
                                        <i class="bi bi-at"></i>
                                        آدرس ایمیل
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control rounded-custom"
                                        placeholder="name@example.com">
                                    <label for="floatingInput" style="color: #999">
                                        <i class="bi bi-shield-lock"></i>
                                        رمز عبور
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <button type="submit" class="btn btn-lg w-100 btn-custom rounded-custom">
                                    ورود
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="overlay"></div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-6 col-12 d-md-block d-none p-0 h-100">
                <div class="card bg-danger rounded-0 border-0 h-100 leftcard">
                    <img src="https://www.rahweb.com/assets/admin/loginrah.jpg" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>
    <?php include(get_url('elements', 'html-scripts.php')); ?>
</body>

</html>