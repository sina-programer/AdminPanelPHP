<?php

include_once('../module.php');
include_once('../database.php');

handle_admin();
$admin_id = $_SESSION['admin_id'];

$connection = connect_db();
$id = $_GET['id'];
$product = $connection->query("SELECT * FROM products WHERE id=$id")->fetch();
$categories = $connection->query("SELECT * FROM product_categories")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=' . urlencode('ویرایش محصول'))); ?>
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
                                        ویرایش محصول
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card border p-2">
                        <form action="_edit.php" method="POST">
                            <input name="id" type="hidden" value="<?php echo $product['id'] ?>">
                            <div class="container-fluid">
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان فارسی</label>
                                            <input required type="text" name="title_fa" class="form-control bg-light rounded-custom" 
                                            placeholder="عنوان خدمت را وارد کنید..." oninvalid="alert('عنوان ضروری است')"
                                            value="<?php echo $product['title_fa'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان انگلیسی</label>
                                            <input required type="text" name="title_en" class="form-control bg-light rounded-custom" 
                                            placeholder="عنوان خدمت را وارد کنید..." oninvalid="alert('عنوان ضروری است')"
                                            value="<?php echo $product['title_en'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6 p-2">
                                        <div class="form-group">
                                            <label>دسته بندی</label>
                                            <select id="optlist" name="category_id" class="form-select bg-light rounded-custom">
                                                <?php foreach($categories as $category){?>
                                                    <option value="<?php echo $category['id'] ?>" <?php if($product['category_id']==$category['id']){echo 'selected';} ?>>
                                                        <?php echo $category['title'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>عنوان سئو</label>
                                            <input type="text" name="seo_title" class="form-control bg-light rounded-custom"
                                            placeholder="عنوان سئو را وارد کنید..." value="<?php echo $product['seo_title'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>قیمت</label>
                                            <input type="text" name="price" class="form-control bg-light rounded-custom"
                                            placeholder="قیمت محصول را وارد کنید..." value="<?php echo $product['price'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>قیمت تخفیف</label>
                                            <input type="text" name="discount_price" class="form-control bg-light rounded-custom"
                                            placeholder="قیمت تخفیف محصول را وارد کنید..." value="<?php echo $product['discount_price'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block row w-100 m-0">
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>ویژگی ها</label>
                                            <textarea name="properties" class="form-control bg-light rounded-custom" 
                                            rows="3" placeholder="ویژگی های محصول را وارد کنید..."><?php echo $product['properties'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>نکات استفاده</label>
                                            <textarea name="usage_tips" class="form-control bg-light rounded-custom" 
                                            rows="3" placeholder="نکات استفاده محصول را وارد کنید..."><?php echo $product['usage_tips'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6 p-2">
                                        <div class="form-group">
                                            <label>توضیحات سئو</label>
                                            <textarea name="seo_description" class="form-control bg-light rounded-custom" 
                                            rows="3" placeholder="توضیحات سئو را وارد کنید..."><?php echo $product['seo_description'] ?></textarea>
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
        CKEDITOR.replace('properties', {
            language: 'fa',
            content: 'fa'
        });
    </script>
</body>

</html>
