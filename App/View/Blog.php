<?php require "Layouts/Header.php"; ?>

<div style="background-color: black; margin:0px auto; height:120px;"></div>
<section class="blog-detail pt-100 pb-100">
    <div class="container">
        <div class="row">
            <!--Blog Content-->
            <div class="col-lg-12 offset-lg-2">
                <!--Blog Image-->
                <div class="blog-image pt-10">
                    <img class="img-responsive" src="/Uploads/images/blog/<?= $data['image']; ?>" alt="<?= $data['image'] ?>">
                </div>
                <!--Blog Heading-->
                <div class="blog-heading">
                    <h2> <?= $data["title"] ?></h2>
                    <div class="blog-meta">
                        <span class="date"> <?= unixtimestamp_to_shamsi($data["date"], "  hh-mm-ss | YYYY-MM-dd - ") ?> </span>
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
                        <?php
                        if (!empty($comments)) {
                            foreach ($comments as $comment) {
                        ?>
                                <li>
                                    <div class="comment-info">
                                        <h3> <?= $comment['name'] ?> </h3>
                                        <!-- <a href="#">پاسخ</a> -->
                                        <span> <?= unixtimestamp_to_shamsi($comment["created_at"], "  hh-mm-ss | YYYY-MM-dd  ") ?> </span>
                                        <p> <?= $comment['message'] ?> </p>
                                    </div>
                                </li>
                            <?php
                            }
                        } else {
                            ?>
                            <p class="alert alert-warning text-center mt-4">🔔 نظری ثبت نشده است.</p>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!--Blog Comment Form-->
                <form id="comment" class="col-md-12 contact-form mb-3" method="POST" action="/Blog/<?= $data["id"] ?>">
                    <h3 class="comment-title">پاسخ دهید</h3>
                    <div class="row">
                        <!--Name-->
                        <div class="col-md-6">
                            <input class="form-control" name="name" type="text" required="required" placeholder="نام">
                        </div>
                        <!--Email-->
                        <div class="col-md-6">
                            <input class="form-control" name="email" type="email" placeholder="ایمیل" required="required">
                        </div>
                        <!--Message-->
                        <div class="col-md-12">
                            <textarea class="form-control" name="message" placeholder="نظر شما" rows="8"></textarea>
                        </div>
                        <div class="col-md-12 text-center pt-30">
                            <input type="hidden" name="csrf_token" value="<?= csrf_token() ?>">
                            <button class="btn btn-default btn-xl btn-normal margin-top-20 contact-btn" type="submit" name="submit" value="ارسال نظر"> ارسال نظر </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require "Layouts/Footer.php"; ?>