<?php

include_once('../module.php');
handle_admin();
include_once('../database.php');
$admin_id = $_SESSION['admin_id'];

$title_phrase = '';
if(isset($_GET['title'])){
    $title = $_GET['title'];
    $title_phrase = "WHERE title LIKE '%$title%'";
}
$category_phrase = '';
if(isset($_GET['category'])){
    $category = $_GET['category'];
    $category_phrase = "JOIN product_categories ON products.category_id=product_categories.id WHERE product_categories.title LIKE '%$category%'";
}

$connection = connect_db();
$products = $connection->query("SELECT * FROM products $title_phrase $category_phrase ORDER BY products.id DESC")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=محصولات')); ?>
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
                                       لیست محصولات
                                    </h3>
                                    <div class="d-flex align-items-center">
                                        <a href="add.php" class="btn ms-2 my-2 btn-custom-b rounded-custom d-flex align-items-center">
                                            <i class="bi bi-plus-square-dotted d-flex h5 my-0 me-2"></i>
                                            افزودن محصول
                                        </a>
                                    </div>
                                </div>
                                <form action="<?php echo get_url('_search.php') ?>" method="POST" class="mb-3">
                                    <input type="hidden" name="url" value="<?php echo get_url('products', 'index.php')?>">
                                    <h5 class="fw-bolder mb-1">جستجو</h5>
                                    <div class="container-fluid">
                                        <div class="card-block row w-100 m-0">
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>عنوان فارسی</label>
                                                <input type="text" name="title_fa" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با عنوان فارسی...">
                                            </div>
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>عنوان انگلیسی</label>
                                                <input type="text" name="title_en" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با عنوان فارسی...">
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
                                                عنوان فارسی
                                            </th>
                                            <th class="fw-bolder">
                                                عنوان انگلیسی
                                            </th>
                                            <th class="fw-bolder">
                                                ویژگی ها
                                            </th>
                                            <th class="fw-bolder">
                                                قیمت
                                            </th>
                                            <th class="fw-bolder">
                                                قیمت تخفیف
                                            </th>
                                            <th class="fw-bolder">
                                                دسته بندی
                                            </th>
                                            <th class="fw-bolder">
                                                تصویر
                                            </th>
                                            <th class="fw-bolder">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-light">
                                        <?php foreach($products as $product){ 
                                            $product_id = $product['id'];
                                            $image = $connection->query("SELECT * FROM product_images WHERE product_id=$product_id AND cover='1'")->fetch();
                                            if($image){
                                                $image = $image['image'];
                                            }else{
                                                $image = 'default.jpg';
                                            }
                                        ?>
                                        <tr>
                                            <th>
                                                <?php echo $product['id']?>
                                            </th>
                                            <th>
                                                <span class="badge bg-white" style="font-size: 11px">
                                                    <?php echo $product['title_fa']?>
                                                </span>
                                            </th>
                                            <th>
                                                <span class="badge bg-white" style="font-size: 11px">
                                                    <?php echo $product['title_en']?>
                                                </span>
                                            </th>
                                            <th>
                                                <?php echo $product['properties'] ?>
                                            </th>
                                            <th>
                                                <?php echo $product['price'] ?>
                                            </th>
                                            <th>
                                                <?php echo $product['discount_price'] ?>
                                            </th>
                                            <th>
                                                <?php 
                                                    $category_id = $product['category_id'];
                                                    $category = $connection->query("SELECT * FROM product_categories WHERE id=$category_id")->fetch();
                                                    echo $category['title'];
                                                ?>
                                            </th>
                                            <th>
                                                <img src="<?php echo get_url('images', $image) ?>" width='100'>
                                            </th>
                                            <th>
                                                <div class="btn-group" role="group">
                                                    <a href="_delete.php?id=<?php echo $product['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-trash d-flex text-white"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-pencil d-flex text-white"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a href="images/index.php?id=<?php echo $product['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-eye d-flex text-white"></i>
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