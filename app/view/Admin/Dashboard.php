<?php
require "Layouts/DashboradHeader.php";
?>

<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="header__logo" href="#"></a>
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
        </ul>
    </div>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد مقالات موجود</p>
                <p> <?= $blogCount ?> </p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد کاربران موجود  </p>
                <p>  <?= $usersCount ?>  </p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد نظرات کاربران </p>
                <p>  <?= $feedbackCount ?>  </p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-bottom-10">
                <p> تعداد دوره ها </p>
                <p> <?= $courseCount ?> </p>
            </div>
        </div>
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-8 padding-20 bg-white margin-bottom-10 margin-left-10 border-radius-3">
                محل قرار گیری نمودار
            </div>
            <div class="col-4 info-amount padding-20 bg-white margin-bottom-12-p margin-bottom-10 border-radius-3">

                <p class="title icon-outline-receipt"> نظرات تایید شده کاربران </p>
                <p class="amount-show color-444"> 0 <span> not set now </span></p>
                <p class="title icon-sync"> نظرات در حال تایید </p>
                <p class="amount-show color-444"> 0 <span> not set now </span></p>
            </div>
        </div>
        <div class="row bg-white no-gutters font-size-13">
            <div class="title__row">
                <p> مقالات اخیر شما  </p>
            </div>
            <div class="table__box">
                <table width="100%" class="table">
                    <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه مقاله</th>
                            <th> عنوان مقاله </th>
                            <th> تاریخ ثبت مقاله </th>
                            <th> نویسنده مقاله </th>
                            <th> تعداد نظرات </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($blog_info as $item){
                        ?>
                        <tr role="row">
                            <td><a href=""> <?=$item["id"]?> </a></td>
                            <td><a href=""><?=$item["title"]?></a></td>
                            <td><a href=""><?= unixtimestamp_to_shamsi($item["date"] , "hh-mm-ss | YYYY-MM-dd")  ?></a></td>
                            <td><a href=""><?=$item["author"]?></a></td>
                            <td><a href=""> comments </a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require "Layouts/DashboradFooter.php";
?>