<?php

include_once('../module.php');
handle_admin();
include_once('../database.php');
$connection = connect_db();
$admin_id = $_SESSION['admin_id'];

$title_phrase = '';
if(isset($_GET['title'])){
    $title = $_GET['title'];
    $title_phrase = "WHERE title LIKE '%$title%'";
}
$category_phrase = '';
if(isset($_GET['category'])){
    $category = $_GET['category'];
    $category_phrase = "JOIN service_categories ON services.category_id=service_categories.id WHERE service_categories.title LIKE '%$category%'";
}

$services = $connection->query("SELECT * FROM services $title_phrase $category_phrase ORDER BY services.id DESC")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=خدمات')); ?>
</head>

<body class="rtl_mode" style>
    <div id="ebazar-layout" class="theme-blue">
        <!-- sidebar -->
        <?php include(get_url('elements', 'sidebar-desktop.php')); ?>
        
        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <?php include(get_url('elements', 'sidebar-mobile.php')); ?>
            <?php include(get_url('elements', "header-tiny.php?admin_id=$admin_id")); ?>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div class="card-header mb-3 py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bolder mb-1">
                                       لیست خدمات
                                    </h3>
                                    <div class="d-flex align-items-center">
                                        <a href="add.php" class="btn ms-2 my-2 btn-custom-b rounded-custom d-flex align-items-center">
                                            <i class="bi bi-plus-square-dotted d-flex h5 my-0 me-2"></i>
                                            افزودن خدمت
                                        </a>
                                    </div>
                                </div>
                                <form action="<?php echo get_url('_search.php') ?>" method="POST" class="mb-3">
                                    <input type="hidden" name="url" value="<?php echo get_url('services', 'index.php')?>">
                                    <h5 class="fw-bolder mb-1">جستجو</h5>
                                    <div class="container-fluid">
                                        <div class="card-block row w-100 m-0">
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>عنوان</label>
                                                <input type="text" name="title" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با عنوان...">
                                            </div>
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>دسته بندی</label>
                                                <input type="text" name="category" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با دسته بندی...">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 p-3">
                                            <button type="submit" class="btn btn-custom rounded-custom">
                                                جستجو
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table id="myDataTable"
                                    class="table align-middle table-bordered border-custom table-striped mb-0">
                                    <thead class="text-center text-light">
                                        <tr>
                                            <th class="fw-bolder">
                                                #
                                            </th>
                                            <th class="fw-bolder">
                                                عنوان
                                            </th>
                                            <th class="fw-bolder">
                                                دسته بندی
                                            </th>
                                            <th class="fw-bolder">
                                                آیکون
                                            </th>
                                            <th class="fw-bolder">
                                                تصویر
                                            </th>
                                            <th class="fw-bolder">
                                                توضیح کوتاه
                                            </th>
                                            <th class="fw-bolder">
                                                عنوان سئو
                                            </th>
                                            <th class="fw-bolder">
                                                توضیح سئو
                                            </th>
                                            <th class="fw-bolder">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-light">
                                        <?php foreach($services as $service){?>
                                        <tr>
                                            <th>
                                                <?php echo $service['id']?>
                                            </th>
                                            <th>
                                                <span class="badge bg-white" style="font-size: 11px">
                                                    <?php echo $service['title']?>
                                                </span>
                                            </th>
                                            <th>
                                                <?php 
                                                    $category_id = $service['category_id'];
                                                    $category = $connection->query("SELECT * FROM service_categories WHERE id=$category_id")->fetch();
                                                    echo $category['title'];
                                                ?>
                                            </th>
                                            <th>
                                                <img src="<?php echo get_url('images', $service['icon']) ?>" width='50'>
                                            </th>
                                            <th>
                                                <img src="<?php echo get_url('images', $service['image']) ?>" width='100'>
                                            </th>
                                            <th>
                                                <?php echo $service['short_description'] ?>
                                            </th>
                                            <th>
                                                <?php echo $service['seo_title'] ?>
                                            </th>
                                            <th>
                                                <?php echo $service['seo_description'] ?>
                                            </th>
                                            <th>
                                                <div class="btn-group" role="group">
                                                    <a href="_delete.php?id=<?php echo $service['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-trash d-flex text-white"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a href="edit.php?id=<?php echo $service['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-pencil d-flex text-white"></i>
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <br>
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