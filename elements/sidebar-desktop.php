<?php

include_once('../module.php');

?>

<div class="d-lg-block d-none">
<div class="sidebar px-4 py-4 py-md-4 me-0 shadow">
    <div class="d-flex flex-column h-100">
        <div class="xs">
            <a href="<?php echo get_url(); ?>" target="_blank"
                class="mb-0 d-flex align-items-center justify-content-center rahweblogo">
                <img src="assets/images/rahweb-logo.svg" />
                <span class="me-2 h4 mt-1 mb-0" style="color: #4ac80a;">
                    Rahweb
                </span>
            </a>
        </div>
        <ul class="menu-list flex-grow-1 mt-3">
            <li>
                <a class="m-link  active " href="<?php echo get_url(); ?>">
                    <i class="bi bi-speedometer2 me-2 d-flex"></i>
                    <span>داشبورد</span>
                </a>
            </li>
            <li class="collapsed">
                <a data-bs-toggle="collapse" data-bs-target="#menu-article" href="<?php echo get_url('articles'); ?>" class="m-link">
                    <i class="bi bi-paragraph me-2 d-flex"></i>
                    <span>مقالات</span>
                    <i class="bi bi-chevron-down d-flex ms-2"></i>
                </a>
                <ul class="sub-menu collapse" id="menu-article">
                    <li>
                        <a class="ms-link " href="<?php echo get_url('articles', 'add.php'); ?>">
                            اضافه کردن مقاله
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('articles', 'index.php'); ?>">
                            مدیریت مقالات
                        </a>
                    </li>
                </ul>
            </li>
            <li class="collapsed">
                <a data-bs-toggle="collapse" data-bs-target="#menu-banner" href="<?php echo get_url('banners'); ?>" class="m-link">
                    <i class="bi bi-newspaper me-2 d-flex"></i>
                    <span>بنرها</span>
                    <i class="bi bi-chevron-down d-flex ms-2"></i>
                </a>
                <ul class="sub-menu collapse" id="menu-banner">
                    <li>
                        <a class="ms-link " href="<?php echo get_url('banners', 'add.php'); ?>">
                            اضافه کردن بنر
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('banners', 'index.php'); ?>">
                            مدیریت بنرها
                        </a>
                    </li>
                </ul>
            </li>
            <li class="collapsed">
                <a data-bs-toggle="collapse" data-bs-target="#menu-service" href="<?php echo get_url('services'); ?>" class="m-link">
                    <i class="bi bi-grid me-2 d-flex"></i>
                    <span>خدمات</span>
                    <i class="bi bi-chevron-down d-flex ms-2"></i>
                </a>
                <ul class="sub-menu collapse" id="menu-service">
                    <li>
                        <a class="ms-link " href="<?php echo get_url('services', 'add.php'); ?>">
                            اضافه کردن خدمت
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('services', 'index.php'); ?>">
                            مدیریت خدمات
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('services', 'categories', 'add.php'); ?>">
                            اضافه کردن دسته بندی
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('services', 'categories', 'index.php'); ?>">
                            مدیریت دسته بندی ها
                        </a>
                    </li>
                </ul>
            </li>
            <li class="collapsed">
                <a data-bs-toggle="collapse" data-bs-target="#menu-product" href="<?php echo get_url('products'); ?>" class="m-link">
                    <i class="bi bi-cart me-2 d-flex"></i>
                    <span>محصولات</span>
                    <i class="bi bi-chevron-down d-flex ms-2"></i>
                </a>
                <ul class="sub-menu collapse" id="menu-product">
                    <li>
                        <a class="ms-link " href="<?php echo get_url('products', 'add.php'); ?>">
                            اضافه کردن محصول
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('products', 'index.php'); ?>">
                            مدیریت محصولات
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('products', 'categories', 'add.php'); ?>">
                            اشافه کردن دسته بندی
                        </a>
                    </li>
                    <li>
                        <a class="ms-link " href="<?php echo get_url('products', 'categories', 'index.php'); ?>">
                            مدیریت دسته بندی ها
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>
