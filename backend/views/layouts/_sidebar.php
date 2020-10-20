<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/demo1/backend/web/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>

        <?= Html::tag('div', Html::encode(yii::$app->name), ['class' => 'sidebar-brand-text mx-3']) ?>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/demo1/backend/web/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo Yii::$app->homeUrl. 'staff' ?>">
            <i class="fas fa-user"></i>
            <span>Nhân sự</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-house-user"></i>
            <span>Phòng ban</span></a>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--                        <h6 class="collapse-header"></h6>-->
                <a class="collapse-item" href="<?php echo Yii::$app->homeUrl. 'department' ?>">Phòng ban</a>
                <a class="collapse-item" href="<?php echo Yii::$app->homeUrl. 'admin' ?>">Nhân viên</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-table-tennis"></i>
            <span>Câu lạc bộ</span>
        </a>
        <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--                        <h6 class="collapse-header"></h6>-->
                <a class="collapse-item" href="<?php echo Yii::$app->homeUrl. 'club' ?>">Danh sách</a>
                <a class="collapse-item" href="<?php echo Yii::$app->homeUrl. 'staffnclub' ?>">Chi tiết</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->