<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title> پنل مدیریت </title>
    <link rel="stylesheet" href="/dashboard_style/css/style.css">
    <link rel="stylesheet" href="/dashboard_style/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/dashboard_style/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/dashboard_style/css/font.css">
</head>

<body>
    <div class="sidebar__nav border-top border-left ">
        <span class="bars d-none padding-0-18"></span>
        <a class="header__logo  d-none" href="/admin/dashboard"></a>
        <div class="profile__info border cursor-pointer text-center">
            <div class="avatar__img"><img src="/dashboard_style/img/pro.jpg" class="avatar___img">
                <input type="file" accept="image/*" class="hidden avatar-img__input">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <span style="font-size:13px; padding-top:18px; font-weight:bold;" class="profile__name"> <?= unixtimestamp_to_shamsi(time(), " hh-mm-ss | YYYY-MM-dd ") ?> </span>
        </div>

        <ul>
            <li class="item-li i-dashboard<?= (is_route("/admin/dashboard")) ? " is-active" : "" ?>"><a href="/admin/dashboard">پیشخوان</a></li>
            <li class="item-li i-courses<?= (is_route("/admin/dashboard/Courses")) ? " is-active" : "" ?> "><a href="/admin/dashboard/Courses">دوره ها</a></li>
            <li class="item-li i-users<?= (is_route("/admin/dashboard/Users")) ? " is-active" : "" ?>"><a href="/admin/dashboard/Users"> کاربران</a></li>
            <li class="item-li i-articles<?= (is_route("/admin/dashboard/Articles")) ? " is-active" : "" ?>"><a href="/admin/dashboard/Articles">مقالات</a></li>
            <li class="item-li i-categories<?= (is_route("/admin/dashboard/Categories")) ? " is-active" : "" ?>"><a href="/admin/dashboard/Categories">دسته بندی مقالات</a></li>
            <li class="item-li i-comments<?= (is_route("/admin/dashboard/Comments")) ? " is-active" : "" ?>"><a href="/admin/dashboard/Comments"> نظرات</a></li>
            <li class="item-li i-transactions"><a href="#">تراکنش ها</a></li>
            <li class="item-li i-checkouts"><a href="#">تسویه حساب ها</a></li>
            <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>
        </ul>

    </div>