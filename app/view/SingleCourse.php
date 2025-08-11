<?php
require "layouts/header.php";
?>

<div style="background-color: black; margin:0px auto; height:65px;">

</div>
<section class="blog-detail pt-100 pb-100">
    <div class="container">
        <div class="row">
            <!--Blog Content-->
            <div class="col-lg-8 offset-lg-2">
                <!--Blog Image-->
                <div class="blog-image">
                    <img class="img-responsive" src="/images/blog/<?= $data["image"] ?>" alt="">
                </div>
                <!--Blog Heading-->
                <div class="blog-heading">
                    <h2><?= $data["title"] ?></h2>
                    <div class="blog-meta">
                        <span class="date"><?= $data["date"] ?></span>
                        <span class="by">توسط <?= $data["author"] ?> </span>
                    </div>
                </div>
                <!--Blog Content-->
                <div class="blog-content">
                    <p>
                        <?= $data["content"] ?>
                    </p>
                </div>
                <div class="col-md-12">
                    <!--Blog Comments-->
                    <h3 class="comment-title">نظرات</h3>
                    <ul class="post-comment">
                        <li>
                            <img class="img-responsive" src="/images/testimonial/<?= $data["image"] ?>" alt="">
                            <div class="comment-info">
                                <h3>آدام همتی</h3>
                                <a href="#">پاسخ</a>
                                <span>22 مرداد 1400 15:40</span>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--Blog Comment Form-->
                <form class="col-md-12 contact-form" action="#">
                    <h3 class="comment-title">پاسخ دهید</h3>
                    <div class="row">
                        <!--Name-->
                        <div class="col-md-6">
                            <input class="form-inpt" type="text" required="required" placeholder="نام">
                        </div>
                        <!--Email-->
                        <div class="col-md-6">
                            <input class="form-inpt" type="text" placeholder="ایمیل" required="required">
                        </div>
                        <!--Message-->
                        <div class="col-md-12">
                            <textarea name="form-message" placeholder="نظر شما" rows="8"></textarea>
                        </div>
                        <div class="col-md-12 text-center pt-30">
                            <input id="submit" class="main-btn" type="submit" value="ارسال نظر">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require "layouts/footer.php";
?>