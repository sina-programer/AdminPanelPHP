<?php

include_once('../module.php');
include_once('../database.php');

handle_admin();
$admin_id = $_SESSION['admin_id'];

$connection = connect_db();
$id = $_GET['id'];
$service = $connection->query("SELECT * FROM services WHERE id=$id")->fetch();
$categories = $connection->query("SELECT * FROM service_categories")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=' . urlencode('ویرایش خدمت'))); ?>
</head>

<body class="rtl_mode" style>
    <div id="ebazar-layout" class="theme-blue">
        <!-- sidebar -->
        <?php include(get_url('elements', 'sidebar-desktop.php')); ?>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <?php include(get_url('elements', 'sidebar-mobile.php')); ?>
            <?php include(get_url('elements', 'header-main.php?admin_id=' . $admin_id)); ?>

            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div
                                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bolder mb-0">
                                        ویرایش بنر
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card border p-2">
                        <form action="_edit.php" method="POST" enctype="multipart/form-data">
                            <div class="container-fluid">
                                <div class="card-block row w-100 m-0">
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان</label>
                                            <input required type="text" name="title" class="form-control bg-light rounded-custom" 
                                            placeholder="عنوان خدمت را وارد کنید..." oninvalid="alert('عنوان ضروری است')"
                                            value="<?php echo $service['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 p-2">
                                        <div class="form-group">
                                            <label>دسته بندی</label>
                                            <select id="optlist" name="category_id" class="form-select bg-light rounded-custom">
                                                <?php foreach($categories as $category){?>
                                                    <option <?php if($category['id']==$id){echo 'selected';} ?> value="<?php echo $category['id'] ?>">
                                                        <?php echo $category['title'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>آیکون</label>
                                            <input type="hidden" name="old-icon" value="<?php echo $service['icon'] ?>">
                                            <input type="file" name="icon" class="form-control bg-light rounded-custom">
                                            <img src="<?php echo get_url('images', $service['icon']) ?>" width='100'>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>تصویر</label>
                                            <input type="hidden" name="old-image" value="<?php echo $service['image'] ?>">
                                            <input type="file" name="image" class="form-control bg-light rounded-custom">
                                            <img src="<?php echo get_url('images', $service['image']) ?>" width='100'>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>توضیح کوتاه</label>
                                            <input type="text" name="short_description" class="form-control bg-light rounded-custom"
                                            placeholder=" توضیح کوتاه را وارد کنید..."
                                            value="<?php echo $service['short_description'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان سئو</label>
                                            <input type="text" name="seo_title" class="form-control bg-light rounded-custom"
                                            placeholder="عنوان سئو را وارد کنید..."
                                            value="<?php echo $service['seo_title'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>توضیح بلند</label>
                                            <textarea name="long_description" class="form-control bg-light rounded-custom" 
                                            rows="3" placeholder="توضیحات خدمت را وارد کنید..."><?php echo $service['long_description'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-6 p-2">
                                        <div class="form-group">
                                            <label>توضیحات سئو</label>
                                            <textarea name="seo_description" class="form-control bg-light rounded-custom" 
                                            rows="3" placeholder="توضیحات سئو را وارد کنید..."><?php echo $service['seo_description'] ?></textarea>
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
    <script>
        CKEDITOR.replace('long_description', {
            language: 'fa',
            content: 'fa'
        });
    </script>
</body>

</html>
