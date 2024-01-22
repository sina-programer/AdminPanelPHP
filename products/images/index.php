<?php

include_once('../../module.php');
handle_admin();
include_once('../../database.php');
$admin_id = $_SESSION['admin_id'];

$connection = connect_db();
$id = $_GET['id'];
$images = $connection->query("SELECT * FROM product_images WHERE product_id=$id ORDER BY id DESC")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=' . urlencode('تصاویر محصول'))); ?>
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
                                       لیست تصاویر محصول
                                    </h3>
                                </div>
                            </div>
                            <form action="_add.php" method="POST" class="mb-5" enctype="multipart/form-data">
                                <input type="hidden" name="product_id" value="<?php echo $id ?>">
                                <h5 class="fw-bolder mb-1">افزودن تصویر</h5>
                                <div class="container-fluid">
                                    <div class="card-block row w-100 m-0">
                                        <div class="form-group col-md-6 col-6 p-3">
                                            <label>تصویر</label>
                                            <input required type="file" name="image" class="form-control bg-light rounded-custom" oninvalid="alert('تصویر ضروری است')">
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-12 p-3">
                                            <button type="submit" class="btn btn-custom rounded-custom">
                                                افزودن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                                تصویر
                                            </th>
                                            <th class="fw-bolder">
                                                کاور
                                            </th>
                                            <th class="fw-bolder">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-light">
                                        <?php foreach($images as $image){ ?>
                                        <tr>
                                            <th>
                                                <?php echo $image['id']?>
                                            </th>
                                            <th>
                                                <img src="<?php echo get_url('images', $image['image']) ?>" width='200'>
                                            </th>
                                            <th>
                                                <?php if($image['cover'] == 1){ ?>
                                                    <span class="badge bg-success" style="font-size: 14px">تصویر کاور</span>
                                                <?php }else{ ?>
                                                    <a href="_cover.php?id=<?php echo $image['id'] ?>&product_id=<?php echo $id?>">
                                                        <span class="badge bg-danger" style="font-size: 14px">
                                                        تبدیل به تصویر کاور
                                                        </span>
                                                    </a>
                                                <?php } ?>
                                            </th>
                                            <th>
                                                <div class="btn-group" role="group">
                                                    <a href="_delete.php?id=<?php echo $image['id'] ?>&product_id=<?php echo $id?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-trash d-flex text-white"></i>
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