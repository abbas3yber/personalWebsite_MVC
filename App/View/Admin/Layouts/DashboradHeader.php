<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title> پنل مدیریت </title>
    <link rel="stylesheet" href="/Assets/DashboardStyle/css/style.css">
    <link rel="stylesheet" href="/Assets/DashboardStyle/css/responsive_991.css" media="(max-width:991px)">
    <link rel="stylesheet" href="/Assets/DashboardStyle/css/responsive_768.css" media="(max-width:768px)">
    <link rel="stylesheet" href="/Assets/DashboardStyle/css/font.css">
    <link rel="stylesheet" href="/Assets/DashboardStyle/bootstrap-icons/bootstrap-icons.min.css">
  
    <!-- <link rel="stylesheet" href="/Assets/DashboardStyle/css/bootstrap.min.css"> -->

</head>

<body>
    <div class="sidebar__nav border-top border-left ">
        <span class="bars d-none padding-0-18"></span>
        <a class="header__logo  d-none" href="/admin/dashboard"></a>
        <div class="profile__info border cursor-pointer text-center">
            <div class="avatar__img"><img src="/Assets/DashboardStyle/img/pro.jpg" class="avatar___img">
                <input type="file" accept="image/*" class="hidden avatar-img__input">
                <div class="v-dialog__container" style="display: block;"></div>
                <div class="box__camera default__avatar"></div>
            </div>
            <span style="font-size:12px; padding-top:16px; font-weight:bold;" class="profile__name"> <?= unixtimestamp_to_shamsi(time(), " hh-mm-ss | YYYY-MM-dd ") ?> </span>
        </div>

        <ul>
            <li class="item-li i-dashboard<?= (is_route("/admin/dashboard")) ? " is-active" : "" ?>"><a href="/admin/dashboard">پیشخوان</a></li>
            <li class="item-li i-courses<?= (is_route("/admin/courses")) ? " is-active" : "" ?> "><a href="/admin/courses">دوره ها</a></li>
            <li class="item-li i-users<?= (is_route("/admin/users")) ? " is-active" : "" ?>"><a href="/admin/users"> کاربران</a></li>
            <li class="item-li i-articles<?= (is_route("/admin/articles")) ? " is-active" : "" ?>"><a href="/admin/articles">مقالات</a></li>
            <li class="item-li i-categories<?= (is_route("/admin/categories")) ? " is-active" : "" ?>"><a href="/admin/categories">دسته بندی مقالات</a></li>
            <li class="item-li i-comments<?= (is_route("/admin/comments")) ? " is-active" : "" ?>"><a href="/admin/comments"> نظرات</a></li>
            <li class="item-li i-transactions"><a href="#">تراکنش ها</a></li>
            <li class="item-li i-checkouts"><a href="#">تسویه حساب ها</a></li>
            <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>
        </ul>

    </div>