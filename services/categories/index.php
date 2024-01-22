<?php

include_once('../../module.php');
handle_admin();
include_once('../../database.php');
$admin_id = $_SESSION['admin_id'];

$filter_clause = '';
if (count($_GET) > 0){
    $filters = [];
    foreach($_GET as $key=>$value){
        array_push($filters, "$key LIKE '%$value%'");
    }
    $filter_clause = 'WHERE ' . implode(' AND ', $filters);
}

$connection = connect_db();
$categories = $connection->query("SELECT * FROM service_categories $filter_clause ORDER BY id DESC")->fetchAll();

?>

<!doctype html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <?php include(get_url('elements', 'html-head.php?title=' . urlencode('دسته بندی خدمات'))); ?>
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
                                       لیست دسته بندی خدمات
                                    </h3>
                                    <div class="d-flex align-items-center">
                                        <a href="add.php" class="btn ms-2 my-2 btn-custom-b rounded-custom d-flex align-items-center">
                                            <i class="bi bi-plus-square-dotted d-flex h5 my-0 me-2"></i>
                                            افزودن دسته بندی
                                        </a>
                                    </div>
                                </div>
                                <form action="<?php echo get_url('_search.php') ?>" method="POST" class="mb-3">
                                    <input type="hidden" name="url" value="<?php echo get_url('services', 'categories', 'index.php') ?>">
                                    <h5 class="fw-bolder mb-1">جستجو</h5>
                                    <div class="container-fluid">
                                        <div class="card-block row w-100 m-0">
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>عنوان</label>
                                                <input type="text" name="title" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با عنوان...">
                                            </div>
                                            <div class="form-group col-md-4 col-6 p-3">
                                                <label>توضیحات</label>
                                                <input type="text" name="description" class="form-control bg-light rounded-custom" 
                                                placeholder="جستجو با توضیحات...">
                                            </div>
                                            <div class="form-group col-md-2 col-6 p-3">
                                                <label>وضعیت</label>
                                                <select id="optlist" name="status" class="form-select bg-light rounded-custom">
                                                    <option value="">
                                                        همه
                                                    </option>
                                                    <option value="1">
                                                        فعال
                                                    </option>
                                                    <option value="0">
                                                        غیرفعال
                                                    </option>
                                                </select>
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
                                                توضیحات
                                            </th>
                                            <th class="fw-bolder">
                                                وضعیت
                                            </th>
                                            <th class="fw-bolder" style="width:150px">
                                                تصویر
                                            </th>
                                            <th class="fw-bolder">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-light">
                                        <?php foreach($categories as $category){?>
                                        <tr>
                                            <th>
                                                <?php echo $category['id']?>
                                            </th>
                                            <th>
                                                <span class="badge bg-white" style="font-size: 11px">
                                                    <?php echo $category['title']?>
                                                </span>
                                            </th>
                                            <th>
                                                <?php echo $category['description'] ?>
                                            </th>
                                            <th>
                                                <span class="badge <?php if($category['status']==1){echo 'bg-success';}else{echo 'bg-danger';}?>" style="font-size: 14px">
                                                    <?php
                                                        if ($category['status'] == 1){
                                                            echo 'فعال';
                                                        }else{
                                                            echo 'غیر فعال';
                                                        }
                                                    ?>
                                                </span>
                                            </th>
                                            <th>
                                                <img src="<?php echo get_url('images', $category['image']) ?>" width='100'>
                                            </th>
                                            <th>
                                                <div class="btn-group" role="group">
                                                    <a href="_delete.php?id=<?php echo $category['id'] ?>" class="btn rounded-custom btn-custom-b">
                                                        <i class="bi bi-trash d-flex text-white"></i>
                                                    </a>
                                                </div>
                                                <div class="btn-group" role="group">
                                                    <a href="edit.php?id=<?php echo $category['id'] ?>" class="btn rounded-custom btn-custom-b">
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