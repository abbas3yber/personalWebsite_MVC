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
            <li><a href="/admin/dashboard">پیشخوان</a></li>
            <li><a href="#" class="is-active"> دسته بندی مقالات  </a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="/admin/dashboard/Categories">همه دسته بندی ها</a>
                <a class="tab__item" href="/admin/dashboard/NewCategory">ایجاد دسته بندی جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
            <div class="t-header-search">
                <form action="" onclick="event.preventDefault();">
                    <div class="t-header-searchbox font-size-13">
                        <input type="text" class="text search-input__box font-size-13" placeholder="جستجوی مقاله">
                        <div class="t-header-search-content ">
                            <input type="text" class="text" placeholder="ایمیل">
                            <input type="text" class="text" placeholder="شماره">
                            <input type="text" class="text" placeholder="آی پی">
                            <input type="text" class="text margin-bottom-20" placeholder="نام و نام خانوادگی">
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
                        <th>  نام دسته </th>
                        <th> نامک </th>
                        <th> تاریخ ثبت </th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categories as $item) {
                    ?>
                        <tr role="row" class="">
                            <td><a href=""> <?= $item["id"] ?> </a></td>
                            <td><a href="">  <?= $item["name"] ?> </a></td>
                            <td> <?= $item["slug"] ?> </td>
                            <td> <?= unixtimestamp_to_shamsi($item["created_at"] , "hh-mm-ss | YYYY-MM-dd") ?> </td>
                            <td>
                                <a href="/admin/dashboard/Users/<?= $item["id"] ?>" class="item-delete mlg-15" title="حذف" onclick="return confirm('آیا دوره حذف شود  ؟ ');" ></a>
                                <a href="/admin/dashboard/EditUser/<?= $item["id"] ?>" class="item-edit " title="ویرایش"></a>
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