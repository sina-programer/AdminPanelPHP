<?php
include_once('../module.php');
handle_admin();
$admin_id = $_SESSION['admin_id'];

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=' . urlencode('اضافه کردن بنر'))); ?>
</head>

<body class="rtl_mode" style>
    <div id="ebazar-layout" class="theme-blue">
        <!-- sidebar -->
        <?php include(get_url('elements', 'sidebar-desktop.php')); ?>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <?php include(get_url('elements', 'sidebar-mobile.php')); ?>
            <?php include(get_url('elements', 'header-tiny.php?admin_id=' . $admin_id)); ?>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div
                                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bolder mb-0">
                                        اضافه کردن بنر
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card border p-2">
                        <form action="_add.php" method="POST" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input required type="text" name="title" class="form-control bg-light rounded-custom" 
                                            placeholder="عنوان بنر را وارد کنید..." oninvalid="alert('عنوان ضروری است')">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 p-2">
                                        <div class="form-group">
                                            <label>لینک</label>
                                            <input type="text" name="link" class="form-control bg-light rounded-custom" 
                                            placeholder="لینک بنر را وارد کنید...">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6 p-2">
                                        <div class="form-group">
                                            <label>موقعیت</label>
                                            <select id="optlist" name="position" class="form-select bg-light rounded-custom">
                                                <option value="top">
                                                    بالا
                                                </option>
                                                <option value="bottom">
                                                    پایین
                                                </option>
                                                <option value="center-1">
                                                    مرکز-1
                                                </option>
                                                <option value="center-2">
                                                    مرکز-2
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-6 col-6 p-2">
                                        <div class="form-group">
                                            <label>تصویر موبایل</label>
                                            <input type="file" name="mobile_image" class="form-control bg-light rounded-custom">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 p-2">
                                        <div class="form-group">
                                            <label>تصویر دسکتاپ</label>
                                            <input type="file" name="desktop_image" class="form-control bg-light rounded-custom">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-6 col-12 p-2">
                                    <button type="submit" class="btn btn-custom rounded-custom w-100">
                                        ثبت 
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(get_url('elements', 'html-scripts.php')); ?>
</body>

</html>