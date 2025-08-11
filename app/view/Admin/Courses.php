<?php
require "Layouts/DashboradHeader.php";
?>

<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="https://netcopy.ir"></a>
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
            <li><a href="/admin/dashboard" title="پیشخوان">پیشخوان</a></li>
            <li><a href="#" title=" دوره ها" class="is-active"> دوره ها</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/dahsboard/Courses">لیست دوره ها</a>
                <a class="tab__item" href="/admin/dashboard/NewCourse">ایجاد دوره جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box ">جستجوی دوره</div>
                        <div class="t-header-search-content ">
                            <input type="text" class="text" placeholder="نام دوره">
                            <input type="text" class="text" placeholder="ردیف">
                            <input type="text" class="text" placeholder="قیمت">
                            <input type="text" class="text" placeholder="نام مدرس">
                            <input type="text" class="text margin-bottom-20" placeholder="دسته بندی">
                            <btutton class="btn btn-netcopy_net">جستجو</btutton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                    <tr role="row" class="title-row">
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>مدرس دوره</th>
                        <th>قیمت </th>
                        <th>وضعیت دوره</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($Courses as $item) { 
                    ?>
                        <tr role="row" class="">
                            <td><a href=""><?= $item["id"] ?></a></td>
                            <td><a href=""> <?= $item["title"] ?> </a></td>
                            <td><a href=""> <?= $item["teacher"] ?> </a></td>
                            <td> <?= $item["price"] ?> تومان </td>
                            <td> <?= $item["status"] ?> </td>
                            <td>
                                <a href="/admin/dashboard/Courses/<?= $item["id"] ?>" class="item-delete mlg-15" title="حذف" onclick="return confirm('آیا دوره حذف شود  ؟ ');"> </a>
                                <a href="/SingleCourse/<?= $item["id"] ?>" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                                <a href="/admin/dashboard/EditCourse/<?= $item["id"] ?>" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require "Layouts/DashboradFooter.php";
?>