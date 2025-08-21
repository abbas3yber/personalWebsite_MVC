<?php
require "Layouts/DashboradHeader.php";
?>

<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="/admin"></a>
        </div>
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <div class="notification margin-15">
                <a class="notification__icon"></a>
                <div class="dropdown__notification">
                    <div class="content__notification">
                        <span class="font-size-13">موردی برای نمایش وجود ندارد</span>
                    </div>
                </div>
            </div>
            <a href="/admin/logout" class="logout" title="خروج"></a>
        </div>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="/admin/dashboard">پیشخوان</a></li>
            <li><a href="#" class="is-active">دسته بندی ها</a></li>
        </ul>
    </div>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters ">
            <div class="col-12 bg-white">
                <p class="box__title">ایجاد دوره جدید</p>
                <form action="/admin/courses/new_course" method="POST" enctype="multipart/form-data" class="padding-30">
                    <input type="text" autocomplete="off" require name="title" id="title" placeholder="نام دوره" class="text">
                    <input type="text" autocomplete="off" require name="teacher" id="teacher" placeholder="نام مدرس " class="text">
                    <input type="text" autocomplete="off" require name="price" id="price" placeholder="قیمت دوره " class="text">
                    <select name="category" required>
                        <option value="">انتخاب دسته‌بندی</option>
                        <option value="programing">برنامه نویسی</option>
                        <option value="security">امنیت</option>
                        <option value="web-design">طراحی وب</option>
                        <option value="wordpress">وردپرس</option>
                    </select>
                    <input type="text" autocomplete="off" require name="date" id="date" placeholder="تاریخ  " class="text">
                    <input type="file" accept=".jpg,.png" autocomplete="off" require name="image" id="image" placeholder="تصویر دوره  " class="text">
                    <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                    <button type="submit" name="submit" class="btn btn-netcopy_net">اضافه کردن</button>
                    <a href="/admin/courses" class="btn btn-danger"> انصراف </a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require "Layouts/DashboradFooter.php";
?>