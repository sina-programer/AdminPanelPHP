<?php 

include_once('module.php');
handle_admin();
include_once('database.php');

$title = "داشبورد";
$admin_id = $_SESSION['admin_id'];

$articles = $connection->query("SELECT * FROM articles")->fetchAll();
$banners = $connection->query("SELECT * FROM banners")->fetchAll();
$services = $connection->query("SELECT * FROM services")->fetchAll();
$products = $connection->query("SELECT * FROM products")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php')) ?>
</head>
<body class="rtl_mode" style>
    <div id="ebazar-layout" class="theme-blue">
        <!-- sidebar -->
        <?php include(get_url('elements', 'sidebar-desktop.php')); ?>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <?php include(get_url('elements', 'sidebar-mobile.php')); ?>
            <?php include(get_url('elements', 'header-main.php')); ?>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="px-md-5 px-1 py-md-3 py-2">
                    <div class="container text-center">
                        <div class="row w-100 m-0 px-0">
                            <div class="col-xl-3 col-lg-4 col-sm-4 col-6 p-md-2 p-1">
                                <a href="articles/"
                                    class="dashbtn d-flex align-items-center">
                                    <i class="bi bi-paragraph d-flex me-2"></i>
                                    مقالات
                                    <span class="bg-custom badge ms-2">
                                        <?php echo count($articles) ?>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-4 col-6 p-md-2 p-1">
                                <a href="banners/"
                                    class="dashbtn d-flex align-items-center">
                                    <i class="bi bi-newspaper d-flex me-2"></i>
                                    بنرها
                                    <span class="bg-custom badge ms-2">
                                        <?php echo count($banners) ?>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-4 col-6 p-md-2 p-1">
                                <a href="services/"
                                    class="dashbtn d-flex align-items-center">
                                    <i class="bi bi-grid d-flex me-2"></i>
                                    خدمات
                                    <span class="bg-custom badge ms-2">
                                        <?php echo count($services) ?>
                                    </span>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-sm-4 col-6 p-md-2 p-1">
                                <a href="products/"
                                    class="dashbtn d-flex align-items-center">
                                    <i class="bi bi-cart d-flex me-2"></i>
                                    محصولات
                                    <span class="bg-custom badge ms-2">
                                        <?php echo count($products) ?>
                                    </span>                                
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(get_url('elements', 'html-scripts.php')); ?>
</body>

</html>
